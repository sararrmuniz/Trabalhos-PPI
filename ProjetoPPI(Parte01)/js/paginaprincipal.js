window.onload = function () {
    const modal = document.querySelector(".buscaAvancada"); 
    const buttonClose = modal.querySelector(".buttonClose");
    buttonClose.addEventListener("click", function () {
        modal.style.display = 'none';
    });

    const buttonOpenModal = document.getElementById("btnBuscaAvancada");
    buttonOpenModal.addEventListener("click", function () { 
        modal.style.display = 'block';
    })
}