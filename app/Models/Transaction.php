<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //get data
    //$transaksi = Transaksi::find(1);
    //$status = $transaksi->status;
    //$payment = $transaksi->payment;
}
