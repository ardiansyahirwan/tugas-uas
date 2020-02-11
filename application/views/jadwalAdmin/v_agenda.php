<div class="container">
   <?= $this->session->flashdata('pesan'); ?>
   <div class="row">
      <div class="col-lg-12 table-bordered "> <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
               <?= validation_errors(); ?> </div>
         <?php } ?>
         <?= $this->session->flashdata('pesan'); ?>
         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#agendaBaruModal">
            <i class="fas fa-fw fa-plus"></i> Tambah Agenda</a>
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
                     <th>Pilihan</th>
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
                        <td> <a href="<?= base_url('agenda/ubahAgenda/') . $ag['agenda_id']; ?>" class="badge badge-info">
                              <i class="fas fa-edit"></i> Ubah</a>
                           <a href="<?= base_url('agenda/hapusAgenda/') . $ag['agenda_id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $ag['agenda_nama']; ?> ?');" class="badge badge-danger">
                              <i class="fas fa-trash"></i> Hapus</a>
                        </td>
                     </tr> <?php } ?> </tbody>
            </table>
      </div>
   </div>
</div>
</div>

<!-- Modal Tambah Agenda baru-->
<div class="modal fade" id="agendaBaruModal" tabindex="-1" role="dialog" aria-labelledby="agendaBaruModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="agendaBaruModalLabel">Tambah Agenda</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
         </div>
         <form action="<?= base_url('agenda'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="form-group"> <input type="text" class="form-control form-control-user" id="agenda_nama" name="agenda_nama" placeholder="Masukkan Nama Agenda"> </div>
               <div class="form-group"> <input type="text" class="form-control form-control-user" id="agenda_tanggal" name="agenda_tanggal" placeholder="Masukkan Tanggal"> </div>
               <div class="form-group"> <input type="text" class="form-control form-control-user" id="agenda_tempat" name="agenda_tempat" placeholder="Masukkan Tempat"> </div>
               <div class="form-group"> <input type="text" class="form-control form-control-user" id="agenda_waktu" name="agenda_waktu" placeholder="Masukkan waktu"> </div>
               <div class="form-group"> <input type="text" class="form-control form-control-user" id="agenda_author" name="agenda_author" placeholder="Masukkan Author"> </div>
               <div class="form-group"> <input type="file" class="form-control form-control-user" id="image" name="image"> </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
               <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button> </div>
         </form>
      </div>
   </div>
</div> <!-- End of Modal Tambah Mneu -->