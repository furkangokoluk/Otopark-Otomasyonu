<?php
    include("includes/header.php");
    include("includes/connection.php");
    include("includes/navbar.php");

    $query = "SELECT * FROM araclar";
    $result = mysqli_query($connection, $query);
?>
<div class="wrapper" style="width: 700px;">
    <h1>OTOPARKTAKİ MEVCUT ARAÇLAR</h1>
    <table class="table-container">
    <tr>
        <th>Plaka</th><th>Arac Tipi</th><th>Blok</th><th>Kat No</th><th>Giriş Saati</th><th>Çıkış Saati</th><th>Çıkış İşlemi</th>
    </tr>
    <?php 
        while ($row = mysqli_fetch_assoc($result)) 
        {
            echo '<tr>';
            echo '<td>'.$row['plaka'].'</td>';
            echo '<td>'.$row['arac_tipi'].'</td>';
            echo '<td>'.$row['blok'].'</td>';
            echo '<td>'.$row['kat_no'].'</td>';
            echo '<td>'.$row['giris_saat'].'</td>';
            echo '<td><form method="post" action="cikis.php">
                        <input type="time" class="time" name="cikis_saat"></td>';
            echo '<td><input type="hidden" name="plaka" value="'.$row['plaka'].'">
                        <button class="btn2" name="submit" type="submit">Çıkış Yap</button>
                    </form></td>';
            echo '</tr>';
        }
    ?>
    </table>
</div>
<?php include("includes/footer.php"); ?>
