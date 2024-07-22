<?php


// Formdan gelen verileri alın
$isim = $_POST['isim'] ?? '';
$dtarih = $_POST['dtarih'] ?? '';
$adres = $_POST['adres'] ?? '';
$telefon = $_POST['telefon'] ?? '';
$eposta = $_POST['eposta'] ?? '';
$cinsiyet = $_POST['cinsiyet'] ?? '';
$medenidurum = $_POST['medenidurum'] ?? '';
$ehliyet = $_POST['ehliyet'] ?? '';
$askerlik = $_POST['askerlik'] ?? '';
$sigara = $_POST['sigara'] ?? '';
$pozisyon = $_POST['pozisyon'] ?? '';
$btarih = $_POST['btarih'] ?? '';
$referans = $_POST['referans'] ?? '';
$maas = $_POST['maas'] ?? '';
$ingilizce = $_POST['ingilizce'] ?? '';
$bilgisayar = $_POST['bilgisayar'] ?? '';
$ekbilgiler = $_POST['ekbilgiler'] ?? '';
$cvYolu = ''; // CV'nin geçici yolunu alın

// E-posta şablonu
$emailContent = "
    <html>
    <head>
        <title>Yeni Başvuru</title>
    </head>
    <body>
    <style>
        p{
            font-size: 18px;
        }
    </style>

        <div style='font-family: Arial, sans-serif;'>
            <h2>İnsan Kaynakları İş Başvuru</h2>
            <div style='display: flex; justify-content: center;'> <a href='https://efeberkayalan.com/'><img src='https://efeberkayalan.com/ebalogo.png' style='width: 160px;'  alt=''></a> </div>
            <p style='font-size: 14px;'>Web sitemiz üzerinden yeni bir başvuru yapıldı. Başvuru detayları aşağıda yer almaktadır:</p>
            <p style='font-size: 16px;'><strong>Ad Soyad:</strong> $isim</p>
                <p style='font-size: 16px;'><strong>Doğum Tarihi:</strong> $dtarih</p>
                <p style='font-size: 16px;'><strong>Adres:</strong> $adres</p>
                <p style='font-size: 16px;'><strong>Telefon:</strong> $telefon</p>
                <p style='font-size: 16px;'><strong>Cinsiyet:</strong> $cinsiyet</p>
                <p style='font-size: 16px;'><strong>Medeni Durum:</strong> $medenidurum</p>
                <p style='font-size: 16px;'><strong>Ehliyet:</strong> $ehliyet</p>
                <p style='font-size: 16px;'><strong>Askerlik Durumu:</strong> $askerlik</p>
                <p style='font-size: 16px;'><strong>Sigara Kullanımı:</strong> $sigara</p>
                <p style='font-size: 16px;'><strong>Başvurulan Pozisyon:</strong> $pozisyon</p>
                <p style='font-size: 16px;'><strong>Başvuru Tarihi:</strong> $btarih</p>
                <p style='font-size: 16px;'><strong>Referans:</strong> $referans</p>
                <p style='font-size: 16px;'><strong>Maaş Beklentisi:</strong> $maas</p>
                <p style='font-size: 16px;'><strong>İngilizce Seviyesi:</strong> $ingilizce</p>
                <p style='font-size: 16px;'><strong>Bilgisayar Kullanım Seviyesi:</strong> $bilgisayar</p>
                <p style='font-size: 16px;'><strong>Ek Bilgiler:</strong> $ekbilgiler</p>
        </div>
    </body>
    </html>
";

// PHPMailer ile E-posta Gönderme
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'sevdenurakpinar7@gmail.com'; // SMTP sunucusunu belirtin
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sevdenurakpinar7@gmail.com'; // SMTP kullanıcı adınız
    $mail->Password   = '];Cb=iSu}?rF';    // SMTP şifreniz
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('sevdenurakpinar7@gmail.com', 'YENİ!!İletişim Formu');
    $mail->addAddress('sevdenurakpinar7@gmail.com', 'Alıcı İsmi'); // Alıcı e-posta adresi

    // Eklentiler
    // $mail->addAttachment($formPdfPath, 'BasvuruFormu.pdf');


    // İçerik
    $mail->isHTML(true);
    $mail->Subject = 'Yeni Başvuru';
    $mail->Body = $emailContent;

    $mail->send();
    echo "<script>alert('Başvuru başarıyla gönderildi ve e-posta iletilmiştir.'); window.location='index.html';</script>";
} catch (Exception $e) {
    echo "<script>alert('E-posta gönderilemedi. Hata: {$mail->ErrorInfo}'); window.history.go(-1);</script>";
}



// Bağlantıyı kapat


// Form gönderme ve CV yükleme işlemi başarılıysa gerçekleştirilecek yönlendirme
// Yönlendirme kodunu buraya taşıyın
?>
