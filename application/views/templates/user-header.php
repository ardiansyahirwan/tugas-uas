<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title><?= $judul; ?></title>
   <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style-user.css">
</head>

<body>
   <nav class="navbar navbar-dark bg-primary navbar-expand-lg" style=" background-color: transparent;">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav">

            <!-- query Menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $menu = $this->Menu_model->getMenuJoin($role_id);
            ?>
            <!-- Looping Menu -->
            <?php foreach ($menu as $m) : ?>
               <li class="nav-item active dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?= $m['menu']; ?>
                  </a>



                  <!-- dropdown Submenu -->
                  <?php
                     $menu_id = $m['id'];
                     $submenu = $this->User_model->getSubmenu($menu_id)->result_array();
                     ?>
                  <!-- loopinng Submenu -->

                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <?php foreach ($submenu as $sm) : ?>
                        <a class="dropdown-item" href="<?= base_url($sm['url']); ?>"><?= $sm['title']; ?></a>
                     <?php endforeach; ?>
                  </div>

               </li>
            <?php endforeach; ?>
         </ul>

         <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                  <!-- <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>"> -->
               </a>
               <!-- Dropdown - User Information -->
               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="<?= base_url('user/edit'); ?>">
                     <i class="fas fa-fw fa-user-edit mr-2 text-gray-400"></i>
                     Edit Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= base_url('autentifikasi/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                     Logout
                  </a>
               </div>
            </li>

         </ul>
      </div>
   </nav>