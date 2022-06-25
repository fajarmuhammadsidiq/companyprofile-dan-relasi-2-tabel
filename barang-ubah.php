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
<h3>form rubah data </h3>
<?php
include "koneksi.php";
$sql=mysqli_query($koneksi,"SELECT * FROM eropa, guidetable WHERE eropa.nama_negara=guidetable.nama_negara AND nomor_handphone='$_GET[update]'"); 
$data=mysqli_fetch_array($sql);
?>

<form action="" method="post">
<table>
<tr>
        <td> Nama kamu </td>
        <td> <input type="text" name="nama_orang" value="<?php echo $data['nama_orang'];?>"></td>
    </tr>
    <tr>
        <td> nomor handphone </td>
        <td> <input type="text" name="nomor_handphone" value=" <?php echo $data['nomor_handphone'];?>"></td>
    </tr>
    <tr>
        <td> Harga Perjalanan </td>
        <td> <input type="text" name="harga_perjalanan"value=" <?php echo $data['harga_perjalanan'];?>"></td>
</tr>
    <tr>
        <td> Nama Negara </td>
        <td><select name="nama_negara">
            <option>---</option>
            <?php
            include "koneksi.php";
            $query = mysqli_query
            ($koneksi,"select * from eropa") or die(mysqli_error($koneksi));
            
            while($data = mysqli_fetch_array($query)){
                echo "<option value=$data[nama_negara]> $data[nama_negara] </option>";
            }
            ?>
        </select></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="proses" value="Simpan"> </td>
    </tr>

</table>

</form>

<?php 

if(isset($_POST['proses'])){

mysqli_query($koneksi, "UPDATE eropa SET 
nama_orang = '$_POST[nama_orang]',
harga_perjalanan = '$_POST[harga_perjalanan]',
nama_negara = '$_POST[nama_negara]' WHERE nomor_handphone='$_GET[update]'") or die (mysqli_error($koneksi));

echo "<script>alert('Data traveller baru telah tersimpan')
document.location='databarang.php'</script>";

}

?>
        <!--bagian about -->

        <!--footer-->
    </body>
</html>