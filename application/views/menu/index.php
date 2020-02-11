<!-- Begin Page Content -->
<!-- Page Heading -->
<div class="container-fluid">
   <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
   <div class="row">
      <div class="col-lg-7">
         <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
         <?= $this->session->flashdata('message'); ?>
         <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#AddMenuModal">Tambah Menu</a>
         <!-- table content -->
         <table class="table table-hover">
            <thead class="thead-light">
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($menu as $m) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $m['menu']; ?></td>
                     <td>
                        <a href="" class="badge badge-primary">Edit</a>
                        <a href="<?= base_url('menu/hapusmenu/') . $m['id']; ?>" class="badge badge-danger" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $m['menu']; ?> ?');">Delete</a>
                     </td>
                  </tr>
                  <?php $i++; ?>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="AddMenuModal" tabindex="-1" role="dialog" aria-labelledby="AddMenuModal Label" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="AddMenuModalLabel">Tambah Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('menu'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="menu" name="menu" placeholder="Enter new Menu">
                  <small class="form-text text-muted">Tambah dan Atur Menu mu</small>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Tambah</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
         </form>
      </div>
   </div>
</div>