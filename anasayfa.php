<?php
    include("includes/header.php");
    include("includes/connection.php");
    include("includes/navbar.php");

    if (isset($_POST["submit"]))
    {
        $plaka = trim($_POST["plaka"]);
        $arac_tipi = trim($_POST["arac_tipi"]);
        $blok = trim($_POST["blok"]);
        $kat_no = trim($_POST["kat_no"]);
        $giris_saat = trim($_POST["giris_saat"]);

        $sorgu = "INSERT INTO araclar(plaka,arac_tipi,blok,kat_no,giris_saat) VALUES ('$plaka','$arac_tipi','$blok','$kat_no','$giris_saat')";
        $result = mysqli_query($connection, $sorgu);
        if ($result)
        {
            echo "<script>
                    window.location.href = 'anasayfa.php';
                    alert('Araç Otoparka Başarılı Bir Şekilde Kaydedildi');                     
                </script>";
            exit();
        }
        else
        {
            echo "<script>
                alert('Araç Kaydedilemedi');                     
            </script>";
        }
    }
?>
<div class="wrapper"  width: 420px;>
    <h1>ARAÇ KAYIT</h1>
    <form method="post" action="anasayfa.php">
        <div class="input-box">
            <input type="text" name="plaka" placeholder="Plaka Giriniz" required>
        </div>
        <div class="input-box">
            <input type="text" name="arac_tipi" placeholder="Araç Tipini Giriniz (büyük,küçük,orta)" required>
        </div>
        <div class="input-box">
            <input type="text"  name="blok" placeholder="Blok Giriniz" required>
        </div>
        <div class="input-box">
            <input type="text" name="kat_no" placeholder="Kat Giriniz" required>
        </div>
        <div class="input-box">
            <input type="time" name="giris_saat" placeholder="Giriş Saatini Giriniz" required>
        </div>
        <button type="submit" name="submit" class="btn">Kaydet</button>
    </form>
</div>
<?php include("includes/footer.php"); ?>