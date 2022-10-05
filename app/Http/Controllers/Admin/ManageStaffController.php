<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use Config;

class ManageStaffController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public  function  list()
    {
        $members = Admin::all();
        $role = Config::get('constants.role');
        return view('admin.managestaff.list', compact('members', 'role'));
    }

    public  function  create()
    {
        return view('admin.managestaff.create');
    } 

    public  function  store(Request $request)
    {
        $validate = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email',
            'cell' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);
        if(!$validate){
            return response()->back()->flash('somthing went wrong!');
        }
        $admin = new Admin();
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('uploads/admins/', $filename, 'public');
            $admin->image = $filename;

        }
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->cell = $request->input('cell');
        $admin->role = $request->input('role');
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        return redirect()->route('admin.managestaff_list');

    }

    public  function  edit($id)
    {
        $staff = Admin::where('id', $id)->first();
        $roles = Config::get('constants.role');
        return view('admin.managestaff.edit', compact('staff', 'roles'));
    }

    public  function  update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cell' => 'required',
            'role' => 'required',
        ]);
        if(!$validate){
            return response()->back()->flash('somthing went wrong!');
        }
        $admin = Admin::where('id', $id)->first();
        if($admin){
            if($request->hasfile('avatar'))
            {
                //new 
                $destination = 'storage/uploads/admins/'.$admin->image;
                if(File::exists($destination))
                    {
                        File::delete($destination);
                    }
                //end new
                $file = $request->file('avatar');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->storeAs('uploads/admins/', $filename, 'public');
                $admin->image = $filename;
    
            }
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->cell = $request->input('cell');
            $admin->role = $request->input('role');
            $admin->update();
            return redirect()->route('admin.managestaff_list');
        }

    }
    
    public  function  view($id)
    {
        $staff = Admin::where('id', $id)->first();
        $role = Config::get('constants.role');
        return view('admin.managestaff.view', compact('staff', 'role'));
    }

    //delete product from stores...
    public function destroy($id)
    {
         $staff = Admin::where('id', $id)->first();
         if($staff){
            $destination = asset('storage/uploads/admins/'.$staff->image);
            if(File::exists($destination))
              {
                  File::delete($destination);
              }
            $staff->delete();
            return response()->json(['success' => 'Record Has Been Deleted!..']);
         }

    }
}
