const reveals = document.querySelectorAll(".reveal");

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add("active");
        }
    });
}, {
    threshold: 0.15
});

reveals.forEach((item) => {
    observer.observe(item);
});

function togglePassword() {

    const password = document.getElementById("password");
    const eye = document.getElementById("eyeIcon");

    if (password.type === "password") {

        password.type = "text";

        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");

    } else {

        password.type = "password";

        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");

    }

}