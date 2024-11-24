<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowReq extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'borrow_date', 'return_date', 'reason', 'status'];

    // Relasi ke produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope untuk filter berdasarkan status
    public function scopePending(Builder $query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved(Builder $query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected(Builder $query)
    {
        return $query->where('status', 'rejected');
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->status === 'pending') {
            return '<span class="badge badge-warning">Pending</span>';
        } elseif ($this->status === 'approved') {
            return '<span class="badge badge-success">Disetujui</span>';
        } elseif ($this->status === 'rejected') {
            return '<span class="badge badge-danger">Ditolak</span>';
        }
    }

    public function approve()
    {
        $this->update(['status' => 'approved']);

        // Kurangi stok produk
        $this->product->decrement('stok', 1);
    }

    public function reject()
    {
        $this->update(['status' => 'rejected']);
    }
}
