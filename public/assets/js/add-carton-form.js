document.addEventListener("DOMContentLoaded", function () {
    const addButton = document.getElementById("addCartonBtn");
    const container = document.getElementById("cartonSection").parentNode;

    addButton.addEventListener("click", function (event) {
        event.preventDefault();

        const newCard = document
            .getElementById("cartonSection")
            .cloneNode(true);

        newCard.querySelectorAll("input, select, textarea").forEach((el) => {
            el.value = "";
            if (el.type === "checkbox" || el.type === "radio") {
                el.checked = false;
            }
        });

        newCard.querySelector(".card-body").classList.add("d-none");

        newCard
            .querySelector(".toggle-btn")
            .addEventListener("click", function (event) {
                event.preventDefault();
                const cardBody = newCard.querySelector(".card-body");
                const icon = newCard.querySelector(".toggle-btn i");

                cardBody.classList.toggle("d-none");

                if (cardBody.classList.contains("d-none")) {
                    icon.classList.remove("fa-circle-chevron-up");
                    icon.classList.add("fa-circle-chevron-down");
                } else {
                    icon.classList.remove("fa-circle-chevron-down");
                    icon.classList.add("fa-circle-chevron-up");
                }
            });

        newCard
            .querySelector("#removeCartonBtn")
            .addEventListener("click", function (event) {
                event.preventDefault();
                container.removeChild(newCard);
            });

        const newAddButton = newCard.querySelector("#addCartonBtn");
        newAddButton.addEventListener("click", function (event) {
            event.preventDefault();
            addButton.click();
        });

        container.appendChild(newCard);
    });

    const removeButton = document.getElementById("removeCartonBtn");
    removeButton.addEventListener("click", function (event) {
        event.preventDefault();
        const allCards = container.querySelectorAll(".card");
        if (allCards.length > 1) {
            container.removeChild(allCards[allCards.length - 1]);
        }
    });
});
