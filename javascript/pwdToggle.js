const pwdField = document.querySelector(".form input[type = 'password']"); 

toggleBtn = document.querySelector(".form .field i");
toggleBtn.addEventListener("click", () => {
    // console.dir(pwdField); 
    // console.log(pwdField.getAttribute("type")); 
    if (pwdField.type === "password") {
        pwdField.setAttribute("type", "text");
        toggleBtn.classList.add("active"); 
    } else {
        pwdField.setAttribute("type", "password");
        toggleBtn.classList.remove("active"); 
    }
});
