<!-- Begin Page Content -->
<img class="cover" src="<?= base_url('assets/'); ?>img/apex2.png" alt="">
<div class="container">
   <h2><?= $judul; ?></h2>
   <div class="row mt-4">
      <div class="col-lg-6 justify-content-x">
         <?= $this->session->flashdata('pesan'); ?>
      </div>
   </div>
   <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
         <div class="col-md-4">
            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
         </div>
         <div class="col-md-8">
            <div class="card-body">
               <h5 class="card-title"><?= $user['name']; ?></h5>
               <p class="card-text"><?= $user['email']; ?></p>
               <p class="card-text"><small class="text-muted"> Jadi member sejak<br><b><?= date('d F Y', $user['date_created']); ?></b></small></p>
               <a href="<?= base_url('user/edit') ?>" class="btn btn-primary"> <i class="fas fa- fw fa-user-edit"></i> Ubah Profi</a>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- /.container-fluid -->