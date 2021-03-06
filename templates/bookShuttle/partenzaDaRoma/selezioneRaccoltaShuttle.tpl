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

    function validazioneNomeRaccolta() {
        return validazioneCampoObbligatorio("#nomeRaccoltaShuttle")
    }
    function validazioneIndirizzoRaccolta() {
        return validazioneCampoObbligatorio("#indirizzoRaccoltaShuttle")
    }


    {/literal}
</script>
<section id="main" class="container">
    {include file="bookShuttle/partenzaDaRoma/testatinaPartenzaDaRoma.tpl"}
    <div class="row">
        <div class="12u">

            <section class="box">

                <header>
                    <h3>{#titoloSelezionaMezziPiuOrari#}</h3>
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
                            <input type="text" name="nomeRaccoltaShuttle" id="nomeRaccoltaShuttle" placeholder="{#nomeRaccoltaShuttle#}" value="{$nomeRaccoltaShuttle}"/>
                        </div>
                        <div class="6u 12u(mobile)">
                            <input type="text" name="indirizzoRaccoltaShuttle" id="indirizzoRaccoltaShuttle" placeholder="{#indirizzoRaccoltaShuttle#}" value="{$indirizzoRaccoltaShuttle}"/>
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