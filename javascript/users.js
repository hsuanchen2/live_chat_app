const searchBar = document.querySelector(".users .search input");
const searchBtn = document.querySelector(".users .search button");
const usersList = document.querySelector(".users .users-list");

searchBtn.addEventListener("click", () => {
  // console.log("click");
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
    searchBar.value = ""; 
});

searchBar.addEventListener("keyup", () => {
  const searchTerm = searchBar.value;
  if (searchTerm !== "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const data = xhr.response;
        // console.log(data);
        usersList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
});

setInterval(() => {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const data = xhr.response;
        //   console.log(data);
        if (!searchBar.classList.contains("active")) {
            // if searchbar has no class active, insert user list. 
            usersList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 500);
