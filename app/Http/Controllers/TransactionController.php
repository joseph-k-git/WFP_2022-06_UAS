<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin-view_any');

        $result = Transaction::all();
        return view("controlpanel.transaction.index", ["data"=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function showAjax(Request $request)
    {
        $this->authorize('admin-view_any');

        $id = $request->id;
        $data = Transaction::find($id);
        $medicines = $data->medicines;

        return response()->json(array(
            'msg' => view('controlpanel.transaction.showdetail', compact('data', 'medicines'))->render(),
        ), 200); //200 OK HTML code
    }

    public function topcustomers()
    {
        $this->authorize('admin-view_any');

        $result = DB::table('users')
            ->join('transactions', 'users.id', '=', 'transactions.user_id')
            ->join('transactions_has_medicines', 'transactions.id', '=', 'transactions_has_medicines.transaction_id')
            ->selectRaw('users.id as id, users.name as name, users.email as email, sum(transactions_has_medicines.quantity * transactions_has_medicines.price) as total_per_user')
            ->groupBy('users.id', 'users.name', 'users.email')
            ->orderBy('total_per_user', 'DESC')
            ->take(3)
            ->get();
        
            
        return view('controlpanel.report.topcustomers', compact('result'));
    }

    public function mytransactions()
    {
        $user = Auth::user();
        $data = Transaction::where('user_id', $user->id)->orderBy('transaction_date', 'DESC')->get();

        return view('storefront.transaction.index', compact('data'));
    }

    public function myAjax(Request $request)
    {
        $id = $request->id;
        $data = Transaction::find($id);

        //$this->authorize('buyer-view_transaction', $data);

        $medicines = $data->medicines;

        return response()->json(array(
            'msg' => view('storefront.transaction.showdetail', compact('data', 'medicines'))->render(),
        ), 200); //200 OK HTML code
    }

    public function checkout()
    {
        $this->authorize('buyer-action_any');

        $cart = session()->get('cart');
        $user = Auth::user();

        $transaction = new Transaction;

        $transaction->user_id = $user->id;
        $transaction->transaction_date = Carbon::now()->toDateTimeString();

        $transaction->save();

        $totalharga = $transaction->insertProducts($cart, $user);

        session()->forget('cart');

        return redirect('/home');
    }
}
