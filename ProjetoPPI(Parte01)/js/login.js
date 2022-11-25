window.onload = function () {
    document.forms.formLogin.onsubmit = validaForm;
}

function validaForm(e) { //acesso ao objeto do formulário
    let form = e.target;
    let formValido = true;

    //acessa os objetos correspondentes aos spans
    const spanSenha = form.senha.nextElementSibling;
    const spanEmail = form.email.nextElementSibling;

    //inicia os spans com vazio
    spanSenha.textContent = "";
    spanEmail.textContent = "";

     //Se o campo estiver vazio o textContent é mudado colocando a mensagem de erro 
    if (form.senha.value === "") {
        spanSenha.textContent = 'A senha deve ser preenchida';
        formValido = false;
    }

    if (form.email.value === "") {
        spanEmail.textContent = 'O email deve ser preenchido';
        formValido = false;
    }
    return formValido
}