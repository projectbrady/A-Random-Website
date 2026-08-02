let signUp = document.getElementById("signup");
let logIn = document.getElementById("login");
let formToggle = document.getElementsByClassName("form_toggle");

for (let i = 0; i < formToggle.length; i++) {
  formToggle[i].onclick = (event) => {
    event.preventDefault();

    if (getComputedStyle(logIn).display !== "none") {
      logIn.style.display = "none";
      signUp.style.display = "flex";
    } else {
      signUp.style.display = "none";
      logIn.style.display = "flex";
    }
  };
}
