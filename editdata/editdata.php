<?php 
include "../koneksi.php";

// Memastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Mengambil data dari formulir
    $no_seri = $_POST["no_seri"];
    $kategori = $_POST["kategori"];
    $nama_item = $_POST["nama"];
    $kondisi = $_POST["kondisi"];
    $panduan_penggunaan = $_POST["panduan"];
    $berat = $_POST["berat"];
    $kecepatan = $_POST["kecepatan"];
    $bahan_konstruksi = $_POST["bahan_konstruksi"];
    $daya_tembak = $_POST["daya_tembak"];
    $kapasitas = $_POST["kapasitas"];
    $tanggal_masuk = $_POST["tanggal"];
    $lokasi_terkini = $_POST["lokasi"];
    $riwayat_penggunaan = $_POST["riwayat_penggunaan"];
    $riwayat_perawatan = $_POST["riwayat_perawatan"];
    $stok = $_POST["stok"];
    $foto_lama = $_POST["foto_lama"];

    // Mengambil file gambar yang diupload
    $gambar = $_FILES["gambar"]["name"];
    $tmp_gambar = $_FILES["gambar"]["tmp_name"];
    
    // Menentukan direktori tujuan untuk menyimpan gambar
    $upload_dir = "../upload/";
    $target_gambar = $upload_dir . $gambar;


    // Perintah SQL UPDATE
    $update_query = "UPDATE item_alutsista SET 
                    kategori='$kategori', 
                    nama_item='$nama_item', 
                    kondisi='$kondisi', 
                    panduan_penggunaan='$panduan_penggunaan', 
                    berat='$berat', 
                    kecepatan='$kecepatan', 
                    bahan_konstruksi='$bahan_konstruksi', 
                    daya_tembak='$daya_tembak', 
                    kapasitas='$kapasitas', 
                    tanggal_masuk='$tanggal_masuk', 
                    lokasi_terkini='$lokasi_terkini', 
                    riwayat_penggunaan='$riwayat_penggunaan', 
                    riwayat_perawatan='$riwayat_perawatan', 
                    stok='$stok', 
                    gambar='$gambar' 
                    WHERE no_seri='$no_seri'";

    // Menjalankan perintah SQL
    if ($conn->query($update_query) === TRUE) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Error: " . $update_query . "<br>" . $conn->error;
    }

    // Menutup koneksi database
    $conn->close();
}

$items = "SELECT * FROM item_alutsista"; 
$data_alutsista = $conn->query($items);

// Memastikan query berhasil dijalankan
if (!$data_alutsista) {
    die("Query failed: " . $conn->error);
}

// Mengambil data sebagai array asosiatif
$data_select_alutsista = $data_alutsista->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=!, initial-scale=1.0">
    <link rel="stylesheet" href="editdata.css">
    <title>Edit Data</title>
</head>
<body>

    
    <nav class="navbar-brand">
        <div class="logo">
          <img src="../asset/logo.svg" alt="Logo">
        </div>
    
        <ul class="nav">
            <li><a href="../home/index.html">Beranda</a></li>
            <li><a href="http://localhost/ALUTSISTA_PPL/daftaraset/daftaraset.php">Aset</a></li>
            <li><a href="../tentangkami/index.html">Tentang Alutsista</a></li>
          <li>
              <a class="navbar-brand getstarted scrollto">
                  <img src="../asset/icons/user.png" alt="user" style="width: 20px; height: 20px;">
              </a>                      
          </li>
          <li><a class="navbar-link getstarted scrollto" href="../login/login.html">Keluar</a></li>
      </ul>    
    </nav>

