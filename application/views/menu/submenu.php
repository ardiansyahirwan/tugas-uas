<!-- Begin Page Content -->
<!-- Page Heading -->
<div class="container-fluid">
   <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
   <div class="row">
      <div class="col-lg">
         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>
         <?= $this->session->flashdata('message'); ?>
         <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#AddSubmenuModal">Tambah Submenu</a>
         <!-- table content -->
         <table class="table table-hover">
            <thead class="thead-light">
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Url</th>
                  <th scope="col">Icon</th>
                  <th scope="col">Is Active</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($submenu as $sm) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $sm['title']; ?></td>
                     <td><?= $sm['menu']; ?></td>
                     <td><?= $sm['url']; ?></td>
                     <td><?= $sm['icon']; ?></td>
                     <td><?= $sm['is_active']; ?></td>
                     <td>
                        <a href="" class="badge badge-primary">Edit</a>
                        <a href="<?= base_url('menu/hapussubmenu/') . $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $sm['title']; ?> ?');">Delete</a>
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
<div class="modal fade" id="AddSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="AddSubmenuModal Label" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="AddSubmenuModalLabel">Tambah Submenu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <!-- form Add Submenu -->
         <form action="<?= base_url('menu/submenu'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
               </div>
               <div class="form-group">
                  <select name="menu_id" id="menu_id" class="form-control custom-select">
                     <option value="">Pilih Menu</option>
                     <?php foreach ($menu as $m) : ?>
                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
               </div>
               <div class="form-group form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                  <label class="form-check-label" for="is_active">
                     Aktif ?
                  </label>
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