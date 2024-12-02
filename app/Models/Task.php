<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Menentukan kolom yang bisa diisi massal
    protected $fillable = [
        'title', 'description', 'status',
    ];

    // Jika kamu menggunakan enum di database, kamu bisa menambahkan getter untuk status, misalnya:
    // public function getStatusAttribute($value)
    // {
    //     return ucfirst($value); // Menambahkan kapitalisasi pada status
    // }
}
