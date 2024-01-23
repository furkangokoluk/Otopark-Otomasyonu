<?php
    include("includes/connection.php");
    include("includes/header.php");

    if (isset($_POST["submit"]))
    {
        $kullanici_ad = trim($_POST["kullanici_ad"]);
        $sifre = trim($_POST["sifre"]);
        $sorgu = "SELECT * FROM kisiler WHERE kullanici_ad = '$kullanici_ad' AND sifre = '$sifre'";
        $result = mysqli_query($connection, $sorgu);
        if (mysqli_num_rows($result) == 1)
        {
            header("Location:anasayfa.php");
        }
        else
        {
            echo "<script>
                alert('Başarısız Giriş Tekrar Deneyin!..');                     
            </script>";
        }
    }
?>
<div class="wrapper">
    <h1>OTOPARKIMIZA <br> HOŞGELDİNİZ</h1>
    <form action="index.php" method="post">
        <div class="input-box">
            <input type="text" name="kullanici_ad" placeholder="Kullanıcı Adınızı Giriniz" required>
        </div>
        <div class="input-box">
            <input type="password" name="sifre" placeholder="Şifrenizi Giriniz" required>
        </div>
            <input type="submit" name="submit" class="btn" value="Giriş">
        <div class="register-link">
            <p>Hesabınız Yokmu? <a href="kayıt.php">Kayıt Ol</a></p>
        </div>
    </form>
</div>
<?php include("includes/footer.php"); ?>