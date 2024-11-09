<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi Laravel
    protected $table = 'request';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'product_name',
        'category',
        'status',
    ];

    /**
     * Relasi dengan model User.
     * Setiap request dibuat oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
