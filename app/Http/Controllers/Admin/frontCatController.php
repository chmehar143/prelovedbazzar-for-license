<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, File, DB, Redirect};
use App\Models\{Product, Category, Subcategory, Childcategory, FrontPage};
use Validator;
use Config;


class frontCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $welcome_categories = FrontPage::with('category')->with('subcategory')->get();
        return view('admin.frontcat.list', compact('welcome_categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.frontcat.create', compact('categories'));
        
    }

    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'category_id' => 'required',
            'subcategory_id' => 'required|unique:front_pages|',
        ];
        $customs = [
            'subcategory_id.unique' => 'Subcategory already exists',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $input = $request->all();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('uploads/front_ad/', $filename, 'public');
            $image = $filename;

        }
        $input['image'] = $image;
        $data = new FrontPage();
        $data->fill($input)->save();
        return redirect()->route('admin.frontcat_list');

    }

    //delete product from stores...
    public function destroy($id)
    {
            $front = FrontPage::where('id', $id)->first();
            $destination = 'storage/uploads/front_ad/'.$front->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $front->delete();
            return response()->json(['success' => 'Record Has Been Deleted!..']);
    }

 
}
