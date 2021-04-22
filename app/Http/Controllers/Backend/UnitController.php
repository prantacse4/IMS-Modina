<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Unit;

class UnitController extends Controller
{
    public function unit()
    {
        $units = Unit::orderBy('id','DESC')->get();
        return view('admin.pages.product.unit', compact('units'));
    }

    public function unitviewer($id)
    {
        $unit = Unit::where('id',$id)->get();
        return view('admin.pages.product.viewunit', compact('unit'));
    }

    public function addunit()
    {
        return view('admin.pages.product.addunit');
    }

    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'unit' => 'required|max:255|unique:units,unit'

        ],[
            'unit.unique' => 'Unit should be unique',
        ]);

        Unit::create($request->all());
        return redirect(route('admin.unit'))->with('message','Unit added successfully!');
    }

    public function editunit($id)
    {
        $unit = Unit::where('id', $id)->get();

        return view('admin.pages.product.editunit', compact('unit'));
    }

    public function updateunit(Request $request, Unit $unit)
    {
        $request->validate([
            'unit' => 'required'
                    ]);
        $unit->update($request->all());
        return redirect('admin/unit')->with('message', 'Updated Successfully!');
    }

    public function delete(Unit $unit)
    {
        $unit->delete();
        return redirect(route('admin.unit'))->with('message','Deleted Successfully');
    }

}
