@extends('adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Informasi Tambahan -->
        <div class="row mt-4">
          <div class="col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-folder"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Kategori</span>
                <span class="info-box-number">{{ \App\Models\Kategori::count() }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-newspaper"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Artikel</span>
                <span class="info-box-number">{{ \App\Models\Artikel::count() }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengguna</span>
                <span class="info-box-number">{{ \App\Models\User::count() }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengunjung</span>
                {{-- <span class="info-box-number">{{ \App\Models\Visitor::count() }}</span> --}}
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
<!-- Konten Utama -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h5 class="m-0">Kategori</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Kelola kategori Anda</h6>
                        <p class="card-text">Di sini Anda dapat mengelola kategori Anda. Tambahkan, edit, atau hapus kategori sesuai kebutuhan.</p>
                        <a href="/kategori" class="btn btn-primary">Kelola Kategori</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h5 class="m-0">Artikel</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Kelola artikel Anda</h6>
                        <p class="card-text">Di sini Anda dapat mengelola artikel Anda. Buat, edit, atau hapus artikel sesuai kebutuhan.</p>
                        <a href="/artikel" class="btn btn-primary">Kelola Artikel</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->



      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
