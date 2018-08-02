<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests;
use App\Event;

class CategoriesController extends BackendController
{
  
    public function __construct(){
        parent::__construct();
    }

    public function index(Request $request)
    {
        $categories = Category::with('events')->orderBy('title')->paginate($this->limit);
        $categoriesCount = Category::count();

        return view('backend.categories.index', compact('categories', 'categoriesCount'));
    }

    public function create()
    {
        $category  = new Category(); 
        return view('backend.categories.create', compact('category'));
    }

    public function store(Requests\CategoryStoreRequest $request)
    {
        Category::create($request->all());
        return redirect('dashboard/categories/')->with('success', 'New Category was created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category  = Category::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }

    public function update(Requests\CategoryUpdateRequest $request, $id)
    {
        Category::findOrFail($id)->update($request->all());
        return redirect('dashboard/categories/')->with('success', 'Category was updated successfully');

    }

    public function destroy(Requests\CategoryDestroyRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        Event::withTrashed()->where('category_id', $id)->update(['category_id' => config('cms.default_category_id')]);
        $category->delete();

        return redirect('dashboard/categories/')->with('success', 'Category was deleted successfully');

    }
}
