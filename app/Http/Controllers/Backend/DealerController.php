<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Dealer;

class DealerController extends Controller
{
    public function dealer()
    {
        $dealers = Dealer::orderBy('id','DESC')->get();
        return view('admin.pages.dealer.dealer', compact('dealers'));
    }

    public function dealerviewer($id)
    {
        $dealer = Dealer::where('id',$id)->get();
        return view('admin.pages.dealer.viewdealer', compact('dealer'));
    }

    public function adddealer()
    {
        return view('admin.pages.dealer.adddealer');
    }


    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'phone' => 'required|max:255|unique:dealers,phone',

        ],[
            'phone.unique' => 'Phone no should be unique',
        ]);

        Dealer::create($request->all());
        return redirect(route('admin.dealer'))->with('message','dealer added successfully!');
    }
    public function editdealer($id)
    {
        $dealer = Dealer::where('id', $id)->get();

        return view('admin.pages.dealer.editdealer', compact('dealer'));
    }

    public function updatedealer(Request $request, Dealer $dealer)
    {
        $dealer->update($request->all());
        return redirect('admin/dealer')->with('message', 'Updated Successfully!');
    }

    public function delete(Dealer $dealer)
    {
        $dealer->delete();
        return redirect(route('admin.dealer'))->with('message','Deleted Successfully');
    }

    public function getdealerdetails($id)
    {
        $dealers = Dealer::where('id',$id)->pluck('phone', 'id');
        return json_encode($dealers);
    }
}
