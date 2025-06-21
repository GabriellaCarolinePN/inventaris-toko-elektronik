<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;


class ProdukController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    public function detail($id)
    {
        $product = Product::findorFail($id);
        return view('product.detail', compact('product'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga' => 'required|numeric|min:0',
            'stok_barang' => 'required|numeric|min:0',
        ], [
            'nama_produk.required' => 'Nama produk harus diisi',
            'deskripsi_produk.required' => 'Deskripsi produk harus diisi',
            'harga.required' => 'Harga harus diisi',
            'harga.min' => 'Harga tidak boleh minus',
            'stok_barang.required' => 'Stok barang harus diisi',
            'stok_barang.min' => 'Stok tidak boleh minus',
        ]);

        Product::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga' => $request->harga,
            'stok_barang' => $request->stok_barang,
        ]);

        return redirect()->route('product.index')->with('message', 'Data produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findorFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga' => 'required',
            'stok_barang' => 'required',
        ], [
            'nama_produk.required' => 'Nama produk harus diisi',
            'deskripsi_produk.required' => 'Deskripsi produk harus diisi',
            'harga.required' => 'Harga harus diisi',
            'stok_barang.required' => 'Stok barang harus diisi',
        ]);

        Product::where('id_produk', $id)->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga' => $request->harga,
            'stok_barang' => $request->stok_barang
        ]);

        return redirect()->route('product.index')->with('message', 'Data produk berhasil diubah');
    }

    public function destroy($id)
    {
        Product::findorFail($id)->delete();
        return redirect()->route('product.index')->with('message', 'Data produk berhasil dihapus');
    }

    public function exportPdf()
    {
        $product = Product::all();
        $pdf = PDF::loadView('product.export-pdf', compact('product'));
        return $pdf->download('data-produk.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductExport, 'data-produk.xlsx');
    }
}
