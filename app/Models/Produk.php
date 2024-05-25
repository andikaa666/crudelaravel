<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'deskripsi', 'harga', 'image', 'id_merk'];
    protected $visible = ['nama', 'deskripsi', 'harga', 'image', 'id_merk'];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }
}
