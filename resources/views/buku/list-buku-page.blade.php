@extends('layouts.main')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <a href="/create_buku" class="btn btn-success mb-3">Tambah Data</a>
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-muted font-bold">No</th>
                                    <th scope="col" class="text-muted font-bold">Judul Buku</th>
                                    <th scope="col" class="text-muted font-bold">Penulis Buku</th>
                                    <th scope="col" class="text-muted font-bold">Kategori Buku</th>
                                    <th scope="col" class="text-muted font-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($buku as $b)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $b->judul_buku }}</td>
                                        <td>{{ $b->penulis_buku }}</td>
                                        <td>{{ $b->kategori['nama_kategori'] }}</td>
                                        <td class="d-flex">
                                            <a href="/detail_buku/{{ $b->id }}" class="badge bg-info me-2">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="/edit_buku/{{ $b->id }}" class="badge bg-primary me-2">
                                                <i class="bi bi-pen-fill"></i>
                                            </a>
                                            <a href="/delete_buku/{{ $b->id }}" class="badge bg-danger"
                                                onclick="showSweetAlert()">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $buku->links() }}
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
