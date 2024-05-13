
 <?php $__env->startSection('content'); ?>
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
        <a href="<?php echo e(route('createKategori')); ?>" class="btn btn-primary" role="button">Tambah Kategori</a>
    </div>
    <div class="card-body p-0">
        
    </div>
    <div class="card-body p-0">
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
            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td> <?php echo e($loop->index + 1); ?></td>
    <td> <?php echo e($kategori->nama_kategori); ?></td>
    <td> <?php echo e($kategori->deskripsi); ?> </td>
    <td>
        <a href="<?php echo e(route('editKategori', ['id' => $kategori->id])); ?>" class="btn btn-warning btn-sm" role="button">Edit</a>
        <a href="<?php echo e(route('deleteKategori', ['id' => $kategori->id])); ?>" class="btn btn-danger btn-sm" role="button">Hapus</a>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
         </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\BlogGamelab\resources\views/kategori/index.blade.php ENDPATH**/ ?>