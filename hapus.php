<!-- <?php 
require 'koneksi.php';

$id = $_GET["id"];

if ( hapus($id) > 0 ) { ?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  Data sudah dihapuskan!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <?php 
  	header("Location: atur.php");
  ?>
</div>
<?php } else{ ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Data gagal Dihapuskan!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <?php 
  	header("Location: atur.php");
  ?>
</div>
<?php }


?> -->