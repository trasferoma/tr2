<section id="main" class="container">
    <div class="row">
        <div class="12u">
            <!-- Home -->
            <section id="lista-strutture" class="box">
                <h3>{#titoloMezziPiuOrari#}</h3>

                <h4>{#titoloLista#}</h4>
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>{#idMezzoPiuOrario#}</th>
                            <th>{#direzione#}</th>
                            <th>{#descrizioneMezzoPiuOrario#}</th>
                            <th>{#attivaMezzoPiuOrario#}</th>
                            <th>{#descrizioneStruttura#}</th>
                            <th>{#tipoStruttura#}</th>
                            <th>{#attivaStruttura#}</th>
                            <th>{#console#}</th>
                        </tr>
                        </thead>
                        <tbody>
                            {section name=riga loop=$listaElementiFe}
                                <tr>
                                    <td>{$listaElementiFe[riga].id}</td>
                                    <td>{$listaElementiFe[riga].direzione}</td>
                                    <td>{$listaElementiFe[riga].descrizione}</td>
                                    <td>
                                        {if $listaElementiFe[riga].attiva eq "1"}
                                            {#attiva#}
                                        {else}
                                            {#nonAttiva#}
                                        {/if}
                                    </td>

                                    <td>{$listaElementiFe[riga].struttura}</td>
                                    <td>{$listaElementiFe[riga].tipo_struttura}</td>
                                    <td>
                                        {if $listaElementiFe[riga].struttura_attiva eq "1"}
                                            {#attiva#}
                                        {else}
                                            {#nonAttiva#}
                                        {/if}
                                    </td>
                                    <td><a href="?m={$modulo}&operazione=modifica&id={$listaElementiFe[riga].id}" class="button special small">{#bottoneModificaMezzoPiuOrario#}</a></td>
                                </tr>
                            {/section}
                        </tbody>
                    </table>
                </div>

                <div class="row uniform 50%">
                    <div class="2u 12u(mobile)">
                        <a href="?m={$modulo}&operazione=nuova" class="button special small">{#bottoneNuovaMezzoPiuOrario#}</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>