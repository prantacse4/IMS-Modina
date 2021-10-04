<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Employee;
use App\Models\Backend\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function salary()
    {
        $salaries = Salary::orderBy('id','DESC')->get();
        return view('admin.pages.salary.salary', compact('salaries'));
    }



    public function getSalary($employeeid)
    {
        $salary = Employee::where('employeeid',$employeeid)->get();
        return json_encode($salary);
    }

    

    public function addsalary()
    {
        $employees = Employee::all();

        return view('admin.pages.salary.addsalary', compact('employees'));
    }

    public function store(Request $request)
    {
        //Validation

        Salary::create($request->all());
        return redirect(route('admin.salary'))->with('message','Salary added successfully!');
    }


    public function delete(Salary $salary)
    {
        $salary->delete();
        return redirect(route('admin.salary'))->with('message','Deleted Successfully');
    }




}
