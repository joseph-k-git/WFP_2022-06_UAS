<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function medicines()
    {
        return $this->hasMany('App\Medicine', 'category_id', 'id'); // Nama model, nama Foreign Key di tabel medicines, nama Primary Key
    }
}
