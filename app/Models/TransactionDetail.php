<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transactions_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'invoice', 'film_id'
    ];

    public function film(){
        return $this->belongsTo(Film::class, 'film_id');
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'invoice');
    }
}
