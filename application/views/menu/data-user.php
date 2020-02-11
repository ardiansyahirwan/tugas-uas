<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
   <div class="col-lg-10">
      <?= $this->session->flashdata('message'); ?>
      <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#tambahDataModal">Tambah Data</a>
      <div class="row">
         <table class="table mt-3">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Nama Anggota</th>
                  <th>Email</th>
                  <th>Role ID</th>
                  <th>Aktif</th>
                  <th>Member Sejak</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $i = 1;
               foreach ($DataUser as $du) { ?>
                  <tr>
                     <td><?= $i++; ?></td>
                     <td><?= $du['name']; ?></td>
                     <td><?= $du['email']; ?></td>
                     <td><?= $du['role_id']; ?></td>
                     <td><?= $du['is_active']; ?></td>
                     <td><?= date('Y', $du['date_created']); ?></td>
                     <td>
                        <a href="" class="badge badge-primary">edit</a>
                        <a href="<?= base_url('menu/hapusdatauser/') . $du['id']; ?>" class="badge badge-danger" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $du['name']; ?> ?');">Delete</a>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModal Label" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('menu/datauser'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
               </div>
               <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" id="password" name="password" placeholder="Password">
               </div>
               <div class="form-group">
                  <select name="role_id" id="role_id" class="form-control custom-select">
                     <option value="">Pilih Role</option>
                     <?php foreach ($role as $r) : ?>
                        <option value="<?= $r['id']; ?>"><?= $r['role_id']; ?></option>
                     <?php endforeach; ?>
                  </select>
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