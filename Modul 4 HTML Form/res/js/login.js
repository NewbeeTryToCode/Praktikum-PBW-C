const btn = document.querySelector(".btn")
const form = document.querySelector("form")
btn.addEventListener("click", (e) => {
    swal.fire({
        icon: "success",
        title: "Login sucess!",
        text: "Redirecting you to dashboard"
    })
    setTimeout(() => {
        form.removeAttribute("target")
        window.location = "login.php"
    }, 5000);
})