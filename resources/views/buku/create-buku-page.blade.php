@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Inputs</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="/store_buku" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="judul_buku" class="mb-2">Judul Buku</label>
                                    <input type="text" class="form-control" id="judul_buku"
                                        placeholder="masukkan judul buku" name="judul_buku"
                                        value="{{ old('judul_buku') }}" />
                                    @error('judul_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="penulis_buku" class="mb-2">Penulis Buku</label>
                                    <input type="text" class="form-control" id="penulis_buku"
                                        placeholder="masukkan penulis buku" name="penulis_buku"
                                        value="{{ old('penulis_buku') }}" />
                                    @error('penulis_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tahun_terbit_buku" class="mb-2">Tahun Terbit</label>
                                    <input type="text" class="form-control" id="tahun_terbit_buku"
                                        placeholder="masukkan tahun terbit" name="tahun_terbit_buku"
                                        value="{{ old('tahun_terbit_buku') }}" />
                                    @error('tahun_terbit_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kategori_buku" class="mb-2">Kategori Buku</label>
                                    <select class="form-select" id="kategori_buku" name="kategori_buku"
                                        value="{{ old('kategori_buku') }}">
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_buku" class="mb-2">Deskripsi Buku</label>
                                    <textarea class="form-control" id="deskripsi_buku" name="deskripsi_buku" value="{{ old('deskripsi_buku') }}"></textarea>
                                    @error('deskripsi_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="jumlah_buku" class="mb-2">Jumlah Buku</label>
                                    <input type="text" class="form-control" id="jumlah_buku"
                                        placeholder="masukkin jumlah buku" name="jumlah_buku"
                                        value="{{ old('jumlah_buku') }}" />
                                    @error('jumlah_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <div class="form-group col-md-5 me-3">
                                        <div class="input-group mb-3">
                                            <label for="pdf_buku" class="mb-2">File PDF Buku</label>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="pdf_buku"><i
                                                        class="bi bi-upload"></i></label>
                                                <input type="file" class="form-control" id="pdf_buku" name="pdf_buku"
                                                    value="{{ old('pdf_buku') }}" />
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            @error('pdf_buku')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-md-5 ms-3">
                                        <div class="input-group mb-3">
                                            <label for="cover_buku" class="mb-2">Cover Buku</label>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="cover_buku"><i
                                                        class="bi bi-upload"></i></label>
                                                <input type="file" class="form-control" id="cover_buku" name="cover_buku"
                                                    value="{{ old('cover_buku') }}" />
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            @error('cover_buku')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="/buku" class="btn btn-danger">kembali</a>
                                    <button type="submit" class="btn btn-success">simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('deskripsi_buku');
    </script>
@endsection
