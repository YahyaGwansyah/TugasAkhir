@extends('adminlte.layouts.app')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Artikel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar artikel</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-right">
                <a href="{{ route('artikel.create') }}" class="btn btn-primary" role="button">Tambah Artikel</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div class="mb-3">
                        <form action="{{ route('artikel.index') }}" method="GET" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ $request->get('search') }}">
                            </div>
                            <button type="submit" class="btn btn-primary ml-2">Cari</button>
                            @if ($request->get('search'))
                                <a href="{{ route('artikel.index') }}" class="btn btn-danger ml-2">Reset</a>
                            @endif
                        </form>
                    </div>
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $artikel)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    @if ($artikel->gambar)
                                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar Artikel" style="max-width: 100px;">
                                    @else
                                    <p>Tidak ada gambar</p>
                                    @endif
                                </td>
                                <td>{{ $artikel->kategori->nama_kategori }}</td>
                                <td>{{ $artikel->judul }}</td>
                                <td>{{ $artikel->konten }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm" role="button">Edit</a>
                                    <button class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deleteModal{{$artikel->id}}">Hapus</button>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{$artikel->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$artikel->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{$artikel->id}}">Konfirmasi Hapus Artikel</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus artikel ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('artikel.destroy', $artikel->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Delete Modal -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center mt-3">
                        {{ $artikels->appends(request()->input())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->

@endsection
