<?php
    include "koneksi.php";

    if(isset($_POST['no_seri'])){
        //Kondisi Update
        $foto_lama = $_POST['foto_lama'];
        $nama_foto = $_FILES['gambar']['name'];

        if (!empty($nama_foto)) {
            // Jika ada file baru diunggah
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
            $error = false;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["gambar"]["tmp_name"]);
            //cek apakah file termasuk gambar atau bukan
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $error = false;
            } else {
                echo "File is not an image.";
                $error = true;
            }
    
            //cek ukuran gambar
            if ($_FILES["gambar"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $error = true;
            }
            
            //gambar yang diizinkan
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $error = true;
            }

            // Upload file baru
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["gambar"]["name"]) . " has been uploaded.";
                $foto = $target_file; // Perubahan nama variabel di sini
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // Jika tidak ada file baru diunggah, gunakan nama file lama
            $foto = $foto_lama;
        }

        //perintah mySQL untuk update data
        $sql = "UPDATE item_alutsista SET
                    no_seri = '".$_POST['no_seri']."', kategori = '".$_POST['kategori']."',
                    nama_item = '".$_POST['nama']."', kondisi = '".$_POST['kondisi']."', 
                    panduan_penggunaan = '".$_POST['panduan']."', berat = '".$_POST['berat']."', 
                    panduan_penggunaan = '".$_POST['panduan']."', berat = '".$_POST['berat']."', 
                    tanggal_masuk = '".$_POST['tanggal']."', lokasi_terkini = '".$_POST['lokasi']."',
                    riwayat_penggunaan = '".$_POST['riwayat_penggunaan']."', 
                    riwayat_perawatan = '".$_POST['riwayat_perawatan']."', 
                    stok = '".$_POST['stok']."',  gambar = '".$foto."' WHERE 
                    (no_seri = '".$_POST["no_seri"]."')";

        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            //create_message("Ubah Data Berhasil", "succcess" , "check");
            header("location: http://localhost/ALUTSISTA_PPL/daftaraset/daftaraset.php");
            exit();
        } else {
            $conn->close();
            //create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }