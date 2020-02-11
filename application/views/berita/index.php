<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
   <form action="" method="post">
      <!-- menu form input berita menggunakan CKE editor -->
      <div class="form-group">
         <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Berita">
      </div>
      <textarea name="" id="ckeditor" class="ckeditor form-control" cols="30" rows="10"></textarea>
      <button type="submit" class="btn btn-primary mt-5">Post Berita</button>
   </form>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->