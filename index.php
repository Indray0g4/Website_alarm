<?php 
session_start();

if (!isset($_SESSION["Login"]) ) {
  header("Location: login.php");
  exit; 
}
include 'koneksi.php';

// TANGGAL (BULAN)
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tahun
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tanggal
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

// TANGGAL (Hari)
function hari_ini(){
  $hari = date ("D");
 
  switch($hari){
    case 'Sun':
      $hari_ini = "Minggu";
    break;
 
    case 'Mon':     
      $hari_ini = "Senin";
    break;
 
    case 'Tue':
      $hari_ini = "Selasa";
    break;
 
    case 'Wed':
      $hari_ini = "Rabu";
    break;
 
    case 'Thu':
      $hari_ini = "Kamis";
    break;
 
    case 'Fri':
      $hari_ini = "Jumat";
    break;
 
    case 'Sat':
      $hari_ini = "Sabtu";
    break;
    
    default:
      $hari_ini = "Tidak di ketahui";   
    break;
  }
 
  return $hari_ini;
 
}


// JAM 
  date_default_timezone_set('Asia/Jakarta');
  // Menampilkan jam Sekarang
  $hari_ini = hari_ini();
  $jam_sekarang = date("H:i");
  echo $jam_sekarang;
  $query2 = "SELECT * FROM tb_jadwal WHERE Hari = '$hari_ini' AND  Jam ASC LIMIT 0.1";
  $tabel_query = mysqli_query($konek, $query2);
  $data = mysqli_fetch_array($tabel_query);
  // Membaca bel berbunyi di tabel
  $jam_bunyi= substr($tabel_query, 0, 5);
  echo "<br>";
  echo $jam_bunyi;

// END JAM

$jadwal = tabel("SELECT *FROM tb_jadwal WHERE Hari = '$hari_ini' ");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="refresh" content="58">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Beranda | Bel Sekolah</title>
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
    <script type="text/javascript">
       window.onload = function() { jam(); }

       function jam() {
        var e = document.getElementById('jam'),
        d = new Date(), h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h +':'+ m +':'+ s;

        setTimeout('jam()', 1000);
       }

       function set(e) {
        e = e < 10 ? '0'+ e : e;
        return e;
       }
       
      // End jam

    </script>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><i class="far fa-bell"></i> SIBELA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Beranda</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="atur.php"><i class="fas fa-wrench"></i> Pengaturan</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="unggah.php"><i class="fas fa-upload"></i> Unggah MP3</a>
      </li>
    </ul>


    <form class="form-inline my-2 my-lg-0">
      <div class="navbar nav-link text-white">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link disable">
            Selamat Datang <?php echo $_SESSION['Nama']; ?>&nbsp;&nbsp;&nbsp;| </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a>
        </li>
      </ul>
      </div>
    </form>
  </div>
</nav>
<!-- Jumbotron -->
 <div class="jumbotron jumbotron-fluid" style="padding-top: 2%; padding-bottom: 40px; margin-bottom: -1%;">
  <h1 class="display-4">SIBELA-Aplikasi Bel Sekolah</h1>
  <p class="lead">Aplikasi Bel Otomatis untuk sekolah.</p>
<!-- Akhir Jumbotron -->
</div> 
<!-- Navbar 2 -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#" style="padding-right: 10%;"><?php echo hari_ini(); ?>, <?php echo tgl_indo(date('Y-m-d')); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <div class="navbar nav-link">
        
      </div>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button type="button" class="btn btn-outline-success" disabled>
        <div class="navbar nav-link" id="jam">
      </button>
      
      </div>
    </form>
  </div>
</nav>
<!-- Jadwal -->
  <h5>&nbsp;&nbsp;&nbsp;Jadwal Hari <?php echo $hari_ini; ?></h5>
<!-- Tabel -->
<table class="table table-striped" style="text-align: left; width: 96%; margin-left: 1%;">
  <thead class="thead-white">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Hari</th>
      <th scope="col">Jam</th>
      <th scope="col">Jadwal</th>
      <th scope="col">Audio</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; ?>
    <?php foreach ($jadwal as $hari) : ?>
      <tr>
          <td><?= $i; ?></td>
          <td><?= $hari["Hari"]; ?></td>
          <td><?= substr($hari["Jam"], 0, 5); ?></td>
          <td><?= $hari["Jadwal"]; ?></td>
          <td><?= $hari["Audio"]; ?></td>
      </tr>
    <?php $i++; ?>
  <?php endforeach; ?>
  </tbody>
</table>
<!-- Manual -->
<h5>&nbsp;&nbsp;&nbsp;&nbsp;Bunyikan Manual</h5>
<br>
<!-- File -->
<form action="putarmanual.php" method="GET" class="form-inline">
  <div class="form-group mx-sm-3 mb-2">
    <select name="pilihmp3" class="form-control">
      <option selected>==Pilihan==</option>
        <?php 
          $query = "SELECT * FROM tb_jadwal ORDER BY Jadwal desc";
          $pilih = mysqli_query($konek, $query);
          foreach ($pilih as $hari) { ?>
            <option value="<?php echo $hari['Audio']; ?>"><?php echo $hari['Jadwal']; ?></option>
          <?php } ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" mb-2><i class="far fa-play-circle"></i> Play</button>
<div class="">
  <audio id="myAudio">
    <source src="audio/Pelajaran_ke-1.mp3" type="audio/mpeg">
  </audio>

  <button onclick="mainkan()" type="button">Play</button>
  <button onclick="berhenti()" type="button">Pause</button> 
</div>
  
</form>

<!-- Footer -->
 <div class="card-footer bg-dark text-white text-center fixed-bottom">
   &copy; Indra
 </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


<script type="text/javascript">
  // Audio
var x = document.getElementById("myAudio"); 
<?php if ($jam_sekarang == $jam_bunyi) {?>
function mainkan() { 
  x.play(); 
} 

function berhenti() { 
  x.pause(); 
} 

</script>
<?php } ?>

</body>
</html>