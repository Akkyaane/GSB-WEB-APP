function hideAlerts() {
    const alerts = document.querySelectorAll(".alert");

    setTimeout(() => {
        alerts.forEach(alert => {
            alert.style.display = "none";
        });
    }, 5000);
}

window.addEventListener("DOMContentLoaded", () => {
    hideAlerts();
});
