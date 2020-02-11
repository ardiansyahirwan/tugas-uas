<div class="row">
    <div class="col-lg-6 my-5 pt-5">
        <h3 class="text-center">Selamat Datang di Website Kami</h3>
        <h5 class="text-center">Silahkan Login Untuk Menikmati Layanan</h5>
        <img src="<?= base_url('assets/'); ?>img/login.svg" alt="Gambar">
    </div>
    <div class="col-lg-5 offset-1 my-5 pt-5">
        <div class="card card-signin">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <!-- Set Flash Notifikasi -->
                <?= $this->session->flashdata('pesan'); ?>

                <!-- Form Input -->
                <form class="user form" action="<?= base_url('autentifikasi'); ?>" method="post">
                    <div class="form-group baru">
                        <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
                        <?= form_error('email', '<small class="text-light pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group baru">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                        <?= form_error('password', '<small class="text-light pl-3">', '</small>'); ?>
                    </div>
                    <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Masuk</button>

                    <div class="text-center mt-2">
                        <a class="small text-light" href="#">Lupa Password ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>