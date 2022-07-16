// Selectors
const icon = document.querySelector('.icon');
const search = document.querySelector('.search');

// Event Listeners
icon.onclick = function () {
    search.classList.toggle('active');
}

// Functions