<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function inquiryForm($id)
    {
        return view('inquiry-form');
    }

    public function inquiryStore(Request $request)
    {     
        $request->validate([
            'product_query' => ['required']
        ]);

        $inquiry = new Inquiry();
        $inquiry->user_id = \Auth::user()->id;
        $inquiry->product_id = $request->product_id;
        $inquiry->query = $request->product_query;
        $inquiry->save();

        \Session::flash('message', 'Sent inquiry successfully'); 
        \Session::flash('alert-class', 'alert-success'); 
        return redirect()->route('products.index');
    }
}
