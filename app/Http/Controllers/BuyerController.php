<?php

namespace App\Http\Controllers;

use App\User;
use App\Medicine;
use App\Transaction;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin-view_any');

        $buyers = User::where('role', '=', 'buyer')->get();
        return view('controlpanel.buyer.index', compact('buyers'));
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buyer = User::find($id);
        $transactions = Transaction::where('user_id', $buyer->id)->with('medicines')->get();

        $totals = [];
        foreach ($transactions as $t => $tran) {
            $totals[$tran->id] = 0;
            $medicines = $tran->medicines;
            foreach ($medicines as $m => $med) {
                $item_detail = $med->pivot;
                $quantity = $item_detail->quantity;
                $price = $item_detail->price;
                $totals[$tran->id] += $quantity * $price;
            }
        }

        return view('controlpanel.buyer.show', compact('buyer', 'transactions', 'totals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function addToCart($medicine_id)
    {
        $p = Medicine::find($medicine_id);

        $cart = session()->get('cart');

        if (!isset($cart[$medicine_id])) {
            $cart[$medicine_id] = [
                'id' => $p->id,
                'name' => $p->generic_name." (".$p->form.")",
                'quantity' => 0,
                'price' => $p->price,
                'photo' => $p->image,
            ];
        }
        $cart[$medicine_id]['quantity'] += 1;

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product '.$cart[$medicine_id]['name'].' added to cart successfully');
    }

    public function subtractFromCart($medicine_id)
    {
        $cart = session()->get('cart');

        $message = "Already 0 quantity";
        if (isset($cart[$medicine_id])) {
            $cart[$medicine_id]['quantity']--;
            $message = 'Product '.$cart[$medicine_id]['name'].' subtract to cart successfully';
            if ($cart[$medicine_id]['quantity'] <= 0) {
                unset($cart[$medicine_id]);
            }
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', $message);
    }
}
