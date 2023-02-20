<?php

$id_provinsi = $_GET['id_provinsi'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: d5b95f4de32407c98e416b4bfebc259c"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $dataKota = json_decode($response);

    // echo "<pre>"; print_r($dataKota); echo"</pre>";
}
foreach ($dataKota->rajaongkir->results  as $kota) {
    echo '<option value="'.$kota->city_id.'">'.$kota->city_name.'</option>';
  };