<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'status',
        'user_id',
        'location',
    ];

    /**
     * Relasi ke user yang meminjam barang ini.
     * Setiap item bisa dipinjam oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk mengambil barang yang tersedia.
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    /**
     * Scope untuk mengambil barang yang sedang dipinjam oleh user tertentu.
     */
    public function scopeBorrowed($query, $userId)
    {
        return $query->where('status', 'borrowed')->where('user_id', $userId);
    }

    /**
     * Scope untuk mengambil barang yang sedang dalam perbaikan.
     */
    public function scopeInRepair($query)
    {
        return $query->where('status', 'in_repair');
    }
}
