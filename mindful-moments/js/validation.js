// Login form validation
const loginForm = document.getElementById("login-form");
if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
        const email = loginForm.querySelector('input[name="email"]').value.trim();
        const password = loginForm.querySelector('input[name="password"]').value;
        if (!email || !password) {
            alert("Please fill in both email and password.");
            e.preventDefault();
        } else if (!/^[^@]+@[^@]+\.[^@]+$/.test(email)) {
            alert("Please enter a valid email address.");
            e.preventDefault();
        }
    });
}

// Add entry form validation
const addEntryForm = document.getElementById("add-entry-form");
if (addEntryForm) {
    addEntryForm.addEventListener("submit", function (e) {
        const mood = addEntryForm.querySelector('select[name="mood"]').value;
        const note = addEntryForm.querySelector('textarea[name="note"]').value.trim();
        if (!mood || !note) {
            alert("Please select a mood and enter a note.");
            e.preventDefault();
        }
    });
}

// Edit entry form validation
const editEntryForm = document.getElementById("edit-entry-form");
if (editEntryForm) {
    editEntryForm.addEventListener("submit", function (e) {
        const mood = editEntryForm.querySelector('select[name="mood"]').value;
        const note = editEntryForm.querySelector('textarea[name="note"]').value.trim();
        if (!mood || !note) {
            alert("Please select a mood and enter a note.");
            e.preventDefault();
        }
    });
}