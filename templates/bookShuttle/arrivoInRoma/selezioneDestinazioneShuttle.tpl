<script src="assets/js/strumentiPerValidazioneForm.js"></script>
<script>
    {literal}

    $( function() {

    } );

    function validaForm() {
        datiValidi = false;

        nomeDestinazione = validazioneNomeDestinazione();
        indirizzoDestinazione = validazioneIndirizzoDestinazione();

        datiValidi = nomeDestinazione && indirizzoDestinazione;
        // datiValidi = true;

        if (datiValidi) {
            $( "#form" ).submit();
        }
    }

    function validazioneNomeDestinazione() {
        return validazioneCampoObbligatorio("#nomeDestinazioneShuttle")
    }
    function validazioneIndirizzoDestinazione() {
        return validazioneCampoObbligatorio("#indirizzoDestinazioneShuttle")
    }


    {/literal}
</script>
<section id="main" class="container">
    {include file="bookShuttle/arrivoInRoma/testatinaArrivoInRoma.tpl"}
    <div class="row">
        <div class="12u">

            <section class="box">

                <header>
                    <h3>{#titoloSelezionaVoliPiuOrari#}</h3>
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
                            <input type="text" name="nomeDestinazioneShuttle" id="nomeDestinazioneShuttle" placeholder="{#nomeDestinazioneShuttle#}" value="{$nomeDestinazioneShuttle}"/>
                        </div>
                        <div class="6u 12u(mobile)">
                            <input type="text" name="indirizzoDestinazioneShuttle" id="indirizzoDestinazioneShuttle" placeholder="{#indirizzoDestinazioneShuttle#}" value="{$indirizzoDestinazioneShuttle}"/>
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