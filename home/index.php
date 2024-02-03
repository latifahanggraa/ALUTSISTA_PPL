<?php
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ALUTSISTA</title>
  <link rel="stylesheet" href="style.css">
  <style>
    a {
      text-decoration: none;
      color: #000;
    }
  </style>
</head>

<body>

  <nav class="navbar-brand">
    <div class="logo">
      <img src="../asset/icons/logo-alutsista.png" alt="Logo">
    </div>
    <ul class="nav" style="text-decoration: none;">
      <li><a href="http://localhost/ALUTSISTA_PPL/home/index.php">Beranda</li>
      <li><a href="http://localhost/ALUTSISTA_PPL/daftaraset/daftaraset.php">Aset</li>
      <li><a href="http://localhost/ALUTSISTA_PPL/tentangkami/index.html">Tentang Alutsista</li>
      <li>
          <a class="navbar-brand getstarted scrollto">
              <img src="../asset/icons/user.png" alt="user" style="width: 20px; height: 20px;">
          </a>                      
      </li>
      <li><a class="navbar-link getstarted scrollto" href="http://localhost/ALUTSISTA_PPL/login/login.html">Keluar</a></li>
  </ul>    
  </nav>

  <div class="content">
    <h1>ALUTSISTA</h1>
    <div class="sub-header">Sumber terkemuka untuk pemahaman mendalam tentang Alat Utama Sistem Persenjataan!</div>
    <div class="paragraph">
      Temukan informasi terkini dan lengkap mengenai Alutsista (Alat Utama Sistem Persenjataan) kami di sini.
      Dengan Sistem Informasi Alutsista kami, Anda dapat melacak perkembangan terbaru dalam industri pertahanan dan memperoleh pemahaman yang mendalam tentang persenjataan dan teknologi yang digunakan oleh pasukan pertahanan kami.
    </div>
    <div class="image-container">
      <img src="../asset/images/header-img.jpg" alt="Image Description">
    </div>
  </div>

  <div class="stats">
    <div>
      <h2>+70</h2>
      <p>Kapal Perang</p>
    </div>
    <div>
      <h2>+70</h2>
      <p>Kendaraan Tempur</p>
    </div>
    <div>
      <h2>+70</h2>
      <p>Kendaraan Berat</p>
    </div>
  </div>

  <div class="container">
    <div class="header">Populer</div>
    <a href="http://localhost/ALUTSISTA_PPL/daftaraset/daftaraset.php" class="view-all">Lihat Semua</a>
    <div class="card-container">
      <!-- Repeat this block for each popular item -->
      
      <div class="card" style="height: 256px;">
      <?php
        $tank = "Tank";
        $items_tank = "SELECT * FROM item_alutsista WHERE nama_item = '$tank'";
        $data_tank = $conn->query($items_tank);

        $alutsista_tank = $data_tank->fetch_assoc();
      ?>
        <a href="http://localhost/ALUTSISTA_PPL/detail/detail.php?id=<?php echo $alutsista_tank['id_item']; ?>" style="text-decoration: none; color: #000;">
          <img src="../<?php echo $alutsista_tank['gambar']; ?>" alt="Tank" style="width: 100%; height: 75%; display: block;">
          <h3><?php echo $alutsista_tank['nama_item']; ?></h3>
        </a>
      </div>

      <div class="card" style="height: 256px;">
      <?php
        $Jet = "Jet Tempur";
        $items_jet = "SELECT * FROM item_alutsista WHERE nama_item = '$Jet'";
        $data_jet = $conn->query($items_jet);

        $alutsista_jet = $data_jet->fetch_assoc();
      ?>
        <a href="http://localhost/ALUTSISTA_PPL/detail/detail.php?id=<?php echo $alutsista_jet['id_item']; ?>" style="text-decoration: none; color: #000;">
          <img src="../<?php echo $alutsista_jet['gambar']; ?>" alt="Jet Tempur" style="width: 100%; height: 75%; display: block;">
          <h3><?php echo $alutsista_jet['nama_item']; ?></h3>
        </a>
      </div>

      <div class="card" style="height: 256px;">
      <?php
        $leopard = "Leopard 2";
        $items_leopard = "SELECT * FROM item_alutsista WHERE nama_item = '$leopard'";
        $data_leopard = $conn->query($items_leopard);

        $alutsista_leopard = $data_leopard->fetch_assoc();
      ?>
        <a href="http://localhost/ALUTSISTA_PPL/detail/detail.php?id=<?php echo $alutsista_leopard['id_item']; ?>" style="text-decoration: none; color: #000;">
          <img src="../<?php echo $alutsista_leopard['gambar']; ?>" alt="Leopard 2" style="width: 100%; height: 75%;">
          <h3><?php echo $alutsista_leopard['nama_item']; ?></h3>
        </a>
      </div>

      <div class="card" style="height: 256px;">
      <?php
        $nexter = "Nexter CAESAR";
        $items_nexter = "SELECT * FROM item_alutsista WHERE nama_item = '$nexter'";
        $data_nexter = $conn->query($items_nexter);

        $alutsista_nexter = $data_nexter->fetch_assoc();
      ?>
        <a href="http://localhost/ALUTSISTA_PPL/detail/detail.php?id=<?php echo $alutsista_nexter['id_item']; ?>" style="text-decoration: none; color: #000;">
          <img src="../<?php echo $alutsista_nexter['gambar']; ?>" alt="Nexter CAESAR" style="width: 100%; height: 75%; display: block;">
          <h3><?php echo $alutsista_nexter['nama_item']; ?></h3>
        </a>
      </div>
      <!-- ... other popular items ... -->
    </div>
    <div class="header">Kategori Alutsista</div>
    <a href="http://localhost/ALUTSISTA_PPL/daftaraset/daftaraset.php" class="view-all">Lihat Semua</a>
    <div class="category-container">

      <!-- Repeat this block for each category -->
      <button>
        <img src="../asset/icons/tank.png" alt="Icon" style="width: 20px; height: 20px; vertical-align: middle;">
        Kendaraan tempur
      </button>
      <button>
        <img src="../asset/icons/senjata.png" alt="Vector Icon" style="width: 20px; height: 20px; vertical-align: middle;">
        Senjata
      </button>
      <button>
        <img src="../asset/icons/munisi.png" alt="Vector Icon" style="width: 20px; height: 20px; vertical-align: middle;">
        Munisi
      </button>
      <button>
        <img src="../asset/icons/alat-optik.png" alt="Vector Icon" style="width: 20px; height: 20px; vertical-align: middle;">
        Alat Optik
      </button>
      <button>
        <img src="../asset/icons/pesawat.png" alt="Vector Icon" style="width: 20px; height: 20px; vertical-align: middle;">
        Pesawat Terbang
      </button>
      <button>
        <img src="../asset/icons/kapal.png" alt="Group 57 Icon" style="width: 20px; height: 20px; vertical-align: middle;">
        Kapal
      </button>
      <!-- ... other categories ... -->
    </div>
  </div>

  <div class="footer">
    Copyright © PT Perdana Indo 2023
  </div>

</body>

</html>
