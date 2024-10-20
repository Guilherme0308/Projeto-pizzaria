const formCard = document.getElementById('form-cartao');
const validador = document.getElementsByClassName('cartao-required');
const avisos = document.getElementsByClassName('span-required');
const cartaoBtn = document.getElementById('cartaoBtn');
const valor = document.getElementById('numero');
const cvv = document.getElementById('cvv');

// Limpar entradas de caracteres não numéricos
valor.addEventListener('input', function() {
    this.value = this.value.replace(/\D/g, '');
});

cvv.addEventListener('input', function() {
    this.value = this.value.replace(/\D/g, '');
});

// RegEx para cartões suportados: Visa, Elo, Mastercard
var cartoesSuportados = {
    visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
    elo: /^(40117[89]|431274|438935|451416|457393|457631|457632|504175|627780|636297|636368|65500[01]|65165[234]|65048[5-8]|506699|5067[06]\d|50677[0-8]|509\d{3})\d{10}$/,
    mastercard: /^5[1-5][0-9]{14}$|^2(?:2(?:2[1-9]|[3-9][0-9])|[3-6][0-9][0-9]|7(?:[01][0-9]|20))[0-9]{12}$/
};

// exibição de spans
function exibirErro(index, mensagem) {
    avisos[index].innerText = mensagem;
    avisos[index].style.display = 'block';
    avisos[index].style.color = 'red';
    validador[index].classList.add('erro');
}

function esconderErro(index) {
    avisos[index].style.display = 'none';
    validador[index].classList.remove('erro');
}


// Algoritmo de Luhn para validar número de cartão
function validadorNumero() {
    var numeroCartao = valor.value;
    var soma = 0;
    var shouldDouble = false;
    
    for (var i = numeroCartao.length - 1; i >= 0; i--) {
        var digito = parseInt(numeroCartao.charAt(i));

        if (shouldDouble) {
            if ((digito *= 2) > 9) digito -= 9;
        }

        soma += digito;
        shouldDouble = !shouldDouble;
    }

    var validos = (soma % 10) == 0;
    var aceitos = false;

    Object.keys(cartoesSuportados).forEach(function(key) {
        var regex = cartoesSuportados[key];
        if (regex.test(numeroCartao)) {
            aceitos = true;
        }
    });
    
    return validos && aceitos;
}

// Validação de CVV
function validadorCVV(cvv) {
    return /^\d+$/.test(cvv) && (cvv.length === 3 || cvv.length === 4);
}

// Validar ao submeter o formulário
formCard.addEventListener('submit', function(event) {
    if (!validadorNumero()) {
        exibirErro(0, "Número de cartão inválido");
        event.preventDefault(); // Bloqueia o envio se inválido
    } 
    else {
        esconderErro(0);
    }

    if (!validadorCVV(cvv.value)) {
        exibirErro(1, "CVV inválido");
        event.preventDefault();
    } 
    else {
        esconderErro(1);
    }
});

