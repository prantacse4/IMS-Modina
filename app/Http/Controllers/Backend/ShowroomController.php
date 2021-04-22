<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Showroom;
use Illuminate\Http\Request;
class ShowroomController extends Controller
{
    public function showroom()
    {
        $showrooms = Showroom::orderBy('id','DESC')->get();
        return view('admin.pages.showroom.showroom', compact('showrooms'));
    }

    public function addshowroom()
    {
        return view('admin.pages.showroom.addshowroom');
    }


    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'name' => 'required|max:255,name',
            'phone' => 'required|max:255|unique:showrooms,phone',
            'email' => 'required|max:255|unique:showrooms,email',

        ],[
            'name.required' => 'Name should be not be more than 255 character',
            'phone.unique' => 'Phone should be unique',
            'email.unique' => 'Email should be unique',
        ]);

        Showroom::create($request->all());
        return redirect(route('admin.showroom'))->with('message','Showroom added successfully!');
    }
    public function editshowroom($id)
    {
        $showroom = Showroom::where('id', $id)->get();

        return view('admin.pages.showroom.editshowroom', compact('showroom'));
    }

    public function updateshowroom(Request $request, Showroom $showroom)
    {
        $showroom->update($request->all());
        return redirect('admin/showroom')->with('message', 'Updated Successfully!');
    }

    public function delete(Showroom $showroom)
    {
        $showroom->delete();
        return redirect(route('admin.showroom'))->with('message','Deleted Successfully');
    }

    public function showroomviewer($id)
    {
        $showroom = Showroom::where('id',$id)->get();
        return view('admin.pages.showroom.viewshowroom', compact('showroom'));
    }
}
