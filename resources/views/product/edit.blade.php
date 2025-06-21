@extends('layouts.app')

@section('title', 'Edit Data Produk')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Edit Data Produk {{ $product->nama_produk }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', $product->id_produk) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" value="{{ $product->nama_produk }}">
                            @error('nama_produk')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ $product->harga }}">
                            @error('harga')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Stok Barang</label>
                            <input type="number" name="stok_barang" class="form-control" value="{{ $product->stok_barang }}">
                            @error('stok_barang')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Produk</label>
                            <textarea name="deskripsi_produk" class="form-control" placeholder="Tulis Deskripsi Produk" style="height: 100px">{{ $product->deskripsi_produk }}</textarea>
                            @error('deskripsi_produk')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="button col-sm-12 mt-3">
                        <a href="{{ route('product.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-info">Update Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
