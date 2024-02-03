<?php
include "../koneksi.php";

$sql = "DELETE from item_alutsista where id_item =".$_GET['id'];
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location:../daftaraset/daftaraset.php");
        exit();
    } else {
        $conn->close();
        header("location:../daftaraset/daftaraset.php");
        exit();
    }
?>