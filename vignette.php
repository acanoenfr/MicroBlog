<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 27/02/2019
 * Time: 16:38
 */

header('Content-Type: image/jpeg');

$path = "uploads/images/{$_GET['id']}";
$width = 512;

$src_img = imagecreatefromjpeg($path);

$size = getimagesize($path);
$w = $size[0];
$h = $size[1];

$height = round(($width / $w) * $h);
$dest_img = imagecreatetruecolor($width, $height);

imagecopyresampled($dest_img, $src_img, 0, 0, 0, 0, $width, $height, $w, $h);

imagejpeg($dest_img);
imagedestroy($dest_img);
imageDestroy($src_img);
