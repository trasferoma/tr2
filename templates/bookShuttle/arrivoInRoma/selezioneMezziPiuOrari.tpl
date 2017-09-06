<script src="assets/js/strumentiPerValidazioneForm.js"></script>
<script>
    {literal}

    $( function() {

    } );

    function validaForm() {
        datiValidi = false;

        mezzoPiuOrarioValido = validazioneMezzoPiuOrario();
        indirizzoDestinazione = validazioneIndirizzoDestinazione();

        datiValidi = mezzoPiuOrarioValido && indirizzoDestinazione;
        // datiValidi = true;

        if (datiValidi) {
            $( "#form" ).submit();
        }
    }

    function validazioneMezzoPiuOrario() {
        return validazioneCampoObbligatorio("#mezzoPiuOrario" );
    }

    function validazioneIndirizzoDestinazione() {
        return validazioneCampoObbligatorio("#indirizzoDestinazioneShuttle")
    }

    {/literal}
</script>

<section id="main" class="container">
    {include file="bookShuttle/arrivoInRoma/testatinaArrivoInRoma.tpl"}
    <div class="row">
        <div class="12u">

            <section class="box">

                <header>
                    <h3>{#titoloSelezionaMezziPiuOrari#}</h3>
                </header>
                <hr />
                <form action="index.php" id="form" method="POST">
                    <input type="hidden" name="m" value="{$modulo}">
                    <input type="hidden" name="operazione" value="{$prossimoPasso}">
                    <input type="hidden" name="token" value="{$token}">

                    <div class="row uniform 50%">
                        <div class="6u 12u(mobile)">
                            <div class="select-wrapper">
                                <select name="mezzoPiuOrario" id="mezzoPiuOrario">
                                    <option value="">{#mezzoPiuOrarioDiArrivo#}</option>
                                    {html_options options=$mezziPiuOrari selected=$mezzoPiuOrarioSelezionato}
                                </select>
                            </div>
                        </div>
                        <div class="6u 12u(mobile)">
                            <input type="text" name="indirizzoDestinazioneShuttle" id="indirizzoDestinazioneShuttle" placeholder="{#indirizzoDestinazioneShuttle#}" value="{$indirizzoDestinazioneShuttle}"/>
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="6u 12u(mobile)">
                            <a href="index.php?m={$moduloCodificato}&token={$tokenCodificato}&operazione={$passoPrecedente}" class="button alt">{#indietroStepPrecedenteDiCompilazione#}</a>
                        </div>
                        <div class="6u 12u(mobile)" style="text-align:right;">
                            <input type="button" value="{#avantiProssimoStepDiCompilazione#}" class="special" onClick="validaForm()">
                        </div>
                    </div>
                </form>

            </section>

        </div>
    </div>
</section>

{literal}
    <!-- google address autocomplete -->
    <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('indirizzoDestinazioneShuttle')),
                {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaY2lrdlT5lxaf6IKEfA90dqSDsOKQLrY&libraries=places&callback=initAutocomplete" async defer></script>
{/literal}
