<div class="container mt-3">
   <h2><?= $judul; ?></h2>
   <div class="row mt-4">
      <div class="col-lg-9">
         <?= form_open_multipart('user/edit'); ?>
         <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly></div>
         </div>
         <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['name']; ?>">
               <?= form_error('nama', '<small class="text-danger p1-3">', '</small>'); ?>
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-2">Gambar</div>
            <div class="col-sm-10">
               <div class="row">
                  <div class="col-sm-3">
                     <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" alt="">
                  </div>
                  <div class="col-sm-9">
                     <div class="costum-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Pilih file</label>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="form-group row justify-content-end">
            <div class="col-sm-10">
               <button type="submit" class="btn btn-primary">Ubah</button>
               <button class="btn btn-dark" onclick="window.history.go(-1)"> Kembali </button>
            </div>
         </div>

         </form>
      </div>
   </div>

</div>
<!-- /.contamer-fluid -->