<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $categories = Category::paginate(10);
      //  return view('Category.index', ['categories'=> $categories]);
      $categories = Category::paginate(10);
        foreach($categories as $category){
            $category->setAttribute('path', '/categories/'. $category->slug);
        }
        return $categories;
    }

    public function getCategories(){
        $categories = Category::paginate(10);
        foreach($categories as $category){
            $category->setAttribute('path', '/categories/'. $category->slug);
        }
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=> 'mims:jpg,png|max:4000'
            ]);
        $name = null;

        if($request->hasFile('image')){
            $extension = $request->image->getClientOriginalExtension();
            $name = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images', $name));
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->image()->create(['file_name'=>$name]);

        $category->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug);
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            Storage::delete($category->image()->file_name);
        }
        
    }
}
