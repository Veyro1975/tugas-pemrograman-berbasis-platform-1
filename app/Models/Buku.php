<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Buku extends Model
{
    use HasFactory;

    protected $table = 'books';
    
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'price',
        'stock',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'stock' => 'integer',
        ];
    }
}
