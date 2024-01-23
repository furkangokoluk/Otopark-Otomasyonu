<?php
    include("includes/connection.php");
    include("includes/header.php");

    if (isset($_POST["submit"]))
    {
        $kullanici_ad = trim($_POST["kullanici_ad"]);
        $sifre = trim($_POST["sifre"]);
        $t_sifre = trim($_POST["t_sifre"]);
        if ($sifre == $t_sifre)
        {
            $sorgu = "INSERT INTO kisiler(kullanici_ad,sifre) VALUES ('$kullanici_ad','$sifre')";
            $result = mysqli_query($connection, $sorgu);
            if ($result)
            {
                echo "<script>
                        window.location.href = 'index.php';
                        alert('Kullanıcı Başarılı Bir Şekilde Kaydedildi');                     
                    </script>";
                exit();
            }
            else
            {
                echo "<script>
                    alert('Kullanıcı Kaydedilemedi');                     
                </script>";
            }
        }
        else
        {
            echo "<script>
                alert('Şifreler eşleşmiyor. Lütfen tekrar deneyin');                     
            </script>";
        }
    }
?>
<div class="wrapper">
    <h1>OTOPARKIMIZA <br> HOŞGELDİNİZ</h1>
    <form action="kayıt.php" method="post">
        <div class="input-box">
            <input type="text" name="kullanici_ad" placeholder="Kullanıcı Adınızı Giriniz" required>
        </div>
        <div class="input-box">
            <input type="password" name="sifre" placeholder="Şifrenizi Giriniz" required>
        </div>
        <div class="input-box">
            <input type="password" name="t_sifre" placeholder="Şifrenizi Tekrar Giriniz" required>
        </div>
            <input type="submit" name="submit" class="btn" value="Kayıt Ol">
    </form>
</div>
<?php include("includes/footer.php"); ?>