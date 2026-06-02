const btn = document.getElementById("btnTop");

window.onscroll = function() {
    if (document.documentElement.scrollTop > 200) {
        btn.style.display = "block";
    } else {
        btn.style.display = "none";
    }
};

if (btn) {
    btn.onclick = function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    };
}

/* =========================
   WHATSAPP FORM
========================= */

function kirimWA() {

    let nama = document.getElementById("nama").value.trim();
    let alamat = document.getElementById("alamat").value.trim();
    let pesanan = document.getElementById("pesanan").value.trim();
    let catatan = document.getElementById("catatan").value.trim();

    let errorMsg = document.getElementById("error-msg");

    if (nama === "" || alamat === "" || pesanan === "") {

        errorMsg.style.display = "block";

        return;
    }

    errorMsg.style.display = "none";

    let pesan =
`Halo, saya ingin memesan produk Fuyuko.id

Nama :
${nama}

Alamat :
${alamat}

Pesanan :
${pesanan}

Catatan :
${catatan}`;

    let nomorWA = "6289531726626";

    let url =
"https://api.whatsapp.com/send?phone="
+ nomorWA
+ "&text="
+ encodeURIComponent(pesan);

    window.open(url, "_blank");
}