@extends('layouts.main')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-6 mb-1">
        </div>
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <a href="/create_kategori" class="btn btn-success mb-3">Tambah Data</a>
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-muted font-bold">No</th>
                                    <th scope="col" class="text-muted font-bold">Nama Kategori</th>
                                    <th scope="col" class="text-muted font-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @forelse ($kategori as $k)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $k->nama_kategori }}</td>
                                        <td class="d-flex">
                                            <a href="/edit_kategori/{{ $k->id }}" class="badge bg-primary me-2">
                                                <i class="bi bi-pen-fill"></i>
                                            </a>
                                            <a href="/delete_kategori/{{ $k->id }}" class="badge bg-danger"
                                                onclick="showSweetAlert()">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data kategori belum Tersedia.
                                        </div>
                                @endforelse
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $kategori->links() }}
                    </div>
                </div>
            </div>
        </div>
        <script>
            function showSweetAlert() {
                Swal.fire({
                    title: 'Buku Berhasil Dihapus',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }
        </script>
    @endsection
