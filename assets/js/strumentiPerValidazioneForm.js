function validazioneCampoObbligatorio(campo) {
    valore = $( campo ).val();

    campoValido = valore != null && valore != "";

    gestioneClassiCss(campo, campoValido);

    return campoValido;
}

function isEmail(campo) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    valore = $( campo ).val();

    campoValido = regex.test(valore);

    gestioneClassiCss(campo, campoValido);

    return campoValido;
}

function isNumeroIntero(campo) {
    valore = $( campo ).val();

    campoValido = /^\d+$/.test(valore);

    gestioneClassiCss(campo, campoValido);

    return campoValido;
}

function isTelefono(campo) {
    valore = $( campo ).val();
    var numeroConvertito = valore.replace(/[^\d]/g, '');
    campoValido = numeroConvertito.length > 6 && numeroConvertito.length < 11;

    gestioneClassiCss(campo, campoValido);

    return campoValido;
}

function gestioneClassiCss(campo, campoValido) {
    if (campoValido) {
        rimuoviClasseErrore(campo);
    } else {
        impostaClasseErrore(campo);
    }
}

function impostaClasseErrore(campo) {
    $(campo).removeClass('success').addClass('invalid');
}

function rimuoviClasseErrore(campo) {
    $(campo).removeClass('invalid');
}
