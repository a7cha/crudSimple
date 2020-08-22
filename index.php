<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Toko kita bersama</title>
</head>

<body>
    <header>
        <h3>Daftar Produk </h3>
    </header>

    <form action="proses-pendaftaran.php" method="POST">

      

        <p>
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" placeholder="Nama Produk" />
        </p>
        <p>
            <label for="keterangan">Keterangan: </label>
            <textarea name="keterangan"></textarea>
        </p>
        <p>
            <label for="harga">Harga :</label>
            <input type="number" name="harga" placeholder="Harga"/>
        </p>
        <p>
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" placeholder="jumlah" />
        </p>
        <p>
            <input type="submit" value="Daftar" name="daftar" />
        </p>



    </form>

    <br>

    

    <table border="1">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM produk";
        $query = mysqli_query($db, $sql);

        while($tabel = mysqli_fetch_array($query)){
            echo "<tr>";


            echo "<td>".$tabel['nama_produk']."</td>";
            echo "<td>".$tabel['keterangan']."</td>";
            echo "<td>".$tabel['harga']."</td>";
            echo "<td>".$tabel['jumlah']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?id=".$tabel['id']."'>Edit</a> | ";
            echo "<a href='hapus.php?id=".$tabel['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>
    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>