<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    //Create Many-to-Many
    public function medicines()
    {
        return $this->belongsToMany('App\Medicine', 'transactions_has_medicines', 'transaction_id', 'medicine_id') // to Override names
            ->withPivot('quantity', 'price');
    }

    //Checkout
    public function insertProducts($cart, $user)
    {
        $total = 0;
        foreach ($cart as $id => $detail) {
            $quantity = $detail['quantity'];
            $price = $detail['price'];

            $total += $quantity * $price;

            $this->medicines()->attach($id, ['quantity' => $quantity, 'price' => $price]);
        }
        return $total;
    }
}
