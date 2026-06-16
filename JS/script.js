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

    let pesanan = document.getElementById("pesanan").value.trim();
    let catatan = document.getElementById("catatan").value.trim();

    let errorMsg = document.getElementById("error-msg");

    if (pesanan === "") {
        errorMsg.style.display = "block";
        return;
    }

    errorMsg.style.display = "none";

    let pesan =
`Halo, saya ingin memesan produk Fuyuko.id

Pesanan :
${pesanan}

Catatan :
${catatan}`;

    let nomorWA = "6289531726626";

    let url =
        "https://wa.me/" +
        nomorWA +
        "?text=" +
        encodeURIComponent(pesan);

    window.open(url, "_blank");
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