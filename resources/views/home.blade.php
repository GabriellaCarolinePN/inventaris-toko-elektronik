@extends('layouts.app')

@section('title', 'Dashboard Toko Elektronik')

@section('content')
    <h3 class="mb-4">Dashboard Toko Elektronik</h3>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Produk</h5>
                    <h2>{{ $jumlahProduk }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-danger">
                <div class="card-body text-center">
                    <h5 class="card-title">Produk yang Hampir Habis</h5>
                    <br>
                    <h6>(Stok < 5)</h6>
                    <h2>{{ $produkStokRendah }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
