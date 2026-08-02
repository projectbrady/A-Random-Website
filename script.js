const login = document.getElementById("login");
const signup = document.getElementById("signup");

const toggles = document.querySelectorAll(".form-toggle");
const passwordIcons = document.querySelectorAll(".toggle-password");

toggles.forEach((toggle) => {
  toggle.addEventListener("click", (event) => {
    event.preventDefault();

    login.classList.toggle("hidden");
    signup.classList.toggle("hidden");
  });
});

passwordIcons.forEach((icon) => {
  icon.addEventListener("click", () => {
    const input = icon.previousElementSibling;

    if (input.type === "password") {
      input.type = "text";
      icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.replace("fa-eye-slash", "fa-eye");
    }
  });
});
