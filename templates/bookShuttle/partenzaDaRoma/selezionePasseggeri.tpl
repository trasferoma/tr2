<script src="assets/js/strumentiPerValidazioneForm.js"></script>
<script>
    {literal}

    var specialKeys = new Array();
    specialKeys.push(8); //Backspace
    $(function () {
        $("input[type=number]").bind("keypress", function (e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            $(".error").css("display", ret ? "none" : "inline");
            return ret;
        });
        $("input[type=number]").bind("paste", function (e) {
            return false;
        });
        $("input[type=number]").bind("drop", function (e) {
            return false;
        });
    });


    function validaForm() {

        datiValidi = false;

        numeroAdultiValido = validazioneNumeroAdulti();
        numeroAnimaliValido = validazioneNumeroAnimali();
        numeroBambini3Anni6AnniValido = validazioneNumeroBambini3Anni6Anni();
        numeroBambini6Anni12AnniValido = validazioneNumeroBambini6Anni12Anni();
        nomeContattoValido = validazioneNomeContatto();
        cognomeContattoValido = validazioneCognomeContatto();
        telefonoContatto = validazioneTelefonoContatto();
        emailContattoValida = validazioneEmailContatto();

        datiValidi  =  numeroAdultiValido
                    && numeroAnimaliValido
                    && numeroBambini3Anni6AnniValido
                    && numeroBambini6Anni12AnniValido
                    && nomeContattoValido
                    && cognomeContattoValido
                    && telefonoContatto
                    && emailContattoValida;

        // datiValidi = true;

        if (datiValidi) {
            $( "#form" ).submit();
        }
    }

    function validazioneNumeroAdulti() {
        return isNumeroIntero("#numeroAdulti");
    }

    function validazioneNumeroAnimali() {
        return isNumeroIntero("#numeroAnimali");
    }

    function validazioneNumeroBambini3Anni6Anni() {
        return isNumeroIntero("#numeroBambiniAnni3Anni6");
    }

    function validazioneNumeroBambini6Anni12Anni() {
        return isNumeroIntero("#numeroBambiniAnni6Anni12");
    }

    function validazioneTelefonoContatto() {
        return isTelefono("#cellulareContatto");
    }

    function validazioneNomeContatto() {
        return validazioneCampoObbligatorio("#nomeContatto")
    }

    function validazioneCognomeContatto() {
        return validazioneCampoObbligatorio("#cognomeContatto")
    }

    function validazioneEmailContatto() {
        return isEmail("#emailContatto");
    }

    {/literal}
</script>
<section id="main" class="container">
    {include file="bookShuttle/partenzaDaRoma/testatinaPartenzaDaRoma.tpl"}
    <div class="row">
        <div class="12u">

            <section class="box">

                <header>
                    <h3>{#titoloSelezionaPasseggeri#}</h3>
                    <p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
                </header>
                <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>

                <hr />

                <form action="index.php" id="form" method="POST">
                    <input type="hidden" name="m" value="{$modulo}">
                    <input type="hidden" name="operazione" value="{$prossimoPasso}">
                    <input type="hidden" name="token" value="{$token}">

                    <div class="row uniform 50%">
                        <div class="6u 12u(mobile)">
                            <input type="number" min="0" name="numeroAdulti" id="numeroAdulti" aria-placeholder="{#numeroAdulti#}" placeholder="{#numeroAdulti#}" value="{$numeroAdulti}"/>
                        </div>
                        <div class="6u 12u(mobile)">
                            <input type="number" min="0" name="numeroAnimali" id="numeroAnimali" aria-placeholder="{#numeroAnimali#}" placeholder="{#numeroAnimali#}" value="{$numeroAnimali}"/>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="6u 12u(mobile)">
                            <input type="number" min="0" name="numeroBambiniAnni3Anni6" id="numeroBambiniAnni3Anni6" aria-placeholder="{#numeroBambiniAnni3Anni6#}" placeholder="{#numeroBambiniAnni3Anni6#}" value="{$numeroBambiniAnni3Anni6}"/>
                        </div>
                        <div class="6u 12u(mobile)">
                            <input type="number" min="0" name="numeroBambiniAnni6Anni12" id="numeroBambiniAnni6Anni12" aria-placeholder="{#numeroBambiniAnni6Anni12#}" placeholder="{#numeroBambiniAnni6Anni12#}" value="{$numeroBambiniAnni6Anni12}"/>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="6u 12u(mobile)">
                            <input type="text" name="nomeContatto" id="nomeContatto" placeholder="{#nomeContatto#}" value="{$nomeContatto}"/>
                        </div>
                        <div class="6u 12u(mobile)">
                            <input type="text" name="cognomeContatto" id="cognomeContatto" placeholder="{#cognomeContatto#}" value="{$cognomeContatto}"/>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="6u 12u(mobile)">
                            <input type="email" name="emailContatto" id="emailContatto" placeholder="{#emailContatto#}" value="{$emailContatto}"/>
                        </div>
                        <div class="6u 12u(mobile)">
                            <input type="tel" name="cellulareContatto" id="cellulareContatto" placeholder="{#cellulareContatto#}" value="{$cellulareContatto}"/>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="2u 12u(mobile)">
                            <a href="index.php?m={$moduloCodificato}&token={$tokenCodificato}&operazione={$passoPrecedente}" class="button alt">{#indietroStepPrecedenteDiCompilazione#}</a>
                        </div>
                        <div class="2u 12u(mobile)">
                            <input type="button" value="{#avantiProssimoStepDiCompilazione#}" class="alt" onClick="validaForm()">
                        </div>
                    </div>
                </form>

            </section>

        </div>
    </div>
</section>