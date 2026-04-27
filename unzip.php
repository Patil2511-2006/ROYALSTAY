<?php
$zip = new ZipArchive;
$res = $zip->open('upload_package.zip');
if ($res === TRUE) {
  $zip->extractTo('.');
  $zip->close();
  echo "Extraction successful!";
  unlink('upload_package.zip');
  unlink('unzip.php');
} else {
  echo "Extraction failed!";
}
?>