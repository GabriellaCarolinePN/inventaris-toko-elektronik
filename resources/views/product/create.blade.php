@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Tambah Produk</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') }}">
                            @error('nama_produk')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">
                            @error('harga')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Stok Barang</label>
                            <input type="number" name="stok_barang" class="form-control" value="{{ old('stok_barang') }}">
                            @error('stok_barang')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" name="deskripsi_produk" placeholder="Tulis Deskripsi Produk" style="height: 100px">{{ old('deskripsi_produk') }}</textarea>
                            @error('deskripsi_produk')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="button col-sm-12 mt-3">
                        <a href="{{ route('product.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
