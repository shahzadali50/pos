<?php

namespace App\Http\Controllers;
use App\Models\Brand;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function brand(){
        return view('brand.brand-add');
    }
    // insert
    public function insert(Request $request){
        Brand::create($request->all());
        flashy()->info('Brand will be Added Successfully. ✅', '#');
        return redirect()->route('brand');
    }
    public function list(){
        $brand = Brand::get();
        return view ('brand.brand-list',['brand'=>$brand]);

    }
    // delete
    public function delete($id){
        // Find the brand by ID
    $brand = Brand::find($id);

// Check if the brand exists
    if ($brand) {
    // Delete the brand
    $brand->delete();

    // return "Brand with ID {$id} has been deleted.";
    flashy()->error('brand will be Deleted Successfully. ✅', '#');
    return redirect()->route('brand.list');
    }
    else {
    return "Brand with ID {$id} not found.";
     }
   }
//    BrandEdit
   public function BrandEdit($id){
      $Brand =  Brand::find($id);
    //   return  $update;
    return view('brand.brand-update', ['Brand'=> $Brand]);



   }
//    BrandUpdate
   public function BrandUpdate(Request $request,$id){
    $request->validate([
        'name' => 'required|string',
            'status' => 'required|in:1,0',
   ]);
   $Brand = Brand::find($id);
   if($Brand){
    $Brand->update([

        'name'=>$request->input('name'),
        'status'=>$request->input('status')
   ]);
    flashy()->info('Brand will be Updated Successfully. ✅', '#');
    return redirect()->route('brand.list');
   }
   else
   {
            flashy()->error('Some Error Occur. ✅', '#');
            return redirect()->route('brand');
    }


}

public function status(Request $request)
    {
        $member = Brand::find($request->member_id);
        $member->status = $request->BrandStatus;
        $member->save();
    }

}



