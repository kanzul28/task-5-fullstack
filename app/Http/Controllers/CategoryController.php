<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return response([ 'categories' => 
        CategoryResource::collection($categories), 
        'message' => 'Successful'], 200);
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
         $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 
            'Validation Error']);
        }

        $category = Category::create($data);

        return response([ 'category' => new 
        CategoryResource($employee), 
        'message' => 'Success'], 200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response([ 'category' => new 
        CategoryResource($category), 'message' => 'Success'], 200);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return response([ 'category' => new 
        CategoryResource($category), 'message' => 'Success'], 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
         $category->delete();

        return response(['message' => 'Category deleted']);
        //
    }
}
