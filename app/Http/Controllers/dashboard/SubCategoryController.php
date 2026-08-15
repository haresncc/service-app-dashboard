<?php

namespace App\Http\Controllers\dashboard;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Pest\Support\View;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $categories = Category::all();
        $subCategories = SubCategory::filter($request->query())->with(['category'])->latest()->paginate(10);
        return view('dashboard.sub_categories.index', ['categories' => $categories, 'subCategories' => $subCategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $excatLocationAr = [['id' => '1', 'name' => 'Yes'], ['id' => '0', 'name' => 'No']];
        $activeAr = [['id' => '1', 'name' => 'Yes'], ['id' => '0', 'name' => 'No']];
        return view('dashboard.sub_categories.create', ['categories' => $categories, 'excatLocationAr' => $excatLocationAr, 'activeAr' => $activeAr]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']);
        $data = Helper::storeFiles($data, ['image1' => 'image']);

        SubCategory::create($data);
        return redirect()->route('dashboard.sub-categories.index')->with('success', __('Created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subcatg = SubCategory::findOrFail($id);
        $SubCategory = $subcatg->getAttributes();
        $SubCategory['category_id'] = $subcatg->category->name;
        $imgAr = ['img1' => $SubCategory["image"]];
        unset($SubCategory["image"], $SubCategory["image2"], $SubCategory["image3"]);
        $SubCategory["excat_location"] = ($SubCategory["excat_location"]) ? 'Yes' : 'No';
        $SubCategory["active"] = ($SubCategory["active"]) ? 'Yes' : 'No';
        $newAr = array_keys($SubCategory);
        return view('dashboard.sub_categories.show', ['showArr' => $SubCategory, 'source' => 'sub-categories', 'keys' => $newAr, 'imgAr' => $imgAr]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        $excatLocationAr = [['id' => '1', 'name' => 'Yes'], ['id' => '0', 'name' => 'No']];
        $activeAr = [['id' => '1', 'name' => 'Yes'], ['id' => '0', 'name' => 'No']];
        return view('dashboard.sub_categories.edit', ['subCategory' => $subCategory, 'categories' => $categories, 'excatLocationAr' => $excatLocationAr, 'activeAr' => $activeAr]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $subCategory = SubCategory::findOrFail($id);

        $data = Helper::storeFiles($data, ['image1' => 'image']);
        $data['slug'] = Str::slug($data['name']);

        !($request->hasFile('image1') && $subCategory->image) ?: $deleteFiles[] = $subCategory->image;
        $subCategory->update($data);

        empty($deleteFiles) ?: Helper::deleteFiles($deleteFiles);
        return redirect()->route('dashboard.sub-categories.index')->with('success', __("Updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        !($subCategory->image) ?: $deleteFiles[] = $subCategory->image;
        empty($deleteFiles) ?: Helper::deleteFiles($deleteFiles);
        return redirect()->route('dashboard.sub-categories.index')->with('success', __('Deleted successfully'));
    }
}
