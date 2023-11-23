<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller

{
    public function Catogory_Add()
    {
        return view('categories-add');
    }
    // insert
    public function insert(Request $request){
        Category::create($request->all());
        // return $request;
        flashy()->info('Category will be Added Successfully. ✅', '#');
        return redirect()->route('category');
    }
    // list
    public function list(){
       $Category= Category::get();
    //    return   $Category;
       return view('catogories-list',['Category'=> $Category]);
    }
    // delete
    public function delete($id){
     Category::find($id)->delete();
     flashy()->error('Record will be Deleted Successfully. ✅', '#');
    return redirect()->route('category.list');
    }

    // CategoryUpdateForm
    public function CategoryUpdateForm($id)
    {
        $Category = Category::find($id);
        // return $category;

        return view('category-update', ['Category'=> $Category]);
    }

    // CategoryUpdatedRecord

    public function CategoryUpdatedRecord(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|in:1,0',
        ]);

        $category = Category::find($id);

        if ($category) {
            $category->update([
                'name' => $request->input('name'),
                'status' => $request->input('status'),
            ]);
            flashy()->info('Category will be Updated Successfully. ✅', '#');

            return redirect()->route('category.list');
        }
        else {
            flashy()->error('Some Error Occur. ✅', '#');
            return redirect()->route('category');
        }
    }
}





