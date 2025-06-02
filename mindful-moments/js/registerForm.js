const registerForm = document.getElementById("register-form");

registerForm.addEventListener('submit', function (e) {
    const pw = document.querySelector('input[name="password"]').value;
    const cpw = document.querySelector('input[name="confirm_password"]').value;
    if (pw !== cpw) {
        e.preventDefault();
        alert("Passwords do not match.");
    }
});

