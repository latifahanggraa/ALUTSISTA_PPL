<?php
include "../koneksi.php";

// Ambil ID dari URL
$idItem = isset($_GET['id']) ? $_GET['id'] : 0;

$items = "SELECT * FROM item_alutsista WHERE id_item = $idItem";
$data_alutsista = $conn->query($items);

// Memastikan query berhasil dijalankan
if (!$data_alutsista) {
    die("Query failed: " . $conn->error);
}

// Mengambil data sebagai array asosiatif
$data_select_alutsista = $data_alutsista->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Alutsista</title>
  <link rel="stylesheet" href="style.css">
  <style>
    a {
      text-decoration: none;
      color: #000;
    }
  </style>
  <script src="script.js"></script>
</head>

<body>
  <nav class="navbar-brand">
    <div class="logo">
      <img src="../asset/icons/logo-alutsista.png" alt="Logo">
    </div>
    <div class="search-box">
      <input type="text" placeholder="Cari">
    </div>
    <ul class="nav">
        <li><a href="http://localhost/ALUTSISTA_PPL/home/index.php">Beranda</a></li>
        <li><a href="http://localhost/ALUTSISTA_PPL/daftaraset/daftaraset.php">Aset</a></li>
        <li><a href="http://localhost/ALUTSISTA_PPL/tentangkami/index.html">Tentang Alutsista</a></li>
        <li>
          <a class="navbar-brand getstarted scrollto">
              <img src="../asset/icons/user.png" style="width: 20px; height: 20px;">
          </a>                      
      </li>
      <li><a class="navbar-link getstarted scrollto" href="http://localhost/ALUTSISTA_PPL/login/login.html">Keluar</a></li>
    </ul>    
  </nav>

  <section class="container">
    <h1>Detail Alutsista</h1>
    <div class="img-container">
        <img src="../<?php echo $data_select_alutsista['gambar']; ?>" alt="" style="width: 1193px; height:554px;">
    </div>
    <div class="content">
        <ul id="action">
            <li><a href="http://localhost/ALUTSISTA_PPL/editdata/editdata.php">Edit</a></li>
            <li><button id="hapus" onclick="openModal()">Hapus</button></li>
        </ul>

        <div class="modal" id="deleteConfirmationModal">
            <div class="modal-content">
              <img src="../asset/Featured-icon.png" alt="">
              <h3>Hapus data ini?</h3>
              <p>Apakah anda yakin akan menghapus data ini? Aksi ini tidak dapat dibatalkan.</p>
              <ul id="action">
                <li><button id="closeModal" onclick="closeModal()">Batal</button></li>
                <li><a href="delete.php?id=<?php echo $data_select_alutsista['id_item'] ?>" id="hapusConfirmationBtn" onclick="deleteData()">Hapus</a></li>
              </ul>
            </div>
        </div>          
    </div>
    <div class="data">    
        <ul>
            <h2>Informasi Umum</h2>
            <li>
                <label id="title" style="margin-right: 200px;">Nomor Seri</label><br>
                <label id="no_seri"><?php echo $data_select_alutsista['no_seri']; ?></label>
            </li>
            <li>
                <label id="tittle">Kategori</label>
                <label id="kategori"><?php echo $data_select_alutsista['kategori']; ?></label>
            </li>
            <li>
                <label id="tittle">Nama Item</label>
                <label id="nama_item"><?php echo $data_select_alutsista['nama_item']; ?></label>
            </li>
            <li>
                <label id="tittle">Kondisi</label>
                <label id="kondisi"><?php echo $data_select_alutsista['kondisi']; ?></label>
            </li>
        </ul>
    </div>

    <div class="data">
        
      <ul>
        <h2>Spesifikasi Alutsista</h2><br>
          <li>
              <label id="title" style="margin-right: 245px;">Berat</label>
              <label id="berat"><?php echo $data_select_alutsista['berat']; ?></label>
          </li>
          <li>
              <label id="tittle">Kecepatan</label>
              <label id="kecepatan"><?php echo $data_select_alutsista['kecepatan']; ?></label>
          </li>
          <li>
              <label id="tittle">Bahan Konstruksi</label>
              <label id="bahan_konstruksi"><?php echo $data_select_alutsista['bahan_konstruksi']; ?></label>
          </li>
          <li>
              <label id="tittle">Daya Tembak</label>
              <label id="daya_tembak"><?php echo $data_select_alutsista['daya_tembak']; ?></label>
          </li>
          <li>
            <label id="tittle">Kapasitas</label>
            <label id="kapasitas"><?php echo $data_select_alutsista['kapasitas']; ?></label>
        </li>
      </ul>
    </div>

    <div class="data" style="padding-top: 70px;">
        
      <ul>
        <h2>Riwayat Alutsista</h2><br>
          <li>
              <label id="title" style="margin-right: 175px;">Tanggal Masuk</label>
              <label id="tanggal_masuk"><?php echo $data_select_alutsista['tanggal_masuk']; ?></label>
          </li>
          <li>
              <label id="tittle">Lokasi Terkini</label>
              <label id="lokasi_terkini"><?php echo $data_select_alutsista['lokasi_terkini']; ?></label>
          </li>
          <li>
              <label id="tittle">Riwayat Penggunaan</label>
              <label id="riwayat_penggunaan"><?php echo $data_select_alutsista['riwayat_penggunaan']; ?></label>
          </li>
          <li>
              <label id="tittle">Riwayat Perawatan</label>
              <label id="riwayat_perawatan"><?php echo $data_select_alutsista['riwayat_perawatan']; ?></label>
          </li>
          <li>
            <label id="tittle">Stok</label>
            <label id="stok"><?php echo $data_select_alutsista['stok']; ?></label>
          </li>
      </ul>
    </div>

    <div class="footer-content">
        <h3>Panduan Pengguna</h3>
        <p id="panduan"><?php echo $data_select_alutsista['panduan_penggunaan']; ?></p>
    </div>


  </section>

  <div class="footer">
    Copyright © PT Perdana Indo 2023
  </div>

  <!-- Bagian JavaScript -->
