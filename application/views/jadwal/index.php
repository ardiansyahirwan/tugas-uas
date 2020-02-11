<!-- Begin Page Content -->
<div class="container mt-3">
   <!-- Page Heading -->
   <h2><?= $judul; ?></h2>
   <div class="row">
      <div class="col-lg">
         <table class="table mt-3 table-bordered table-striped shadow-lg">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>SKS </th>
                  <th>Jam</th>
                  <th>Hari</th>
                  <th>Ruangan</th>
                  <th>Kode Dosen</th>
               </tr>
            </thead>
            <tbody> <?php $i = 1;
                     foreach ($jadwalkuliah as $jk) { ?> <tr>
                     <td><?= $i++; ?></td>
                     <td><?= $jk['kode_mk']; ?></td>
                     <td><?= $jk['nama_mk']; ?></td>
                     <td><?= $jk['sks']; ?></td>
                     <td class="list-group-item list-group-item-danger"><?= $jk['jam']; ?></td>
                     <td><?= $jk['hari']; ?></td>
                     <td><?= $jk['ruangan']; ?></td>
                     <td class="list-group-item list-group-item-info"><?= $jk['dosen']; ?></td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- /.container-fluid -->