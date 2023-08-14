<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_type_id',
        'book_name',
        'description',
        'publisher',
        'year',
        'stock'
    ];

    public function bookType()
    {
        return $this->belongsTo(BookType::class, 'book_type_id');
    }

    public function detailTransactions()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}

