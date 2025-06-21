<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::select('nama_produk', 'harga', 'stok_barang', 'tanggal_dibuat', 'tanggal_diperbarui')->get();
    }

    public function headings(): array
    {
        return ['Nama Produk', 'Harga', 'Stok Barang', 'Tanggal Dibuat', 'Tanggal Diperbarui'];
    }
}
