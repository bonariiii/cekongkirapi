<?php

$id_kota_asal = $_GET['id_kota_asal'];
$id_kota_tujuan = $_GET['id_kota_tujuan'];
$berat_barang = $_GET['berat_barang'];
$kurir = $_GET['kurir'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=".$id_kota_asal."&destination=".$id_kota_tujuan."&weight=".$berat_barang."&courier=".$kurir,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: d5b95f4de32407c98e416b4bfebc259c"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response);
    foreach ($data->rajaongkir->results[0]->costs as $ongkoskirim) {
        echo 'Paket: ' .$ongkoskirim->service;
        echo '<br/>';
        echo 'Harga: ' .$ongkoskirim->cost[0]->value;
        echo '<br/>';
        echo 'Berat: ' .$ongkoskirim->cost[0]->etd; echo 'Kg';
        echo '<hr/>';
    }
}