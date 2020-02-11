<div class="container mt-3">
   <h2><?= $judul; ?></h2>
   <div class="row mt-3">
      <div class="col-lg-12 table-bordered ">
         <table class="table table-hover">
            <table class="table mt-3 table-bordered table-striped shadow-lg">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Agenda</th>
                     <th>Tanggal</th>
                     <th>Tempat</th>
                     <th>Waktu</th>
                     <th>Author</th>
                     <th>image</th>
                  </tr>
               </thead>
               <tbody> <?php $i = 1;
                        foreach ($agenda as $ag) { ?> <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $ag['agenda_nama']; ?></td>
                        <td><?= $ag['agenda_tanggal']; ?></td>
                        <td><?= $ag['agenda_tempat']; ?></td>
                        <td><?= $ag['agenda_waktu']; ?></td>
                        <td><?= $ag['agenda_author']; ?></td>
                        <td>
                           <picture>
                              <source srcset="" type="image/svg+xml">
                              <img src="<?= base_url('assets/img/upload/') . $ag['image']; ?>" class="img-fluid img-thumbnail" alt="...">
                           </picture>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
      </div>
   </div>
</div>