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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        $allCategories = Category::select(['id', 'name'])->with('subCategories')->get()->toArray();
        // $cities = City::all();
        $cities = City::all()->map(function ($city) {
            return (object) [
                'id'   => $city->id,
                'text' => $city->name,
            ];
        })->toArray();
        $allInformation = $this->getJosnData();
        return view('dashboard.services.create', ['categories' => $allCategories, 'cities' => $cities, 'subCategories' => [], 'jsonInfos' => $allInformation]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']);
        $data = Helper::storeFiles($data, ['image1' => 'image']);

        // Construct standard WKT representation: POINT(longitude latitude)
        $wktPoint = "POINT({$data['longitude']} {$data['latitude']})";
        $data['coordinates'] = DB::raw("ST_PointFromText('{$wktPoint}', 4326)");
        Service::create($data);
        return redirect()->route('dashboard.services.index')->with('success', __('Created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $srv = Service::findOrFail($id);
        $Service = $srv->getAttributes();
        $Service['city_id'] = $srv->city->name;
        $Service['sub_category_id'] = $srv->subCategory->name;
        $imgAr = ['img1' => $Service["image"]];
        unset($Service["image"]);
        $newAr = array_keys($Service);
        return view('dashboard.services.show', ['showArr' => $Service, 'source' => 'services', 'keys' => $newAr, 'imgAr' => $imgAr]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $service = Service::findOrFail($uuid);
        $allCategories = Category::select(['id', 'name'])->with('subCategories')->get()->toArray();
        $subCategories = SubCategory::query()
            ->where('category_id', '=', $service->subCategory->category->id)->get();
        $cities = City::all()->map(function ($city) {
            return (object) [
                'id'   => $city->id,
                'text' => $city->name,
            ];
        })->toArray();
        $allInformation = $this->getJosnData();
        return view('dashboard.services.edit', ['categories' => $allCategories, 'cities' => $cities, 'subCategories' => $subCategories, 'service' => $service, 'jsonInfos' => $allInformation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $uuid)
    {
        $data = $request->all();
        $data['confirmed'] = isset($data['confirmed']);
        $service = Service::findOrFail($uuid);

        $data = Helper::storeFiles($data, ['image1' => 'image']);
        $data['slug'] = Str::slug($data['name']);

        !($request->hasFile('image1') && $service->image) ?: $deleteFiles[] = $service->image;
        $service->update($data);

        empty($deleteFiles) ?: Helper::deleteFiles($deleteFiles);
        return redirect()->route('dashboard.services.index')->with('success', __('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $service = Service::findOrFail($uuid);

        $service->delete();
        !($service->image) ?: $deleteFiles[] = $service->image;
        empty($deleteFiles) ?: Helper::deleteFiles($deleteFiles);
        return redirect()->route('dashboard.services.index')->with('success', __('Deleted successfully'));
    }

    protected function getJosnData()
    {
        return [
            ['subCatg' => 'تأجير سيارات', 'information' => ['model' => 'text', 'car_no' => 'text', 'work_line' => 'text']],
            ['subCatg' => 'أطباء', 'information' => ['from_time' => 'time', 'to_time' => 'time', 'work_days' => 'text']]
        ];
    }
}

// ['subCatg' => 'تأجير سيارات', 'information' => ['model' => 'text', 'car_no' => 'text', 'work_in' => 'text', 'kind' => ['بيجو 7', 'بيجو 4', 'ميكروباص']], 'required' => ['kind']],