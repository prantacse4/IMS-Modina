<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BalanceDealer;
use App\Models\Backend\BalanceDue;
use App\Models\Backend\Company;
use App\Models\Backend\Dealer;
use App\Models\Backend\DealerPayment;
use App\Models\Backend\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        $companies = Company::all();
        $balancedue = BalanceDue::all();
        $payments = Payment::orderBy('id','DESC')->get();
        return view('admin.pages.payment.to_company.payment', compact('payments','companies', 'balancedue'));
    }

    public function viewallpayments()
    {
        $companies = Company::all();
        $balancedue = BalanceDue::all();
        $payments = Payment::orderBy('id','DESC')->get();
        return view('admin.pages.payment.to_company.viewallpayments', compact('payments','companies', 'balancedue'));
    }



    public function paymentviewer($id)
    {
        $payment = Payment::where('id',$id)->get();
        return view('admin.pages.payment.to_company.viewpayment', compact('payment'));
    }

    public function addpayment()
    {
        $companies = Company::all();
        return view('admin.pages.payment.to_company.addpayment', compact('companies'));
    }


    public function store(Request $request)
    {
        //Validation
        // $request->validate([
        //     'phone' => 'required|max:255|unique:payments,phone',

        // ],[
        //     'phone.unique' => 'Phone no should be unique',
        // ]);
        $com_id = $request->com_id;
        $amount = $request->amount;
        $due = 0;
        //Get company from Balance Due
        $balanceduecom_id = BalanceDue::where('com_id', $com_id)->get();

        if($balanceduecom_id->count() > 0){
            foreach ($balanceduecom_id as $balance) {
                $balance_id = $balance->id;
                $current_balance = $balance->balance;
            }
            $amount = $amount+$current_balance;
            BalanceDue::where('id', $balance_id)->update(['balance' => $amount]);
        }
        else{
            BalanceDue::create(['com_id' => $com_id, 'balance' => $amount]);
        }
        Payment::create($request->all());
        return redirect(route('admin.payment'))->with('message','payment added successfully!');
    }

    public function editbalance($id)
    {
        $companies = Company::all();
        $balance = BalanceDue::where('id', $id)->get();
        return view('admin.pages.payment.to_company.editbalance', compact('balance', 'companies'));
    }

    public function updatebalance(Request $request, BalanceDue $balance)
    {
        $balance->update($request->all());
        return redirect('admin/payment')->with('message', 'Updated Successfully!');
    }

    public function delete(Payment $payment)
    {
        $payment->delete();
        return redirect(route('admin.payment'))->with('message','Deleted Successfully');
    }

    public function deletepaymenthistory(Payment $payment)
    {
        $payment->delete();
        return redirect(route('admin.viewallpayments'))->with('message','Deleted Successfully');
    }





    // public function getpaymentdetails($id)
    // {
    //     $payments = Payment::where('id',$id)->pluck('phone', 'id');
    //     return json_encode($payments);
    // }

    public function dealerpayment()
    {
        $dealers = Dealer::all();
        $balancedealers = BalanceDealer::all();
        $dealerpayments = DealerPayment::orderBy('id','DESC')->get();
        return view('admin.pages.payment.by_dealer.payment', compact('dealers','balancedealers', 'dealerpayments'));
    }

    public function dealerviewallpayments()
    {
        $dealers = Dealer::all();
        $balancedealers = BalanceDealer::all();
        $dealerpayments = DealerPayment::orderBy('id','DESC')->get();
        return view('admin.pages.payment.by_dealer.viewallpayments', compact('dealerpayments','dealers', 'balancedealers'));
    }



    public function dealerpaymentviewer($id)
    {
        $payment = DealerPayment::where('id',$id)->get();
        return view('admin.pages.payment.by_dealer.viewpayment', compact('payment'));
    }

    public function dealeraddpayment()
    {
        $dealers = Dealer::all();
        return view('admin.pages.payment.by_dealer.addpayment', compact('dealers'));
    }


    public function dealerstore(Request $request)
    {
        //Validation
        // $request->validate([
        //     'phone' => 'required|max:255|unique:payments,phone',

        // ],[
        //     'phone.unique' => 'Phone no should be unique',
        // ]);
        $dealer_id = $request->dealer_id;
        $amount = $request->amount;
        $due = 0;
        //Get company from Balance Due
        $balance_dealer_all = BalanceDealer::where('dealer_id', $dealer_id)->get();

        if($balance_dealer_all->count() > 0){
            foreach ($balance_dealer_all as $balance) {
                $balance_id = $balance->id;
                $current_balance = $balance->balance;
            }
            $amount = $amount+$current_balance;
            BalanceDealer::where('id', $balance_id)->update(['balance' => $amount]);
        }
        else{
            BalanceDealer::create(['dealer_id' => $dealer_id, 'balance' => $amount]);
        }
        DealerPayment::create($request->all());
        return redirect(route('admin.dealerpayment'))->with('message','payment added successfully!');
    }

    public function dealerdeletepaymenthistory(Payment $payment)
    {
        $payment->delete();
        return redirect(route('admin.dealerviewallpayments'))->with('message','Deleted Successfully');
    }
}
