@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $subTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="/{{ $action == 'update_buku' ? $action . '/' . $bukuById->id : $action }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($action === 'update_buku')
                                    @method('PUT')
                                @endif
                                <div class="form-group">
                                    <label for="judul_buku" class="mb-2">Judul Buku</label>
                                    <input type="text" class="form-control" id="judul_buku"
                                        placeholder="masukkan judul buku" name="judul_buku"
                                        value="{{ $action == 'update_buku' ? $bukuById->judul_buku : old('judul_buku') }}" />
                                    @error('judul_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="penulis_buku" class="mb-2">Penulis Buku</label>
                                    <input type="text" class="form-control" id="penulis_buku"
                                        placeholder="masukkan penulis buku" name="penulis_buku"
                                        value="{{ $action == 'update_buku' ? $bukuById->penulis_buku : old('penulis_buku') }}" />
                                    @error('penulis_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tahun_terbit_buku" class="mb-2">Tahun Terbit</label>
                                    <input type="text" class="form-control" id="tahun_terbit_buku"
                                        placeholder="masukkan tahun terbit" name="tahun_terbit_buku"
                                        value="{{ $action == 'update_buku' ? $bukuById->tahun_terbit_buku : old('tahun_terbit_buku') }}" />
                                    @error('tahun_terbit_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kategori_buku" class="mb-2">Kategori Buku</label>
                                    <select class="form-select" id="kategori_buku" name="kategori_buku"
                                        value="{{ $action == 'update_buku' ? $bukuById->kategori_buku : old('kategori_buku') }}">
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}"
                                                @if ($action == 'update_buku') {{ $bukuById->kategori_buku === $k->id ? 'selected' : '' }} @endif>
                                                {{ $k->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_buku" class="mb-2">Deskripsi Buku</label>
                                    <textarea class="form-control" id="deskripsi_buku" name="deskripsi_buku">
                                        {{ $action == 'update_buku' ? $bukuById->deskripsi_buku : old('deskripsi_buku') }}
                                    </textarea>
                                    @error('deskripsi_buku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="form-group col-md-4 me-1">
                                        <label for="jumlah_buku" class="mb-2">Jumlah Buku</label>
                                        <input type="text" class="form-control" id="jumlah_buku"
                                            placeholder="masukkin jumlah buku" name="jumlah_buku"
                                            value="{{ $action == 'update_buku' ? $bukuById->jumlah_buku : old('jumlah_buku') }}" />
                                        @error('jumlah_buku')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 ms-1 me-1">
                                        <div class="input-group mb-3">
                                            <label for="pdf_buku" class="mb-2">File PDF Buku</label>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="pdf_buku"><i
                                                        class="bi bi-upload"></i></label>
                                                <input type="file" class="form-control" id="pdf_buku" name="pdf_buku"
                                                    value="{{ $action == 'update_buku' ? $bukuById->pdf_buku : old('pdf_buku') }}" />
                                                <div class="mb-3"><img src="" id="output" width="200"
                                                        style="display: none;" class="img-thumbnail"></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            @error('pdf_buku')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 me-1">
                                        <div class="input-group mb-3">
                                            <label for="cover_buku" class="mb-2">Cover Buku</label>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="cover_buku"><i
                                                        class="bi bi-upload"></i></label>
                                                <input type="file" class="form-control" id="cover_buku"
                                                    name="cover_buku"
                                                    value="{{ $action == 'update_buku' ? $bukuById->cover_buku : old('cover_buku') }}" />
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
                                    <button type="submit" class="btn btn-success"
                                        onclick="showSweetAlert()">simpan</button>
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
    <script>
        function showSweetAlert() {
            Swal.fire({
                title: 'Buku Berhasil Disimpan',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>
@endsection
