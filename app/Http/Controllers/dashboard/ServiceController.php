<?php

namespace App\Http\Controllers\dashboard;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $allCategories = Category::all();
        $allSubCategories = SubCategory::all();
        $allservices = Service::filter($request->query())->with(['subCategory', 'city'])->latest()->paginate(10);
        return view('dashboard.services.index', ['categories' => $allCategories, 'subCategories' => $allSubCategories, 'services' => $allservices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $allCategories = Category::all();
        $allCategories = Category::select(['id', 'name'])->with('subCategories')->get()->toArray();
        // dd($allCategories);
        // $allSubCategories = SubCategory::all();
        $cities = City::all();
        return view('dashboard.services.create', ['categories' => $allCategories, 'cities' => $cities, 'subCategories' => []]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data = Helper::storeFiles($data, ['image1' => 'image']);
        Service::create($data);
        return redirect()->route('dashboard.services.index')->with('success', __('Created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
