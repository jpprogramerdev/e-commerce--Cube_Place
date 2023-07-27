document.getElementById('add_product').addEventListener('click', function () {
    let modal = document.getElementById("modal");
    modal.classList.add("show-modal");
});

document.getElementById('closeModal').addEventListener('click', function () {
    let modal = document.getElementById("modal");
    modal.classList.remove("show-modal");
});

document.getElementById('modal').addEventListener('click', function (event) {
    if (event.target === this) {
        let modal = document.getElementById("modal");
        modal.classList.remove("show-modal");
    }
});
