var nasi = document.querySelector("#jdata");
var mean = document.querySelectorAll("#mean");
var rubah = document.querySelector(".rubah");
nasi.style.fontSize = "25px";
nasi.style.fontWeight = "bolder";

for (var i = 1; i <= nasi.value; i++) {
    var nama = "#data" + i;
    var ubah = document.querySelector(nama);
    ubah.style.fontSize = "25px";
    ubah.style.fontWeight = "bolder";
};

for (var i = 0; i < mean.length; i++) {
    mean[i].style.fontSize = "25px";
    mean[i].style.fontWeight = "bolder";
}

rubah.style.maxWidth = "100%";