<section class="content">

    <form action="../editdata/editdata.php" method="post" enctype="multipart/form-data">
        <div class="input-data">
            <h1>EDIT ALUTSISTA</h1><br>
            <label for="">No Seri</label>
            <input type="text" name="no_seri" value="<?php echo $data_select_alutsista['no_seri']; ?>">
    
            <label for="kategori">Kategori </label>
            <select id="kategori" name="kategori">
                <option value="senjata" <?php if($data_select_alutsista['kategori'] == 'senjata') echo 'selected'; ?>>Senjata</option>
                <option value="pesawat" <?php if($data_select_alutsista['kategori'] == 'pesawat') echo 'selected'; ?>>Pesawat</option>
                <option value="kapal" <?php if($data_select_alutsista['kategori'] == 'kapal') echo 'selected'; ?>>Kapal</option>
                <option value="munisi" <?php if($data_select_alutsista['kategori'] == 'munisi') echo 'selected'; ?>>Munisi</option>
                <option value="kendaraan_tempur" <?php if($data_select_alutsista['kategori'] == 'kendaraan_tempur') echo 'selected'; ?>>Kendaraan Tempur</option>
                <option value="alat_optik" <?php if($data_select_alutsista['kategori'] == 'alat_optik') echo 'selected'; ?>>Alat Optik</option>
            </select>
    
            <label for="">Nama Item</label>
            <input type="text" name="nama" value="<?php echo $data_select_alutsista['nama_item']; ?>">

            <label for="kondisi">Kondisi </label>
            <select id="kondisi" name="kondisi">
                <option value="siap" <?php if($data_select_alutsista['kondisi'] == 'siap') echo 'selected'; ?>>Siap Digunakan</option>
                <option value="aktif" <?php if($data_select_alutsista['kondisi'] == 'aktif') echo 'selected'; ?>>Sedang Digunakan</option>
                <option value="perbaikan" <?php if($data_select_alutsista['kondisi'] == 'perbaikan') echo 'selected'; ?>>Dalam Perbaikan</option>
                <option value="disimpan" <?php if($data_select_alutsista['kondisi'] == 'disimpan') echo 'selected'; ?>>Dalam Penyimpanan</option>
            </select>
    
            <label for="">Panduan Penggunaan</label>
            <textarea name="panduan"><?php echo $data_select_alutsista['panduan_penggunaan']; ?></textarea>
        </div>

        <div  class="input-data">
            <h1>INPUT SPESIFIKASI ALUTSISTA</h1><br>
    
            <label for="">Berat</label>
            <input type="text" name="berat"  value="<?php echo $data_select_alutsista['berat']; ?>">

            <label for="">Kecepatan</label>
            <input type="text" name="kecepatan" value="<?php echo $data_select_alutsista['kecepatan']; ?>">

            <label for="">Bahan Konstruksi</label>
            <input type="text" name="bahan_konstruksi" value="<?php echo $data_select_alutsista['bahan_konstruksi']; ?>">

            <label for="">Daya Tembak</label>
            <input type="text" name="daya_tembak" value="<?php echo $data_select_alutsista['daya_tembak']; ?>">

            <label for="">Kapasitas</label>
            <input type="text" name="kapasitas" value="<?php echo $data_select_alutsista['kapasitas']; ?>">
        </div>
    
        <div  class="input-data">
            <h1>EDIT RIWAYAT ALUTSISTA</h1><br>
            
            <label for="">Tanggal Masuk</label>
            <input type="date" name="tanggal" value="<?php echo $data_select_alutsista['tanggal_masuk']; ?>">
    
            <label for="">Lokasi Terkini</label>
            <input type="alamat" name="lokasi" value="<?php echo $data_select_alutsista['lokasi_terkini']; ?>">
    
            <label for="">Riwayat Penggunaan</label>
            <input type="text" name="riwayat_penggunaan" value="<?php echo $data_select_alutsista['riwayat_penggunaan']; ?>">

            <label for="">Riwayat Perawatan</label>
            <input type="text" name="riwayat_perawatan" value="<?php echo $data_select_alutsista['riwayat_perawatan']; ?>">
    
            <label for="">Stok</label>
            <input type="text" name="stok" value="<?php echo $data_select_alutsista['stok']; ?>">
    
            <input type="hidden" name="foto_lama" value="<?php echo $data_select_alutsista['gambar']; ?>">
            <label for="">Gambar</label>
            <input type="file" name="gambar" value="<?php echo $data_select_alutsista['gambar']; ?>">
        </div>
        <button type="submit">Simpan</button>
    </form>

</section>
    
</body>
</html>
