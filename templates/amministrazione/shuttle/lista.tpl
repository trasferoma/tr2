
<style>
    {literal}
    lista-shuttl ul{
        list-style:none;
        padding:0;
        min-height:12em;
    }
    lista-shuttl li:nth-child(2n){
        background-color:#a6dbed;
    }
    lista-shuttl div{
        float:left;
        margin:10px;
        border:1px solid black;
        min-width:40%;

    }
    {/literal}
</style>
<script language="JavaScript">
    {literal}
    $("#current-files").sortable({
        connectWith: "#selected-files"
    });

    $("#selected-files").sortable({
        connectWith: "#current-files"
    });


    $("#current-files li").dblclick(function(ev){
        $(this).prependTo("#selected-files");
    });

    $("#selected-files li").dblclick(function(ev){
        $(this).prependTo("#current-files");
    });

    $("#bottone").click(function() {
        // alert($("#selected-files li").attr('id'));

        $("#selected-files li").each(function(i)
        {
            alert($(this).attr('id')); // This is your rel value
        });

    });
    {/literal}
</script>

<section id="main" class="container">
    <div class="row">
        <div class="12u">
            <!-- Home -->
            <section id="lista-shuttle" class="box">
                <h3>{#titoloShuttle#}</h3>

                <h4>{#titoloLista#}</h4>

                <b><a href="https://jsfiddle.net/pu21jqst/3/">https://jsfiddle.net/pu21jqst/3/</a></b>
                <div>
                    <h3>Prenotazioni</h3>
                    <ul id="current-files">
                        <li id="elemento_1">Passeggero 1</li>
                        <li id="elemento_2">Passeggero 2</li>
                        <li id="elemento_3">Passeggero 3</li>
                        <li id="elemento_4">Passeggero 4</li>
                        <li id="elemento_5">Passeggero 5</li>
                        <li id="elemento_6">Passeggero 6</li>
                        <li id="elemento_7">Passeggero 7</li>
                        <li id="elemento_8">Passeggero 8</li>
                        <li id="elemento_9">Passeggero 9</li>
                        <li id="elemento_10">Passeggero 10</li>
                    </ul>
                </div>
                <div>
                    <h3>Shuttle</h3>
                    <ul id="selected-files">

                    </ul>
                </div>
                <input id="bottone" type="button" value="Salva" onClick="salva()">


            </section>
        </div>
    </div>
</section>