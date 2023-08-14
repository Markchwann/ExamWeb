<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'book_id',
        'qty',
        'return_date',
        'fine_days',
        'fine',
    ];
    public function transaction()
{
    return $this->belongsTo(Transaction::class);
}

public function book()
{
    return $this->belongsTo(Book::class);
}

}
