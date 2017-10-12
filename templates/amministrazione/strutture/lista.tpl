<section id="main" class="container">
    <div class="row">
        <div class="12u">
            <!-- Home -->
            <section id="lista-strutture" class="box">
                <h3>{#titoloStrutture#}</h3>

                <h4>{#titoloLista#}</h4>
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>{#idStruttura#}</th>
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
                                    <td>{$listaElementiFe[riga].descrizione}</td>
                                    <td>{$listaElementiFe[riga].tipo}</td>
                                    <td>
                                        {if $listaElementiFe[riga].attiva eq "1"}
                                            {#attiva#}
                                        {else}
                                            {#nonAttiva#}
                                        {/if}
                                    </td>
                                    <td><a href="?m=strutture&operazione=modifica&id={$listaElementiFe[riga].id}" class="button special small">{#bottoneModificaStruttura#}</a></td>
                                </tr>
                            {/section}
                        </tbody>
                    </table>
                </div>

                <div class="row uniform 50%">
                    <div class="2u 12u(mobile)">
                        <a href="?m=strutture&operazione=nuova" class="button special small">{#bottoneNuovaStruttura#}</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>