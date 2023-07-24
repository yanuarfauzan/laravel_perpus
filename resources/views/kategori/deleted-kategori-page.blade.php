@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-md-6 mb-1">
        </div>
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="me-2">
                        <a href="/kategori" class="btn btn-primary"><i class="bi bi-arrow-left"></i></a>
                    </div>
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
                                @forelse ($deletedKategori as $k)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $k->nama_kategori }}</td>
                                        <td class="d-flex">
                                            <a href="/kategori/{{ $k->id }}/restore" class="badge bg-success"
                                                onclick="showSweetAlert()">
                                                kembalikan</i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data kategori belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $deletedKategori->links() }}
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