<script>
    function openModal() {
      // var confirmation =confirm("Apakah Anda yakin ingin menghapus data ini?");
      // if (confirmation) {
      //   deleteData();
      // }
      document.getElementById('deleteConfirmationModal').style.display = 'block';
    }
  
    function closeModal() {
      document.getElementById('deleteConfirmationModal').style.display = 'none';
    }
  
    function deleteData() {
      // Mengambil ID data yang akan dihapus
      var idToDelete = <?php echo $data_select_alutsista['id']; ?>; // Gantilah 'id' dengan nama kolom ID pada tabel Anda

      // Menggunakan AJAX untuk mengirim permintaan penghapusan ke server
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Handle respon dari server jika diperlukan
          console.log(this.responseText);
          closeModal(); // Tutup modal setelah penghapusan berhasil
          showDeleteNotification(); // Tampilkan notifikasi hapus
        }else {
          console.error('Error deleting data:', this.status, this.statusText );
        }
      };
      xhr.open("POST", "delete.php", true); // Gantilah 'hapus_data.php' dengan nama file yang menangani penghapusan
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("id=" + idToDelete); // Kirim ID yang akan dihapus ke server
    }

    function showDeleteNotification(){
      // Tambahkan kode untuk menampilkan notifikasi hapus, misalnya menggunakan alert
      alert("Data berhasil dihapus!");
    }

    // Menambahkan fungsi untuk mengarahkan ke halaman edit
    function redirectToEdit() {
      // Mengambil ID data yang akan diedit
      var idToEdit = <?php echo $data_select_alutsista['id']; ?>; // Gantilah 'id' dengan nama kolom ID pada tabel Anda

      // Mengarahkan ke halaman edit dengan membawa ID data
      window.location.href = "editdata.php?id=" + idToEdit; // Gantilah 'editdata.php' dengan halaman edit yang sesuai
    }

    document.addEventListener('DOMContentLoaded', function () {
    // Tautan menu
    var informasiUmumLink = document.querySelector('a[href="#informasi-umum"]');
    var spesifikAlatLink = document.querySelector('a[href="#spesifik-alat"]');
    var riwayatAlutsistaLink = document.querySelector('a[href="#riwayat-alutsista"]');

    // Div data
    var informasiUmumDiv = document.getElementById('informasi-umum');
    var spesifikAlatDiv = document.getElementById('spesifik-alat');
    var riwayatAlutsistaDiv = document.getElementById('riwayat-alutsista');

    // Menampilkan informasi umum saat halaman dimuat
    informasiUmumDiv.style.display = 'block';

    // Menambahkan event listener untuk setiap tautan
    informasiUmumLink.addEventListener('click', function () {
        informasiUmumDiv.style.display = 'block';
        spesifikAlatDiv.style.display = 'none';
        riwayatAlutsistaDiv.style.display = 'none';
    });

    spesifikAlatLink.addEventListener('click', function () {
        informasiUmumDiv.style.display = 'none';
        spesifikAlatDiv.style.display = 'block';
        riwayatAlutsistaDiv.style.display = 'none';
    });

    riwayatAlutsistaLink.addEventListener('click', function () {
        informasiUmumDiv.style.display = 'none';
        spesifikAlatDiv.style.display = 'none';
        riwayatAlutsistaDiv.style.display = 'block';
    });
  });
</script>

  
</body>

</html>
