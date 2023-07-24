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
                            <form action="/{{ $action == 'update_kategori' ? $action . '/' . $kategori->id : $action }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($action === 'update_kategori')
                                    @method('PUT')
                                @endif
                                <div class="form-group">
                                    <label for="nama_kategori" class="mb-2">Nama Kategori</label>
                                    <input type="text" class="form-control" id="nama_kategori"
                                        placeholder="masukkan nama kategori" name="nama_kategori"
                                        value="{{ $action == 'update_kategori' ? $kategori->nama_kategori : old('nama_kategori') }}" />
                                    @error('nama_kategori')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
