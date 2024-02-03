<?php
include "../koneksi.php";

// inisiasi pencarian
$searchQuery = "";
if (isset($_GET['search'])) {
  $searchQuery = $_GET['search'];

   // Query untuk mencari data berdasarkan nama_item jika ada kata kunci pencarian
   $items = "SELECT * FROM item_alutsista WHERE nama_item LIKE '%$searchQuery%'";
} else {
  // Query untuk menampilkan semua data jika tidak ada kata kunci pencarian
  $items = "SELECT * FROM item_alutsista";
}

$data_alutsista = $conn->query($items);
// Memastikan query berhasil dijalankan
if (!$data_alutsista) {
  die("Query failed: " . $conn->error);
}

// Mengambil data sebagai array asosiatif
$data_select_alutsista = $data_alutsista->fetch_assoc();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="daftaraset.css">
    <style>
      a {
        text-decoration: none;
        color: #000;
      }
    </style>

    <title>Daftar Asset</title>

  </head>
  <body>
    <div class="header">
      <div class="logo">
        <img src="../asset/logo.svg" alt="Logo">
      </div>
      <div class="search-box">
        <form action="" method="get" style="display: flex; align-items: center;">
          <input type="text" name="search" placeholder="Cari" value="<?php echo $searchQuery; ?>" style="width: 420px;margin-right: 10px;margin-left: 10px;">
          <button type="submit" style="padding: 5px 10px;"></button>
        </form>
      </div>
      <ul class="nav">
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
    </div>

      
    <div class="content">
        <ul>
            <li><a href="http://localhost/ALUTSISTA_PPL/inputdata/form_input_data.html" class="button-link">Tambah</a></li>
        </ul>
    </div>

    <section class="m-5">
        <div class="card-container" > 
          <div class="row">
            <?php
                foreach ($data_alutsista as $item) {
            ?>
            <div class="col-sm-4">   
              <a href="http://localhost/ALUTSISTA_PPL/detail/detail.php?id=<?php echo $item['id_item']; ?>" style="text-decoration: none;">
              <div class="card p-3">
                  <div class="image" >
                    <img src="../<?php echo $item['gambar']; ?>" alt="Item Image" style="width:375px;  height:275px;">
                  </div>
                  <div class="header pt-3">
                    <h2><?php echo $item['nama_item']; ?></h2>
                  </div> 
              </div>
              </a>
            </div>
            <?php
              }
            ?>
          </div> 
        </div>
    </section>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">

    </script>

    
  </body>
</html>