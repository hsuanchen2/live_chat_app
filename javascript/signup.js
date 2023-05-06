const form = document.querySelector(".signup form");
const continueBtn = document.querySelector(".button input");
const errorText = form.querySelector(".error-text"); 

form.addEventListener("submit", (e) => {
  e.preventDefault();
});

continueBtn.addEventListener("click", (e) => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            const data = xhr.response;
            // console.log(data);
            if (data == "success") {
              location.href = "users.php"
            } else {
              errorText.textContent = data; 
              errorText.style.display = "block"; 
            }
        };
    }; 
  };
  // send form data to php through ajax
  const formData = new FormData(form); 

  // send data to php
  xhr.send(formData);
});
