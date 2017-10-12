
<section id="main" class="container">
    <div class="row">
        <div class="12u">
            <!-- Home -->
            <section id="lista-shuttle" class="box">
                <h3>{#titoloShuttle#}</h3>

                <h4>{#titoloLista#}</h4>

                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>{#dataViaggio#}</th>
                            <th>{#struttura#}</th>
                            <th>{#mezzoPiuOrario#}</th>
                            <th>{#tipoViaggio#}</th>
                            <th>{#console#}</th>
                        </tr>
                        </thead>
                        <tbody>
                        {section name=riga loop=$listaElementiFe}
                            <tr>
                                <td>{$listaElementiFe[riga].data_viaggio|date_format:"%d-%m-%Y"}</td>
                                <td>{$listaElementiFe[riga].struttura}</td>
                                <td>{$listaElementiFe[riga].mezzo_piu_orario}</td>
                                <td>{$listaElementiFe[riga].tipo}</td>

                                <td><a href="?m=strutture&operazione=modifica&id={$listaElementiFe[riga].id}" class="button special small">{#bottoneModificaViaggio#}</a></td>
                            </tr>
                        {/section}
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</section>