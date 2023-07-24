@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row match-height">
                    <div class=" col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detail Buku</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="/image/{{ $buku->cover_buku }}" alt="" width="300px">
                                        <h4 class="card-title mt-3">{{ $buku->judul_buku }}</h4>
                                        <p style="text-align: justify;">
                                            {{ strip_tags($buku->deskripsi_buku, '<br><b><i><u><a><ul><ol><li>') }}</p>
                                    </div>
                                    <h4 class="card-title mt-3">Deskripsi Buku</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item">Penulis Buku : {{ $buku->penulis_buku }}</li>
                                        <li class="list-group-item">Tahun Terbit : {{ $buku->tahun_terbit_buku }}</li>
                                        <li class="list-group-item">Kategori Buku:
                                            {{ $buku->kategori['nama_kategori'] }}</li>
                                        <li class="list-group-item">Jumlah Buku : {{ $buku->jumlah_buku }}</li>
                                    </ul>
                                    <div class="text-center mt-3" style="text-align: justify">
                                        <object data="pdf_buku/{{ $buku->pdf_buku }}" type="application/pdf" width="100%"
                                            height="600px">
                                            <p>Maaf, browser Anda tidak mendukung penampilan PDF. Silakan download file PDF
                                                di sini:
                                        </object>
                                        <a href="/pdf_buku/{{ $buku->pdf_buku }}" class="btn btn-success"><i
                                                class="bi bi-file-earmark-pdf-fill"> Download
                                                PDF</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
