document.addEventListener("DOMContentLoaded", function () {
    const authWrapper = document.querySelector(".auth-wrapper");
    authWrapper.style.opacity = "0";
    authWrapper.style.transform = "translateY(20px)";

    setTimeout(() => {
        authWrapper.style.transition = "all 0.6s ease-out";
        authWrapper.style.opacity = "1";
        authWrapper.style.transform = "translateY(0)";
    }, 100);

    // Password strength indicator
    const passwordInput = document.getElementById("password");
    if (passwordInput) {
        passwordInput.addEventListener("input", function () {
            const password = this.value;
            const strengthIndicator =
                document.getElementById("password-strength");

            if (!strengthIndicator) {
                const div = document.createElement("div");
                div.id = "password-strength";
                div.className = "password-strength";
                this.parentNode.parentNode.appendChild(div);
            }

            const strength = checkPasswordStrength(password);
            updateStrengthIndicator(strength);
        });
    }
});

function checkPasswordStrength(password) {
    let strength = 0;

    // Length >= 8
    if (password.length >= 8) strength++;
    // Contains numbers
    if (/\d/.test(password)) strength++;
    // Contains lowercase
    if (/[a-z]/.test(password)) strength++;
    // Contains uppercase
    if (/[A-Z]/.test(password)) strength++;
    // Contains special chars
    if (/[^a-zA-Z0-9]/.test(password)) strength++;

    return strength;
}

function updateStrengthIndicator(strength) {
    const indicator = document.getElementById("password-strength");
    if (!indicator) return;

    const messages = ["Très faible", "Faible", "Moyen", "Fort", "Très fort"];

    const colors = [
        "#ef4444", // red-500
        "#f97316", // orange-500
        "#eab308", // yellow-500
        "#22c55e", // green-500
        "#10b981", // emerald-500
    ];

    indicator.textContent = `Sécurité: ${
        messages[strength - 1] || "Très faible"
    }`;
    indicator.style.color = colors[strength - 1] || colors[0];
}
