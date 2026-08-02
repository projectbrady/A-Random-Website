const login = document.getElementById("login");
const signup = document.getElementById("signup");

const toggles = document.querySelectorAll(".form-toggle");
const passwordIcons = document.querySelectorAll(".toggle-password");

toggles.forEach((toggle) => {
  toggle.onclick = (event) => {
    event.preventDefault();

    login.classList.toggle("hidden");
    signup.classList.toggle("hidden");
  };
});

passwordIcons.forEach((icon) => {
  icon.onclick = () => {
    const passwordInput = icon.previousElementSibling;

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
      passwordInput.type = "password";
      icon.classList.replace("fa-eye-slash", "fa-eye");
    }
  };
});
