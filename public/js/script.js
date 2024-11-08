
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    form.addEventListener('submit', (event) => {
        let isValid = true;
        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("password");
        const emailError = document.getElementById("emailError");
        const passwordError = document.getElementById("passwordError");
        emailError.textContent = "";
        passwordError.textContent = "";
        emailInput.classList.remove("ring-red-500");
        passwordInput.classList.remove("ring-red-500");
        
        // Validate email
        if (!validateEmail(emailInput.value)) {
            emailError.textContent = "Please enter a valid email address.";
            emailInput.classList.add("ring-red-500");
            emailError.classList.add("text-red-500");
            isValid = false;
        }

        // Validate password
        if (!validatePassword(passwordInput.value)) {
            passwordError.textContent = "Password must be at least 8 characters long, include an uppercase letter, a lowercase letter, and a number.";
            passwordInput.classList.add("ring-red-500");
            emailError.classList.add("text-red-500");
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
function validatePassword(password) {
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    return passwordPattern.test(password);
}


const togglePassword = new HSTogglePassword(document.querySelector('#toggle-password'));
const showBtn = document.querySelector('#show-btn');

showBtn.addEventListener('click', () => {
  togglePassword.show();
});