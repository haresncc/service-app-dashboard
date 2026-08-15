<?php

namespace App\Http\Controllers\dashboard;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $categories = Category::filter($request->query())->latest()->paginate(10);
        return view('dashboard.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activeAr = [['id' => '1', 'name' => 'Yes'], ['id' => '0', 'name' => 'No']];
        return view('dashboard.categories.create', ['activeAr' => $activeAr]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']);
        $data = Helper::storeFiles($data, ['image1' => 'image']);

        Category::create($data);
        return redirect()->route('dashboard.categories.index')->with('success', __('Created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $catg = Category::findOrFail($id);
        $category = $catg->getAttributes();
        $imgAr = ['img1' => $category["image"]];
        unset($category["image"]);
        $category["active"] = ($category["active"]) ? 'Yes' : 'No';
        $newAr = array_keys($category);
        return view('dashboard.categories.show', ['showArr' => $category, 'source' => 'categories', 'keys' => $newAr, 'imgAr' => $imgAr]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $activeAr = [['id' => '1', 'name' => 'Yes'], ['id' => '0', 'name' => 'No']];
        return view('dashboard.categories.edit', ['category' => $category, 'activeAr' => $activeAr]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->all();
        $category = Category::findOrFail($id);

        $data = Helper::storeFiles($data, ['image1' => 'image']);
        $data['slug'] = Str::slug($data['name']);

        !($request->hasFile('image1') && $category->image) ?: $deleteFiles[] = $category->image;
        $category->update($data);

        empty($deleteFiles) ?: Helper::deleteFiles($deleteFiles);
        return redirect()->route('dashboard.categories.index')->with('success', __("Updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        !($category->image) ?: $deleteFiles[] = $category->image;
        empty($deleteFiles) ?: Helper::deleteFiles($deleteFiles);
        return redirect()->route('dashboard.categories.index')->with('success', __('Deleted successfully'));
    }
}
