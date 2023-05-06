const form = document.querySelector(".typing-area");
const inputField = document.querySelector(".input-field"); 
const sendBtn = document.querySelector(".typing-area button"); 

const chatBox = document.querySelector(".chat-box"); 



form.addEventListener("click", (e)=> {
    e.preventDefault(); 
});

sendBtn.addEventListener("click", () => {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            inputField.value = "";  // empty input field when message sent.
          };
      }; 
    };
    // send form data to php through ajax
    const formData = new FormData(form); 
    // send data to php
    xhr.send(formData);
}); 

setInterval(() => {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const data = xhr.response;
            chatBox.innerHTML = data; 
            scrollToBottom(); 
        }
      }
    };
    const formData = new FormData(form); 
    // send data to php
    xhr.send(formData);
  }, 500);


// function scrollToBottom() {
//    chatBox.scrollTop = chatBox.scrollHeight;  
// }; 