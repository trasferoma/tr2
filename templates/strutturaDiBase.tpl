<!DOCTYPE HTML>
<!--
	TRANSFEROMA 2.0
-->
<!-- <html dir="rtl" lang="he"> -->
<html dir="bid">
	<head>
		<title>TRANSFEROMA</title>
		<meta charset="{#codificaPagina#}" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <script src="assets/js/jquery-1.12.4.js"></script>
        <script src="assets/js/jquery-ui.js"></script>

	</head>
	<body>
		<div id="page-wrapper">
			<!-- Header -->
			
            <header id="header">
                <h1 class="logo"><a href="#top"><img src="images/logo.png" /></a></h1>
                <nav id="nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php?m=bookShuttle">{#prenotazione#}</a></li>
                        <li><a href="amministrazione.php">{#amministrazione#}</a></li>
                        <li>
                            <a href="#" class="icon fa-angle-down">Layouts</a>
                            <ul>
                                <li><a href="index.php?m=bookShuttle">Book Shuttle</a></li>
                                <li><a href="index.php?m=testo">Testo</a></li>
                                <li><a href="index.php?m=liste">Liste</a></li>
                                <li><a href="index.php?m=tabelle">Tabelle</a></li>
                                <li><a href="index.php?m=bottoni">Bottoni</a></li>
                                <li><a href="index.php?m=form">Form</a></li>
                                <li><a href="index.php?m=immagini">Immagini</a></li>

                                <li>
                                    <a href="#">Submenu</a>
                                    <ul>
                                        <li><a href="#main">Main</a></li>
                                        <li><a href="#lists">Lists</a></li>
                                        <li><a href="#tables">Tables</a></li>
                                        <li><a href="#buttons">Buttons</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </li>
                        <li>
                            <a href="#" class="icon fa-angle-down">{#cambioLingua#}</a>
                            <ul>
                                <li><a href="index.php?m=impostaLingua&lingua={$codiceLinguaItaliano}">{#linguaItaliana#}</a></li>
                                <li><a href="index.php?m=impostaLingua&lingua={$codiceLinguaInglese}">{#linguaInglese#}</a></li>
                                <li><a href="index.php?m=impostaLingua&lingua={$codiceLinguaEbraica}">{#linguaEbraica#}</a></li>


                            </ul>
                        </li>
                        <li><a href="#" class="button">{#registrazione#}</a></li>
                    </ul>
                </nav>
                <div class="nav-shadow"></div>
            </header>

			<div class="mobile-header"></div>

			<!-- Main -->

             {$paginaDaVisualizzare}


			<!-- Footer -->
            <footer id="footer">
                <img src="images/logo2.png">
                <br><br>
                <ul class="icons">
                    <li><a href="#" class="icon fa-twitter"><span class="label">טוויטר</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">פייסבוק</span></a></li>
                    <!--
                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
                    <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                    <li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
                    -->
                </ul>
                <ul class="copyright">
                    <li>&copy; Transferoma.com - All rights reserved.</li>
                </ul>
            </footer>
		</div>

		<!-- Scripts -->
			<!--<script src="assets/js/jquery.min.js"></script>-->
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
            
            <!-- menu scroll -->
        {literal}
			<script>
                $('a[href^="#"]').on('click', function (event) {
                    var target = $(this.getAttribute('href'));
                    if (target.length) {
                        event.preventDefault();
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top + (-70)
                        }, 500);
                    }
                });
            </script>
		{/literal}
      
      
      <!-- google address autocomplete -->
      <!-- script>
          {literal}
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
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
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
          {/literal}
    </script -->
    <!-- script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaY2lrdlT5lxaf6IKEfA90dqSDsOKQLrY&libraries=places&callback=initAutocomplete" async defer></script -->

	</body>
</html>