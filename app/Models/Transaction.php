<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'transactions';

    public function detail(){
        return $this->hasMany(TransactionDetail::class, 'transactions_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
