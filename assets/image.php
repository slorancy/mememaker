<?php 
$mon_image = "images/3.jpg";
$texthaut = $_POST['texthaut'];
$textbas = $_POST['textbas'];
$font = dirname(__FILE__) . '/font/Anton-Regular.ttf';



$image = imagecreatefromjpeg($mon_image);
$blanc = imagecolorallocate($image, 255, 255, 255);
imagettftext($image, 40, 0, 150, 70, $blanc, $font, $texthaut);
imagettftext($image, 40, 0, 150, 430, $blanc, $font, $textbas);
imagejpeg($image, 'images/mememodif2.jpg');

?>




