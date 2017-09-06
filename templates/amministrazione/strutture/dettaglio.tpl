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
        return validazioneCampoObbligatorio("#descrizioneIt" );
    }

    function validazioneDescrizioneEn() {
        return validazioneCampoObbligatorio("#descrizioneEn" );
    }

    function validazioneDescrizioneAbjad() {
        return validazioneCampoObbligatorio("#descrizioneAbjad" );
    }

    function validaForm() {
        datiValidi = false;

        tipoValido = validazioneTipo();
        attivaValida = validazioneAttiva();
        descrizioneItValida = validazioneDescrizioneIt();
        descrizioneEnValida = validazioneDescrizioneEn();
        descrizioneAbjadValida = validazioneDescrizioneAbjad();

        datiValidi = tipoValido && attivaValida;
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

                <form action="amministrazione.php" id="form" method="POST">
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
                            <input type="text" name="descrizioneIt" id="descrizioneIt" placeholder="{#descrizioneIt#}" value="{$descrizioneIt}"/>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="5u 12u(mobile)">
                            <input type="text" name="descrizioneEn" id="descrizioneEn" placeholder="{#descrizioneEn#}" value="{$descrizioneEn}"/>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="5u 12u(mobile)">
                            <input type="text" name="descrizioneAbjad" id="descrizioneAbjad" placeholder="{#descrizioneAbjad#}" value="{$descrizioneAbjad}"/>
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