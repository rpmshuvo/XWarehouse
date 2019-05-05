<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|moderator')->except('index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $categories= Category::all();
        return view('category.categories')->with('categories',$categories); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'category'=>'required']);
        $category=Category::where('name',$request->input('category'))->first();
        if (empty($category)) {
          $category=new Category;
          $category->name=$request->input('category');
          $category->save();
          return redirect('/categories')->with('success','category added successfully');
        } else {
          return redirect('/categories')->with('error','this category is also available');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('category.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'category'=>'required']);
        $category=Category::find($id);
        $category->name=$request->input('category');
        $categoryFind=Category::where('name',$category->name)->first();
        if (empty($categoryFind)) {
          $category->save();
          return redirect('/categories')->with('success','category added successfully');
        } else {
          return redirect('/categories')->with('error','this category is also available');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('/categories')->with('success','successfully deleted');
    }
}
