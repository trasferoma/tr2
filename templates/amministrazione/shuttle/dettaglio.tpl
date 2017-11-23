
<section id="main" class="container">
    <div class="row">
        <div class="12u">
            <section id="lista-shuttle" class="box">
                <h3>{#titoloShuttle#}</h3>

                <h4>{#titoloDettaglio#}</h4>

                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>{#dataViaggio#}</th>
                            <th>{#struttura#}</th>
                            <th>{#mezzoPiuOrario#}</th>
                            <th>{#tipoViaggio#}</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{$shuttleDataViaggio|date_format:"%d-%m-%Y"}</td>
                                <td>{$shuttleStruttura}</td>
                                <td>{$shuttleMezzoPiuOrario}</td>
                                <td>{$shuttleTipo}</td>
                            </tr>
                        </tbody>
                    </table>

                    <form name="listaShuttle" id="listaShuttle">
                        {section name=shuttle loop=$listaDati}
                            <table>
                                {section name=passeggero loop=$listaDati[shuttle].passeggeri}
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="passeggero_{$listaDati[shuttle].passeggeri[passeggero].id}" name="passeggero_{$listaDati[shuttle].passeggeri[passeggero].id}" value="{$listaDati[shuttle].passeggeri[passeggero].id}">
                                        </td>
                                        <td>{#idPasseggero#}</td>
                                        <td>{$listaDati[shuttle].passeggeri[passeggero].id}</td>
                                        <td>{#idPrenotazione#}</td>
                                        <td>{$listaDati[shuttle].passeggeri[passeggero].id_prenotazione}</td>
                                        <td>{#nomeContatto#}</td>
                                        <td>{$listaDati[shuttle].passeggeri[passeggero].nome_contatto}</td>
                                        <td>{#cognomeContatto#}</td>
                                        <td>{$listaDati[shuttle].passeggeri[passeggero].cognome_contatto}</td>
                                        <td>{#emailContatto#}</td>
                                        <td>{$listaDati[shuttle].passeggeri[passeggero].email_contatto}</td>
                                        <td>{#cellulareContatto#}</td>
                                        <td>{$listaDati[shuttle].passeggeri[passeggero].cellulare_contatto}</td>
                                        <td>{#tipoPasseggero#}</td>
                                        <td>{$listaDati[shuttle].passeggeri[passeggero].tipo}</td>
                                    </tr>
                                {/section}
                            </table>
                            <hr>
                        {/section}
                    </form>
                </div>

                <div class="row uniform 50%">
                    <div class="2u 12u(mobile)">
                        <a href="amministrazione.php?m={$moduloCodificato}" class="button alt">{#indietro#}</a>
                    </div>

                </div>


            </section>
        </div>
    </div>
</section>