document.getElementById('clearBtn').addEventListener('click', function() {
    let btnConfirm = confirm("Deseja realmente limpar o carrinho?");
    if (btnConfirm) {
        window.location.href = '../../Controllers/CleanCart.php';
    }
})