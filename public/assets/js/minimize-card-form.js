document.addEventListener("DOMContentLoaded", function () {
    const toggleBtns = document.querySelectorAll(".toggle-btn");
    toggleBtns.forEach(function (toggleBtn) {
        toggleBtn.addEventListener("click", function (event) {
            event.preventDefault();

            const cardBody = toggleBtn
                .closest(".card")
                .querySelector(".card-body");
            const icon = toggleBtn.querySelector("i");

            cardBody.classList.toggle("d-none");

            if (cardBody.classList.contains("d-none")) {
                icon.classList.remove("fa-circle-chevron-up");
                icon.classList.add("fa-circle-chevron-down");
            } else {
                icon.classList.remove("fa-circle-chevron-down");
                icon.classList.add("fa-circle-chevron-up");
            }
        });
    });
});
