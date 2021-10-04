<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense()
    {
        $expenses = Expense::orderBy('id','DESC')->get();
        return view('admin.pages.expense.expense', compact('expenses'));
    }




    public function addexpense()
    {
        return view('admin.pages.expense.addexpense');
    }

    public function store(Request $request)
    {
        //Validation
  

        Expense::create($request->all());
        return redirect(route('admin.expense'))->with('message','Expense added successfully!');
    }


    public function delete(Expense $expense)
    {
        $expense->delete();
        return redirect(route('admin.expense'))->with('message','Deleted Successfully');
    }


    public function editexpense($id)
    {
        $expense = Expense::where('id', $id)->get();

        return view('admin.pages.expense.editexpense', compact('expense'));
    }

    public function updateexpense(Request $request, Expense $expense)
    {
        $expense->update($request->all());
        return redirect('admin/expense')->with('message', 'Updated Successfully!');
    }
}
