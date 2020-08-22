<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: index.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM produk WHERE id=$id";
$query = mysqli_query($db, $sql);
$tabel = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit daftar produk</title>
</head>

<body>
    <header>
        <h3>edit daftar produk</h3>
    </header>

    <form action="proses-edit.php" method="POST">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $tabel['id'] ?>" />

        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama produk" placeholder="nama produk" value="<?php echo $tabel['nama_produk'] ?>" />
        </p>
        <p>
            <label for="keterangan">Keterangan: </label>
            <textarea name="keterangan"><?php echo $tabel['keterangan'] ?></textarea>
        </p>
        <p>
            <label for="harga"></label>
            <input type="number" name="harga" placeholder="harga" value="<?php echo $tabel['harga'] ?>"/>
        </p>
        <p>
            <label for="jumlah">Jumlah: </label>
            <input type="number" name="harga" placeholder="harga" value="<?php echo $tabel['jumlah'] ?>"/>
        </p>
        <p>
            <input type="submit" value="simpan" name="simpan" />
        </p>

        </fieldset>


    </form>

    </body>
</html>