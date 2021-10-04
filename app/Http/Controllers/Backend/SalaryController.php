<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function salary()
    {
        $employees = Salary::orderBy('id','DESC')->get();
        return view('admin.pages.salary.salary', compact('salaries'));
    }

    public function employeeviewer($id)
    {
        $employee = Salary::where('id',$id)->get();
        return view('admin.pages.salary.viewsalary', compact('salaries'));
    }



    public function addcompany()
    {
        return view('admin.pages.salary.addsalary');
    }

    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'phone' => 'required|max:255|unique:dealers,phone',

        ],[
            'phone.unique' => 'Phone no should be unique',
        ]);

        Salary::create($request->all());
        return redirect(route('admin.salary'))->with('message','Salary added successfully!');
    }


    public function delete(Salary $salary)
    {
        $salary->delete();
        return redirect(route('admin.salary'))->with('message','Deleted Successfully');
    }


    public function editsalary($id)
    {
        $salary = Salary::where('id', $id)->get();

        return view('admin.pages.salary.editsalary', compact('salary'));
    }

    public function updatesalary(Request $request, Salary $salary)
    {
        $salary->update($request->all());
        return redirect('admin/salary')->with('message', 'Updated Successfully!');
    }
}
