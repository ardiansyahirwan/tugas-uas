<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/index'); ?>">
      <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-book"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Tugas UAS</div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider mt-3">

   <!-- Query Menu -->
   <?php
   $role_id = $this->session->userdata('role_id');
   $menu = $this->Menu_model->getMenuJoin($role_id);
   ?>

   <!-- Heading -->
   <?php foreach ($menu as $m) : ?>
      <div class="sidebar-heading">
         <?= $m['menu']; ?>
      </div>

      <?php
         $menu_id = $m['id'];
         $submenu = $this->User_model->getSubmenu($menu_id)->result_array();
         ?>

      <?php foreach ($submenu as $sm) : ?>
         <!-- Nav Item - Charts -->
         <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
               <i class="<?= $sm['icon']; ?>"></i>
               <span><?= $sm['title']; ?></span></a>
         </li>

      <?php endforeach; ?>
      <!-- Divider -->
      <hr class="sidebar-divider mt-3">
   <?php endforeach; ?>

   <!-- Heading -->
   <div class="sidebar-heading">
      Logout
   </div>
   <!-- Nav Item - Charts -->
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url('autentifikasi/logout'); ?>">
         <i class="fas fa-sign-out-alt fa-fw"></i>
         <span>Logout</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

</ul> <!-- End of Sidebar --   >   