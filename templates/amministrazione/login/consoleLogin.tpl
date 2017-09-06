<section id="main" class="container">
    <div class="row">
        <div class="12u">
            <section class="box">
                <h3>{#titoloConsoleLogin#}</h3>
                <form method="post" action="amministrazione.php">
                    <input type="hidden" name="m" value="login">
                    <input type="hidden" name="operazione" value="eseguiLogin">
                    <div class="row uniform 50%">
                        <div class="5u 12u(mobilep)">
                            <input type="text" name="username" id="username" value="" placeholder="{#username#}" />
                        </div>
                        <div class="5u 12u(mobilep)">
                            <input type="password" name="password" id="password" value="" placeholder="{#password#}" />
                        </div>

                        <div class="2u 12u(mobilep)">
                            <input type="submit" value="{#bottoneLogin#}" />
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</section>