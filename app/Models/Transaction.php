<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'invoice','jumlah_tiket', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transactiondetail(){
        return $this->hasMany(TransactionDetail::class);
    }
}
