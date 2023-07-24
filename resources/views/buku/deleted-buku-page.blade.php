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
                <div class="row">
                    <div class="me-2">
                        <a href="/buku" class="btn btn-primary"><i class="bi bi-arrow-left"></i></a>
                    </div>
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
                                @forelse ($deletedBuku as $b)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $b->judul_buku }}</td>
                                        <td>{{ $b->penulis_buku }}</td>
                                        <td>{{ $b->kategori['nama_kategori'] }}</td>
                                        <td class="d-flex">
                                            <a href="/buku/{{ $b->id }}/restore" class="badge bg-success"
                                                onclick="showSweetAlert()">
                                                kembalikan</i>
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
                        {{ $deletedBuku->links() }}
                    </div>
                </div>
            </div>
        </div>
        <script>
            function showSweetAlert() {
                Swal.fire({
                    title: 'Buku Berhasil Dikembalikan',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }
        </script>
    @endsection
