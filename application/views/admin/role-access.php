<!-- Begin Page Content -->
<!-- Page Heading -->
<div class="container-fluid">
   <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
   <div class="row">
      <div class="col-lg-7">
         <?= $this->session->flashdata('message'); ?>

         <h4>Role : <?= $role['role_id']; ?>
         </h4>
         <!-- table content -->
         <table class="table table-hover">
            <thead class="thead-light">
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Access</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($menu as $m) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $m['menu']; ?></td>
                     <td>
                        <input class="form-check-input" type="checkbox" <?= cek_akses($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
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