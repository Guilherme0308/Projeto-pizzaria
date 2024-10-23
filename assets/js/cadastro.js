const formCad = document.getElementById('form-cadastro');
const senha = document.getElementById('senha');
const confirmarSenha = document.getElementById('confirmarSenha');
const avisos = document.getElementsByClassName('span-validador');

// exibição de spans
function exibirErro(index, mensagem) {
    avisos[index].innerText = mensagem;
    avisos[index].style.display = 'block';
    avisos[index].style.color = 'red';
}

function esconderErro(index) {
    avisos[index].style.display = 'none';
}

// exibir erros ao clicar no botão enviar
formCad.addEventListener('submit', function(event) {
    if (senha.value !== confirmarSenha.value) {
        exibirErro(0, "As senhas devem ser iguais");
        event.preventDefault(); // Bloqueia o envio se as senhas forem diferentes
    } else {
        esconderErro(0);
    }
});