//função para alterar a preview conforme inserção do input

function alterarPreview( inputId , elementoId ){
    var inputValor = document.getElementById(inputId).value;

    switch( inputId ){
        case "img":
            document.getElementById(elementoId).src = inputValor;
        break;
        case "categoria":
            if( inputValor == 1){ document.getElementById(elementoId).textContent = "Society";};
            if( inputValor == 2){ document.getElementById(elementoId).textContent = "Campo";};
            if( inputValor == 3){ document.getElementById(elementoId).textContent = "Quadra";};
        break;
        default:
            document.getElementById(elementoId).textContent = inputValor;        
    }



}