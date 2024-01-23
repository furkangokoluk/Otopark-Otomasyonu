<?php
    include("includes/header.php");
    include("includes/connection.php");
    include("includes/navbar.php");

    $plaka = $_POST["plaka"];
    $cikis_saat = $_POST["cikis_saat"];

    $query = "SELECT * FROM araclar WHERE plaka='".$plaka."'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    $giris_saat = strtotime($row["giris_saat"]);
    $cikis_saat = strtotime($cikis_saat);
    $park_suresi_saniye = $cikis_saat - $giris_saat;
    $park_suresi = gmdate("H:i", $park_suresi_saniye);
            switch (strtolower($row['arac_tipi'])) {
                case 'küçük':
                    $park_ucreti = ceil($park_suresi_saniye / 3600) * 5.00;
                    break;
                case 'orta':
                    $park_ucreti = ceil($park_suresi_saniye / 3600) * 7.50;
                    break;
                case 'büyük':
                    $park_ucreti = ceil($park_suresi_saniye / 3600) * 10.00;
                    break;
                }
?>
<div class="wrapper">
    <h1><?php echo $row["plaka"]?> PLAKALI ARAÇ ÇIKIŞ YAPTI</h1> <br> <br> <br>
    <h4>Aracın Otoparktaki Park Süresi: <?php echo $park_suresi ?> </h4> <br> 
    <h4>Ödenmesi Gereken Ücret: <?php echo $park_ucreti ?> TL </h4>
</div>
<?php 
    $sorgu = "DELETE FROM araclar WHERE plaka='".$plaka."'";
    mysqli_query($connection, $sorgu);
    if (!mysqli_affected_rows($connection)==1)
    {
        echo "Silme işleminde hata oluştu!.." . mysqli_connect_error();
    }
?>