

async function buscaAnuncios() {
    try {
        let response = await fetch("busca-anuncios.php");
        if (!response.ok) throw new Error(response.statusText);
        var anuncios = await response.json();
        console.log(anuncios)
        return anuncios;
    }
    catch (e) {
        console.error(e);
        return;
    }
}

window.onload = function () {
    // const inputCep = document.querySelector("#cep");
    buscaAnuncios();
    // inputCep.onkeyup = () => buscaEndereco(inputCep.value);
}
