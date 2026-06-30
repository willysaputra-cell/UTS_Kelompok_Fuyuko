/* =========================
   TOMBOL KE ATAS
========================= */
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

    const category = document.getElementById("category");
    const product = document.getElementById("product");
    const jumlah = document.getElementById("jumlah");
    const catatan = document.getElementById("catatan");

    const errorMsg = document.getElementById("error-msg");

    if (
        category.value === "" ||
        product.value === "" ||
        jumlah.value === "" ||
        jumlah.value <= 0
    ) {
        errorMsg.style.display = "block";
        return;
    }

    errorMsg.style.display = "none";

    let pesan =
`Halo, saya ingin memesan produk Fuyuko.id

Kategori : ${category.options[category.selectedIndex].text}
Produk : ${product.value}
Jumlah : ${jumlah.value}

Catatan :
${catatan.value}`;

    let nomorWA = "6289531726626";

    let url =
        "https://wa.me/" +
        nomorWA +
        "?text=" +
        encodeURIComponent(pesan);

    window.open(url, "_blank");

}

/* =========================
    FORM PEMESANAN
========================= */
const category = document.getElementById("category");
const product = document.getElementById("product");

if (category && product) {

    category.addEventListener("change", function () {

        product.innerHTML =
            '<option value="">-- Pilih Produk --</option>';

        const hasil = products.filter(function(item){
            return Number(item.category) === Number(category.value);
        });

        console.log(hasil); // sementara untuk cek

        hasil.forEach(function(item){

            product.innerHTML += `
                <option value="${item.name}">
                    ${item.name}
                </option>
            `;

        });

    });

}

/* =========================
   ANIMASI SCROLL
========================= */

const hiddenElements = document.querySelectorAll(".hidden");

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add("show");
        }
    });
});

hiddenElements.forEach((el) => observer.observe(el));

/* =========================
   SCROLL REVEAL
========================= */
const reveals = document.querySelectorAll(".reveal");

function revealOnScroll() {
    reveals.forEach((item) => {
        const top = item.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (top < windowHeight - 100) {
            item.classList.add("active");
        }
    });
}

window.addEventListener("scroll", revealOnScroll);
revealOnScroll();