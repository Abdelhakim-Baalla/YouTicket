// Auto-submit form on filter change
document.querySelectorAll(".filter-select").forEach((select) => {
    select.addEventListener("change", function () {
        this.closest("form").submit();
    });
});

// Clear filters
function clearFilters() {
    window.location.href = "#";
}

// Add clear filters button if there are active filters

document.addEventListener("DOMContentLoaded", function () {
    const filtersGrid = document.querySelector(".filters-grid");
    const clearBtn = document.createElement("div");
    clearBtn.className = "filter-group";
    clearBtn.innerHTML =
        '<button type="button" class="btn btn-secondary" onclick="clearFilters()"><i class="fas fa-times"></i> Effacer</button>';
    filtersGrid.appendChild(clearBtn);
});
