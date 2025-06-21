<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    const CREATED_AT = 'tanggal_dibuat';
    const UPDATED_AT = 'tanggal_diperbarui';

    protected $fillable = [
        'nama_produk',
        'deskripsi_produk',
        'harga',
        'stok_barang',
        'tanggal_dibuat',
        'tanggal_diperbarui',
    ];
}
