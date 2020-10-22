let state = true;
const btn = document.querySelector(".btn")
console.log(btn)
const showpassword = document.querySelector("#showpass")
const password = document.querySelector("#password")
let passwordStrength = document.getElementById("password-strength");
let lowerUpperCase = document.querySelector(".low-upper-case i")
let number = document.querySelector(".one-number i")
let specialChar = document.querySelector(".one-special-char i")
let eightchar = document.querySelector(".eight-character i")
const form = document.querySelector("form")

showpassword.addEventListener("click", () => {
    showpassword.classList.toggle("fa-eyeoff")

    if (state) {
        password.setAttribute("type", "text");
        state = false;
    } else {
        password.setAttribute("type", "password")
        state = true;
    }
})
password.addEventListener("keyup", () => {
    let pass = password.value;
    checkStrenth(pass);
})

function checkStrenth(password) {
    let strength = 0;

    //if password contains lowed and uppercase
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        strength += 1;
        lowerUpperCase.classList.remove("fa-circle")
        lowerUpperCase.classList.add("fa-check")
    } else {
        lowerUpperCase.classList.add("fa-circle")
        lowerUpperCase.classList.remove("fa-check")
    }
    //if password has a number 
    if (password.match(/([0-9])/)) {
        strength += 1;
        number.classList.remove("fa-circle")
        number.classList.add("fa-check")
    } else {
        number.classList.add("fa-circle");
        number.classList.remove("fa-check")
    }
    //if password has a special char
    if (password.match(/([!,@,#,$,%,^,&,*,(,),_,-,+,=])/)) {
        strength += 1;
        specialChar.classList.remove("fa-circle")
        specialChar.classList.add("fa-check")
    } else {
        specialChar.classList.add("fa-circle")
        specialChar.classList.remove("fa-check")
    }
    // if password contains 8 character
    if (password.length > 7) {
        strength += 1;
        eightchar.classList.remove("fa-circle");
        eightchar.classList.add("fa-check");
    } else {
        eightchar.classList.add("fa-circle");
        eightchar.classList.remove("fa-check");
    }

    if (strength == 0) {
        passwordStrength.style = "width: 0%";
    } else if (strength == 1 || strength == 2) {
        passwordStrength.classList.remove("progress-bar-warning")
        passwordStrength.classList.remove("progress-bar-success")
        passwordStrength.classList.add("progress-bar-danger");
        passwordStrength.style = "width: 10%"
    } else if (strength == 3) {
        passwordStrength.classList.remove("progress-bar-danger")
        passwordStrength.classList.remove("progress-bar-success")
        passwordStrength.classList.add("progress-bar-warning")
        passwordStrength.style = "width: 60%";
    } else if (strength == 4) {
        passwordStrength.classList.remove("progress-bar-danger")
        passwordStrength.classList.remove("progress-bar-warning")
        passwordStrength.classList.add("progress-bar-success")
        passwordStrength.style = "width: 100%";
    } else {
        passwordStrength.classList.remove("progress-bar-danger")
        passwordStrength.classList.remove("progress-bar-warning")
        passwordStrength.classList.remove("progress-bar-success")
        passwordStrength.style = "width:100%"

    }
}
btn.addEventListener("click", () => {
    Swal.fire({
        title: 'Are you sure?',
        text: "whether the input you entered is correct?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Sign Up!'
    }).then((result) => {
        if (result.isConfirmed) {
            swal.fire({
                title: "Sign Up",
                text: "Your input has been uploaded to the database, redirecting you to dashboard",
                icon: "success"
            })
        }
    })
    setTimeout(() => {
        form.removeAttribute("target")
        window.location = "register.php"
    }, 5000);
})