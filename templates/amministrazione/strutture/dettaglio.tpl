<script src="assets/js/strumentiPerValidazioneForm.js"></script>
<script>
    {literal}
    function validazioneTipo() {
        return validazioneCampoObbligatorio("#tipo" );
    }

    function validazioneAttiva() {
        return validazioneCampoObbligatorio("#attiva" );
    }

    function validazioneDescrizioneIt() {
        return validazioneCampoObbligatorio("#descrizione_it" );
    }

    function validazioneDescrizioneEn() {
        return validazioneCampoObbligatorio("#descrizione_en" );
    }

    function validazioneDescrizioneAbjad() {
        return validazioneCampoObbligatorio("#descrizione_abjad" );
    }

    function validaForm() {
        datiValidi = false;

        tipoValido = validazioneTipo();
        attivaValida = validazioneAttiva();
        descrizioneItValida = validazioneDescrizioneIt();
        descrizioneEnValida = validazioneDescrizioneEn();
        descrizioneAbjadValida = validazioneDescrizioneAbjad();

        datiValidi = tipoValido && attivaValida && descrizioneItValida && descrizioneEnValida && descrizioneAbjadValida;
        // datiValidi = true;

        if (datiValidi) {
            $( "#form" ).submit();
        }
    }
{/literal}
</script>
<section id="main" class="container">
    <div class="row">
        <div class="12u">
            <!-- Home -->
            <section id="lista-strutture" class="box">
                <h3>{#titoloStrutture#}</h3>

                <h4>{#titoloDettaglio#}</h4>
                <div class="table-wrapper">

                </div>

                <form action="amministrazione.php" id="form" method="get">
                    <input type="hidden" name="m" value="{$modulo}">
                    <input type="hidden" name="operazione" value="salva">
                    <input type="hidden" name="id" value="{$id}">

                    <div class="row uniform 50%">
                        <div class="5u 12u(mobile)">
                            <div class="select-wrapper">
                                <select name="tipo" id="tipo">
                                    <option value="">{#tipoStruttura#}</option>
                                    {html_options options=$tipiStruttura selected=$tipo}
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="5u 12u(mobile)">
                            <div class="select-wrapper">
                                <select name="attiva" id="attiva">
                                    <option value="">{#selezionareAttivaSiNo#}</option>
                                    <option value="1" {$strutturaAttivaSelezionata}>{#positivo#}</option>
                                    <option value="0" {$strutturaNonAttivaSelezionata}>{#negativo#}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="5u 12u(mobile)">
                            <input type="text" name="descrizione_it" id="descrizione_it" placeholder="{#descrizioneIt#}" value="{$descrizioneIt}"/>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="5u 12u(mobile)">
                            <input type="text" name="descrizione_en" id="descrizione_en" placeholder="{#descrizioneEn#}" value="{$descrizioneEn}"/>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="5u 12u(mobile)">
                            <input type="text" name="descrizione_abjad" id="descrizione_abjad" placeholder="{#descrizioneAbjad#}" value="{$descrizioneAbjad}"/>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="2u 12u(mobile)">
                            <a href="?m={$modulo}&operazione=lista" class="button alt small">{#bottoneIndietro#}</a>
                        </div>
                        <div class="2u 12u(mobile)">
                            <input type="button" value="{#bottoneSalva#}" class="special small" onClick="validaForm()">
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</section>