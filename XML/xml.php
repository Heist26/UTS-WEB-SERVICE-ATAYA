<?php
include 'koneksi.php';
$affectedRow = 0;
$xml = simplexml_load_file("Fashion.xml");
foreach($xml->children() as $fashion) {
  echo $fashion->Jenis_Baju . ", ";
  echo $fashion->Merk_Baju . ", ";
  echo $fashion->Harga . ", ";
  echo $fashion->Rating . "<br>";
  $jenis =  $fashion->Jenis_Baju;
  $merk =  $fashion->Merk_Baju;
  $harga = $fashion->Harga;
  $rating = $fashion->Rating;
  $sql = "INSERT INTO uts_fashion(Jenis_Baju,Merk_Baju,Harga,Rating) VALUES ('" . $jenis . "','" . $merk . "','" . $harga . "','
  " . $rating . "')";
    
  $result = mysqli_query($koneksi, $sql);
    
   if (! empty($result)) {
        $affectedRow ++;
    } else {
        $error_message = mysqli_error($koneksi) . "\n";
        echo $error_message;
    }
}
?>