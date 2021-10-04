<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee()
    {
        $employees = Employee::orderBy('id','DESC')->get();
        return view('admin.pages.employee.employee', compact('employees'));
    }

    public function employeeviewer($id)
    {
        $employee = Employee::where('id',$id)->get();
        return view('admin.pages.employee.viewemployee', compact('employee'));
    }



    public function addemployee()
    {
        return view('admin.pages.employee.addemployee');
    }

    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'phone' => 'required|max:255|unique:dealers,phone',

        ],[
            'phone.unique' => 'Phone no should be unique',
        ]);

        Employee::create($request->all());
        return redirect(route('admin.employee'))->with('message','Employee added successfully!');
    }


    public function delete(employee $employee)
    {
        $employee->delete();
        return redirect(route('admin.employee'))->with('message','Deleted Successfully');
    }


    public function editemployee($id)
    {
        $employee = Employee::where('id', $id)->get();

        return view('admin.pages.employee.editemployee', compact('employee'));
    }

    public function updateemployee(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect('admin/employee')->with('message', 'Updated Successfully!');
    }
}
