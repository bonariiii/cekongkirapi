<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
//   echo $response;
  $data = json_decode($response);
//   echo "<pre>"; print_r($data); echo "</pre>";
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fitur Cek Ongkir </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="jumbotron text-center" style="background: linear-gradient(#e66465, #9198e5);;">
        <h1>Fitur Cek Ongkir</h1>
        <p>Selamat datang di web cek ongkir!</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Provinsi Asal</h5>
                <select name="provinsi_asal" id="" onchange="cariKotaAsal(this.value)">
                    <option value="">--Pilih Provinsi Asal--</option>
                    <?php foreach ($data->rajaongkir->results as $provinsi) {
                        echo '<option value="'.$provinsi->province_id.'">'.$provinsi->province.'</option>';
                    } ?>
                </select>

                <h5>Kota Asal</h5>
                <select name="kota_asal" id="kota_asal">
                    <option value="">--Pilih Kota Asal--</option>
                </select>
            </div>
            <div class="col-sm-3">
                <h5>Kota Tujuan</h5>
                <select name="provinsi_tujuan" id="" onchange="cariKotaTujuan(this.value)">
                    <option value="">--Pilih Provinsi Tujuan--</option>
                    <?php foreach ($data->rajaongkir->results as $provinsi) {
                        echo '<option value="'.$provinsi->province_id.'">'.$provinsi->province.'</option>';
                    } ?>
                </select>

                <h5>Kota Tujuan</h5>
                <select name="kota_tujuan" id="kota_tujuan">
                    <option value="">--Pilih Kota tujuan--</option>
                </select>
            </div>
            <div class="col-sm-3">
                <h5>Berat Barang</h5>
                <input id="berat_barang" name="berat_barang" type="text">Gram

                <h5>Pilihan Kurir</h5>
                <select name="kurir" id="kurir">
                    <option value="">--Pilih Kurir--</option>
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="jnt">POS</option>
                </select>
            </div>
            <div class="col-sm-3">
                <h5>Harga Ongkir</h5>
                <label for="" id="ongkos_kirim">...</label>
            </div>

            <input class="btn btn-success mx-auto mt-5" type="submit" name="cari" value="Cek Ongkir"
                onclick="getOngkir();"></input>
        </div>
    </div>

    <script src="main.js"></script>

</body>

</html>