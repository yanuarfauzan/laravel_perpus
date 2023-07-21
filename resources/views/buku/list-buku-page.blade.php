@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
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
                                                    <a href="" class="btn btn-info me-2">
                                                        <i class="bi bi-info-square-fill"></i>
                                                    </a>
                                                    <a href="" class="btn btn-primary me-2">
                                                        <i class="bi bi-pen-fill"></i>
                                                    </a>
                                                    <form action="">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
