
<script src="assets/js/strumentiPerValidazioneForm.js"></script>
<script>
    {literal}

    $( function() {
        $( "#datepicker" ).datepicker(
            {
                dateFormat: 'dd/mm/yy',
                minDate: 0,
            }
        )
    } );

    function validazioneData() {
        return validazioneCampoObbligatorio("#datepicker" );
    }

    function validazioneStruttura() {
        return validazioneCampoObbligatorio("#struttura" );
    }

    function validaForm() {
        datiValidi = false;

        dataValida = validazioneData();
        strutturaValida = validazioneStruttura();

        datiValidi = dataValida && strutturaValida;
        // datiValidi = true;

        if (datiValidi) {
            $( "#form" ).submit();
        }
    }
    {/literal}
</script>
<section id="main" class="container">
    {include file="bookShuttle/arrivoInRoma/testatinaArrivoInRoma.tpl"}
    <div class="row">
        <div class="12u">

            <section class="box">

                <header>
                    <h3>{#titoloSelezionaDataPiuStruttura#}</h3>
                    <p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
                </header>
                <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>

                <hr />

                <form action="index.php" id="form" method="POST">
                    <input type="hidden" name="m" value="{$modulo}">
                    <input type="hidden" name="operazione" value="{$prossimoPasso}">
                    <input type="hidden" name="token" value="{$token}">

                    <div class="row uniform 50%">
                        <div class="5u 12u(mobile)">
                            <input type="text" name="dataArrivo" id="datepicker" placeholder="{#dataDiArrivo#}" value="{$dataDiArrivo}" readonly/>
                        </div>
                        <div class="5u 12u(mobile)">
                            <div class="select-wrapper">
                                <select name="struttura" id="struttura">
                                    <option value="">{#strutturaDiArrivo#}</option>
                                    {html_options options=$strutture selected=$strutturaSelezionata}
                                </select>
                            </div>
                        </div>

                        <div class="2u 12u(mobile)">
                            <input type="button" value="{#avantiProssimoStepDiCompilazione#}" class="alt" onClick="validaForm()">
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="2u 12u(mobile)">
                            <a href="index.php?m=bookShuttle" class="button alt">{#indietroStepPrecedenteDiCompilazione#}</a>
                        </div>
                    </div>
                </form>

            </section>

        </div>
    </div>
</section>