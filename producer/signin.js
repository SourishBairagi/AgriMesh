document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Placeholder for validation or AJAX call
    if (email === "admin@agrimesh.com" && password === "password123") {
        alert("Login successful! Redirecting to dashboard...");
        window.location.href = "dashboard.html"; // Replace with your dashboard URL
    } else {
        const errorElement = document.getElementById("error");
        errorElement.textContent = "Invalid email or password. Please try again.";
        errorElement.style.display = "block";
    }
});
