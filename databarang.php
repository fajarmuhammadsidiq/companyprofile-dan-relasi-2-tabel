<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", initial-scale="1">
        <title>TRAVELLUCKY</title>
        <link rel = "stylesheet" type="text/css" href="css/style.css">
        <link rel = "stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>
    <body>
        <!--header-->
        <div class="medsos">
            <div class="container">
            <ul>
                <li><a href="https://web.facebook.com/profile.php?id=100010269904836"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>
        <header> 
            <div class="container">
            <h1><a href="">TRAVELLUCKY</a></h1>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="input.php">Registrasi</a></li>
                <li><a href="databarang.php">CUSTOMER KITA</a></li>
            </ul>
        </div>
        </header>
        <style>
        body {
   background-image: url("img/banner.jpg");
   background-repeat: no-repeat;
   background-size:cover
}
</style>
<h3>Data Barang</h3>
<table border="1">
    <tr>
        <th width= "150 px">No</th>
        <th width= "150 px">Nama Customer </th>
        <th width= "150 px">Nama Negara </th>
        <th width= "150 px">Nomor Handphone </th>
        <th width= "150 px">Harga Perjalanan </th>
        <th width= "150 px">tour guide </th>
        <th width= "150 px">jenis kelamin </th>
        <th width= "150 px">umur </th>
        <th colspan="2">Aksi</th>
    </tr>

    <?php
    /** membuat data bisa ditampilkan di halaman lain  */
    include "koneksi.php";
    /** membuat variable 1 untuk penomoran  */
    $no=1;
    /** mengambil data dari table erop di database  */
    $ambildata = mysqli_query
    ($koneksi,"select * from eropa, guidetable
    where eropa.nama_negara = guidetable.nama_negara") or die(mysqli_error($koneksi));
    
    while($tampil = mysqli_fetch_array($ambildata)){
        /** menampilkan data sesuai urutan table form yang dibuat*/
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[nama_orang]</td>
            <td>$tampil[nama_negara]</td>
            <td>$tampil[nomor_handphone]</td>
            <td>$tampil[harga_perjalanan]</td>
            <td>$tampil[tour_guide]</td>
            <td>$tampil[jenis_kelamin]</td>
            <td>$tampil[umur]</td>
            <td> <a href='barang-ubah.php?update=$tampil[nomor_handphone]'>
            <input type= 'button' value='Edit'>
            </a>
            </td>
            <td>
            <a href='?hapus=$tampil[nomor_handphone]' onClick=\"return confirm('yakin mau diapus?');\">
            <input type='button' value='Hapus'></a>
        <tr>";
        /** membuat looping nomor di table   */
        $no++;
    }
    ?>
    </table>

    <?php
    include "koneksi.php";

    if(isset($_GET['hapus'])){
    mysqli_query($koneksi,"delete  from eropa where nomor_handphone='$_GET[hapus]'") or die (mysqli_error($koneksi));
    
    echo "Data berhasil dihapus";
    echo "<meta http-equiv=refresh content=2;URL='databarang.php'>";

    }
    ?>

        <!--footer-->
    </body>
</html>