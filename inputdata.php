<?php
    include "koneksi.php";

    // upload gambar
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $error = false;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // submit gambar
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $error = false;
        } else {
            echo "File is not an image.";
            $error = false;
        }
    }

    // check file
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $error = true;
    }

    // check ukuran foto
    if ($_FILES["gambar"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        $error = true;
    }

    // validasi file
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $error = true;
    }

    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file. Error: " . $_FILES["gambar"]["error"];
    }    

    //simpan data berita
    // Simpan data berita
    $sql = "INSERT INTO item_alutsista (no_seri, kategori, nama_item, 
            kondisi, panduan_penggunaan, berat, 
            kecepatan, bahan_konstruksi, daya_tembak, 
            kapasitas, tanggal_masuk, lokasi_terkini, 
            riwayat_penggunaan, riwayat_perawatan, stok, gambar) 
            VALUES ('".$_POST['no_seri']."', '".$_POST['kategori']."', 
                    '".$_POST['nama']."', '".$_POST['kondisi']."', 
                    '".$_POST['panduan']."', '".$_POST['berat']."', 
                    '".$_POST['kecepatan']."', '".$_POST['bahan_konstruksi']."', 
                    '".$_POST['daya_tembak']."', '".$_POST['kapasitas']."', 
                    '".$_POST['tanggal']."', '".$_POST['lokasi']."', 
                    '".$_POST['riwayat_penggunaan']."', '".$_POST['riwayat_perawatan']."', 
                    '".$_POST['stok']."',  '$target_file')";


    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: inputdata/form_input_data.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        // header("Location: ../../inputdata/inputdata.html");
        exit();
    }

?>