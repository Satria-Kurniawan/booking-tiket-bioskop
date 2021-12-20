<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul', 'tanggal_tayang', 'waktu_tayang', 'image', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function transactiondetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
