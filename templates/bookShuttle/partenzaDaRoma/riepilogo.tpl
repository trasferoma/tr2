<script src="assets/js/strumentiPerValidazioneForm.js"></script>
<script>
    {literal}

    $( function() {

    } );



    {/literal}
</script>
<section id="main" class="container">
    {include file="bookShuttle/partenzaDaRoma/testatinaPartenzaDaRoma.tpl"}
    <div class="row">
        <div class="12u">

            <section class="box">

                <header>
                    <h3>{#titoloSelezionaRiepilogo#}</h3>
                    <p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
                </header>
                <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>

                <hr />

                <form action="index.php" id="form" method="POST">
                    <input type="hidden" name="m" value="{$modulo}">
                    <input type="hidden" name="operazione" value="{$prossimoPasso}">
                    <input type="hidden" name="token" value="{$token}">

                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>{#voceRiepilogo#}</th>
                                    <th>{#valoreRiepilogo#}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{#data#}</td>
                                    <td>{$data}</td>
                                </tr>

                                <tr>
                                    <td>{#struttura#}</td>
                                    <td>{$struttura}</td>
                                </tr>

                                <tr>
                                    <td>{#mezzoPiuOrario#}</td>
                                    <td>{$mezzoPiuOrario}</td>
                                </tr>

                                <tr>
                                    <td>{#numeroAdulti#}</td>
                                    <td>{$numeroAdulti}</td>
                                </tr>

                                <tr>
                                    <td>{#numeroAnimali#}</td>
                                    <td>{$numeroAnimali}</td>
                                </tr>

                                <tr>
                                    <td>{#numeroBambiniAnni3Anni6#}</td>
                                    <td>{$numeroBambiniDa3A6}</td>
                                </tr>

                                <tr>
                                    <td>{#numeroBambiniAnni6Anni12#}</td>
                                    <td>{$numeroBambiniDa6A12}</td>
                                </tr>

                                <tr>
                                    <td>{#nomeContatto#}</td>
                                    <td>{$nomeContatto}</td>
                                </tr>

                                <tr>
                                    <td>{#cognomeContatto#}</td>
                                    <td>{$cognomeContatto}</td>
                                </tr>

                                <tr>
                                    <td>{#emailContatto#}</td>
                                    <td>{$emailContatto}</td>
                                </tr>

                                <tr>
                                    <td>{#cellulareContatto#}</td>
                                    <td>{$cellulareContatto}</td>
                                </tr>
<!--
                                <tr>
                                    <td>{#nomeRaccoltaShuttle#}</td>
                                    <td>{$nomeRaccoltaShuttle}</td>
                                </tr>
-->
                                <tr>
                                    <td>{#indirizzoRaccoltaShuttle#}</td>
                                    <td>{$indirizzoRaccoltaShuttle}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="row uniform 50%">
                        <div class="2u 12u(mobile)">
                            <a href="index.php?m={$moduloCodificato}&token={$tokenCodificato}&operazione={$passoPrecedente}" class="button alt">{#indietroStepPrecedenteDiCompilazione#}</a>
                        </div>

                        <div class="2u 12u(mobile)">
                            <input type="submit" value="{#avantiProssimoStepDiCompilazione#}" class="alt"">
                        </div>
                    </div>
                </form>

            </section>

        </div>
    </div>
</section>