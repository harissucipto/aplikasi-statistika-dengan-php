var nasi = document.querySelector("#jdata");
nasi.style.fontSize = "25px";
nasi.style.fontWeight = "bolder";

for (var i = 1; i <= nasi.value; i++) {
    var nama = "#data" + i;
    var ubah = document.querySelector(nama);
    ubah.style.fontSize = "25px";
    ubah.style.fontWeight = "bolder";
};