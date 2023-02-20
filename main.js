function cariKotaAsal(id_provinsi) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    document.getElementById("kota_asal").innerHTML = this.responseText;
  };
  xmlhttp.open(
    "GET",
    "http://localhost/cekongkir/carikotaasal.php?id_provinsi=" + id_provinsi,
    true
  );
  xmlhttp.send();
}

function cariKotaTujuan(id_provinsi) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    document.getElementById("kota_tujuan").innerHTML = this.responseText;
  };
  xmlhttp.open(
    "GET",
    "http://localhost/cekongkir/carikotaasal.php?id_provinsi=" + id_provinsi,
    true
  );
  xmlhttp.send();
}

function getOngkir(id_provinsi) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    document.getElementById("ongkos_kirim").innerHTML = this.responseText;
  };
  xmlhttp.open(
    "GET",
    "http://localhost/cekongkir/carikotaasal.php?id_provinsi=" + id_provinsi,
    true
  );
  xmlhttp.send();
}

function getOngkir() {
  var id_kota_asal = document.getElementById("kota_asal").value;
  var id_kota_tujuan = document.getElementById("kota_tujuan").value;
  var berat_barang = document.getElementById("berat_barang").value;
  var kurir = document.getElementById("kurir").value;

  if (!id_kota_asal || !id_kota_tujuan || !berat_barang || !kurir) {
    alert("Mohin lengkapi data!");
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
      document.getElementById("ongkos_kirim").innerHTML = this.responseText;
    };
    xmlhttp.open(
      "GET",
      "http://localhost/cekongkir/reqhargaongkir.php?id_kota_asal=" +
        id_kota_asal +
        "&id_kota_tujuan=" +
        id_kota_tujuan +
        "&berat_barang=" +
        berat_barang +
        "&kurir=" +
        kurir,
      true
    );
    xmlhttp.send();
  }
}
