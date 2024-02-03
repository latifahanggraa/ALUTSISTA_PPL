<?php
include "../koneksi.php";

// Inisialisasi pencarian
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

<!DOCTYPE html>
<html lang="id">

<head>
    <!-- ... (bagian head tetap sama) ... -->
</head>

<body>
    <nav class="navbar-brand">
        <!-- ... (bagian navbar tetap sama) ... -->
    </nav>

    <section class="container">
        <!-- ... (bagian container tetap sama) ... -->

        <div class="search-box">
            <!-- Form pencarian dengan metode GET -->
            <form action="" method="get">
                <input type="text" name="search" placeholder="Cari" value="<?php echo $searchQuery; ?>">
                <button type="submit">Cari</button>
            </form>
        </div>

        <!-- ... (bagian lain dari container tetap sama) ... -->

    </section>

    <div class="footer">
        <!-- ... (bagian footer tetap sama) ... -->
    </div>

    <!-- Bagian JavaScript -->
    <script>
        // ... (bagian JavaScript tetap sama) ...
    </script>

</body>

</html>