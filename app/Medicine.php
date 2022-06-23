<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id'); // Nama model, nama Foreign Key di tabel medicines
    }

    //Create Many-to-Many
    public function transactions()
    {
        return $this->belongsToMany('App\Transaction', 'transactions_has_medicines', 'medicine_id', 'transaction_id') // to Override names
            ->withPivot('quantity', 'price');
    }
}
