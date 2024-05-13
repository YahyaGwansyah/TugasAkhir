@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Artikel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}">Daftar Artikel</a></li>
                        <li class="breadcrumb-item active">Update Artikel</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" required value="{{ $artikel->judul }}" placeholder="Masukkan judul artikel">
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control-file">
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar Artikel" class="mt-2" style="max-width: 200px;">
                        </div>

                        {{-- <div class="form-group">
                            <label for="konten">Konten</label>
                            <textarea name="konten" id="konten" rows="5" class="form-control" required placeholder="Masukkan konten artikel">{{ $artikel->konten }}</textarea>
                        </div> --}}

                        <div class="form-group">
                            <label for="konten">Konten</label>
                            <textarea name="konten" id="konten" rows="5" class="form-control" required placeholder="Masukkan konten artikel">{{ $artikel->deskripsi }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori_id" id="kategori" class="form-control" required>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" @if($kategori->id == $artikel->kategori_id) selected @endif>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi"  class="form-control" required value="{{ $artikel->deskripsi }}" placeholder="Masukkan deskripsi artikel">
                        </div> --}}

                        <div class="text-right">
                            <a href="{{ route('artikel.index') }}" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
