// Coloration syntaxique JSON
function highlightJSON(elementId) {
    const element = document.getElementById(elementId);
    if (!element) return;

    let json = element.textContent;

    // Coloration des clés
    json = json.replace(/"([^"]+)":/g, '<span class="json-key">"$1"</span>:');

    // Coloration des chaînes
    json = json.replace(
        /: "([^"]*)"/g,
        ': <span class="json-string">"$1"</span>'
    );

    // Coloration des nombres
    json = json.replace(/: (\d+)/g, ': <span class="json-number">$1</span>');

    // Coloration des booléens
    json = json.replace(
        /: (true|false)/g,
        ': <span class="json-boolean">$1</span>'
    );

    // Coloration des null
    json = json.replace(/: (null)/g, ': <span class="json-null">$1</span>');

    element.innerHTML = json;
}

// Animation d'entrée
document.addEventListener("DOMContentLoaded", function () {
    // Coloration JSON
    highlightJSON("oldValues");
    highlightJSON("newValues");

    // Animation des cartes
    const cards = document.querySelectorAll(".detail-card");
    cards.forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(20px)";

        setTimeout(() => {
            card.style.transition = "all 0.5s ease";
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, index * 100);
    });

    // Animation des éléments de timeline
    const timelineItems = document.querySelectorAll(".timeline-item");
    timelineItems.forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateX(-10px)";

        setTimeout(() => {
            item.style.transition = "all 0.3s ease";
            item.style.opacity = "1";
            item.style.transform = "translateX(0)";
        }, 500 + index * 100);
    });
});

// Raccourcis clavier
document.addEventListener("keydown", function (e) {
    // Échap pour retourner à la liste
    if (e.key === "Escape") {
        window.location.href = '{{ route("histories.index") }}';
    }
});
