<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Travel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
      //
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'travel', 'user'])->findOrFail($id);

        return view('frontend.checkout_view',[
            'item'=> $item
        ]);
    }
    public function process(Request $request, $id)
    {
        $travel_package = Travel::findOrFail($id);

        $transaction = Transaction::create([
            'travel_id' => $id,
            'users_id'=>Auth::user()->id,
            'additional_visa'=>0,
            'transaction_total'=> $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username'=>Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'passport' => Carbon::now()->addYear(5)
        ]);
        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);
       
        $transaction = Transaction::with(['details','travel'])
        ->findOrFail($item->transactions_id);

        if($item->is_visa)
        {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'passport' => 'required',
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel'])->find($id);

        if($request->is_visa)
        {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel->price;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }
    public function success(Request $request, $id)
    {
        $transaction = Transaction::with([
            'details', 'travel.MultiImgs', 'user'])
        ->findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        return view('frontend.success_view');
    }
}
