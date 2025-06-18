// Prévisualisation de la photo
document.getElementById("photo").addEventListener("change", function (e) {
    const file = e.target.files[0];
    const preview = document.getElementById("photoPreview");

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.innerHTML = `<img src="${e.target.result}" alt="Prévisualisation">`;
        };
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '<i class="fas fa-user"></i>';
    }
});

// Indicateur de force du mot de passe
document.getElementById("password").addEventListener("input", function (e) {
    const password = e.target.value;
    const strengthDiv = document.getElementById("passwordStrength");
    const strengthFill = document.getElementById("strengthFill");
    const strengthText = document.getElementById("strengthText");

    if (password.length === 0) {
        strengthDiv.style.display = "none";
        return;
    }

    strengthDiv.style.display = "block";

    let strength = 0;
    let text = "";
    let className = "";

    // Critères de force
    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;

    switch (strength) {
        case 0:
        case 1:
            text = "Très faible";
            className = "strength-weak";
            break;
        case 2:
            text = "Faible";
            className = "strength-weak";
            break;
        case 3:
            text = "Moyen";
            className = "strength-fair";
            break;
        case 4:
            text = "Fort";
            className = "strength-good";
            break;
        case 5:
            text = "Très fort";
            className = "strength-strong";
            break;
    }

    strengthFill.className = `strength-fill ${className}`;
    strengthText.textContent = text;
});

// Validation du formulaire
document
    .getElementById("createUserForm")
    .addEventListener("submit", function (e) {
        const password = document.getElementById("password").value;
        const passwordConfirm = document.getElementById(
            "password_confirmation"
        ).value;

        if (password !== passwordConfirm) {
            e.preventDefault();
            alert("Les mots de passe ne correspondent pas.");
            document.getElementById("password_confirmation").focus();
            return false;
        }

        if (password.length < 8) {
            e.preventDefault();
            alert("Le mot de passe doit contenir au moins 8 caractères.");
            document.getElementById("password").focus();
            return false;
        }
    });

// Animation d'entrée
document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll(".form-section");
    sections.forEach((section, index) => {
        section.style.opacity = "0";
        section.style.transform = "translateY(20px)";

        setTimeout(() => {
            section.style.transition = "all 0.5s ease";
            section.style.opacity = "1";
            section.style.transform = "translateY(0)";
        }, index * 200);
    });
});
