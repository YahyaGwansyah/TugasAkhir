<!-- index.blade.php -->

@extends('adminlte.layouts.app')

@section('content')

<style>
    .pagination {
        margin: 0;
        padding: 0;
    }

    .pagination .page-item .page-link {
        font-size: 14px; /* Sesuaikan dengan ukuran yang diinginkan */
        padding: 5px 10px; /* Sesuaikan dengan ukuran yang diinginkan */
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Kategori</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Kategori</li>
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
                <div class="card-header text-right">
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary" role="button">Tambah Kategori</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="mb-3">
                            <form action="{{ route('kategori.index') }}" method="GET" class="form-inline">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ $request->get('search') }}">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Cari</button>
                                @if ($request->get('search'))
                                    <a href="{{ route('kategori.index') }}" class="btn btn-danger ml-2">Reset</a>
                                @endif
                            </form>
                        </div>
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $kategori->nama_kategori }}</td>
                                    <td>{{ $kategori->deskripsi }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('kategori.edit',$kategori->id) }}" class="btn btn-warning btn-sm mr-2" role="button">Edit</a>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$kategori->id}}">Hapus</button>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{$kategori->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$kategori->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{$kategori->id}}">Konfirmasi Hapus Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus kategori ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('kategori.destroy', $kategori->id)}}" method="post">
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
                    <div class="d-flex justify-content-center mt-3">
                        {{ $kategoris->appends(['search' => $request->get('search')])->links('vendor.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
