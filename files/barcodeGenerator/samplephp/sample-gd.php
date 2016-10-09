<?php
  include('../php-barcode.php');

  $fontSize = 10;   // GD1 in px ; GD2 in point
  $marge    = 10;   // between barcode and hri in pixel
  $x        = 125;  // barcode center
  $y        = 125;  // barcode center
  $height   = 50;   // barcode height in 1D ; module size in 2D
  $width    = 2;    // barcode height in 1D ; not use in 2D
  $angle    = 90;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation
  
  $code     = '000000000000'; // barcode, of course ;)
  $type     = 'ean13';
  

  
  $rot = imagerotate($im, 45, $white);
  imagedestroy($im);

  $im     = imagecreatetruecolor(900, 300);
  $black  = ImageColorAllocate($im,0x00,0x00,0x00);
  $white  = ImageColorAllocate($im,0xff,0xff,0xff);
  imagefilledrectangle($im, 0, 0, 900, 300, $white);

  $angle = 0;
  $data = Barcode::gd($im, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);

  header('Content-type: image/gif');
  imagegif($im);
  imagedestroy($im);
?>