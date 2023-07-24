@extends('layouts.main')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-6 mb-1">
            <div class="input-group mb-3">
                <div class="me-2">
                    <a href="/buku" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i></i></i></a>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        pilih kategori
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($kategori as $k)
                            <li><a class="dropdown-item"
                                    href="/search_buku/{{ $k->nama_kategori }}">{{ $k->nama_kategori }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body px-4 py-4-5">
                @if (session('user_data')['role_id'] === 1)
                    <a href="/create_buku" class="btn btn-success mb-3">Tambah Data</a>
                @endif
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start table-responsive">
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
                                @forelse ($buku as $b)
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
                                    <tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data buku belum Tersedia.
                                        </div>
                                    </tr>
                                @endforelse
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
