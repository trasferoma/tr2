function validazioneCampoObbligatorio(campo) {
    valore = $( campo ).val();

    if (valore == null || valore == "") {
        campoValido = false;
        $(campo).removeClass('success').addClass('invalid');
    } else {
        campoValido = true;
        $(campo).removeClass('invalid');
    }

    return campoValido;
}