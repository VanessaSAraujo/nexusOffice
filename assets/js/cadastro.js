$(document).ready(function(){
    $('#phoneNumber').mask('(00) 00000-0000');
});


document.querySelector('form').addEventListener('submit', function(event) {
    const termosCheckbox = document.getElementById('termos');
    
    if (!termosCheckbox.checked) {
        event.preventDefault();
        Qual.warning("Oh no !", "Você deve aceitar os Termos e Condições para continuar."); 
    }else {
    }
});

document.getElementById('perfil').addEventListener('change', function() {
    const numeroOABInput = document.getElementById('numeroOAB');
    const numeroOABLabel = document.querySelector('label[for="numeroOAB"]');
    const formOutline = numeroOABLabel.parentElement;

    if (this.value === 'advogado') {
        numeroOABInput.disabled = false;
        numeroOABInput.required = true; 
        numeroOABLabel.classList.add('c-text');
        formOutline.classList.remove('bord-none');
        formOutline.classList.add('bord');
        
    } else {
        numeroOABInput.disabled = true;
        numeroOABInput.required = false; 
        numeroOABInput.value = ''; 
        numeroOABLabel.classList.remove('c-text');
        formOutline.classList.remove('bord');
        
    }
});

