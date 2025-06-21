@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Daftar Produk</h3>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <a href="{{ route('product.export.pdf') }}" class="btn btn-danger">Export PDF</a>
                    <a href="{{ route('product.export.excel') }}" class="btn btn-success">Export Excel</a>
                </div>
                <div>
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah Data Produk</a>
                </div>
            </div>

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table class="table table-bordered table-striped" id="tabel-produk">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi Produk</th>
                        <th>Harga</th>
                        <th>Stok Barang</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Diperbarui</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->deskripsi_produk }}</td>
                            <td data-order="{{ $item->harga }}">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </td>
                            <td>{{ $item->stok_barang }}</td>
                            <td>{{ $item->tanggal_dibuat }}</td>
                            <td>{{ $item->tanggal_diperbarui }}</td>
                            <td>
                                <a href="{{ route('product.edit', $item->id_produk) }}" class="btn btn-warning">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapus{{ $item->id_produk }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal -->
    @foreach ($product as $item)
        <div class="modal fade" id="hapus{{ $item->id_produk }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('product.destroy', $item->id_produk) }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin hendak menghapus produk "{{ $item->nama_produk }}"?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tabel-produk').DataTable();
        });
    </script>
@endpush
