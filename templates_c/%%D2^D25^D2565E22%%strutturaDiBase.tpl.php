<?php /* Smarty version 2.6.19, created on 2017-08-30 09:42:57
         compiled from strutturaDiBase.tpl */ ?>
<!DOCTYPE HTML>
<!--
	TRANSFEROMA 2.0
-->
<!-- <html dir="rtl" lang="he"> -->
<html dir="bid">
	<head>
		<title>TRANSFEROMA</title>
		<meta charset="<?php echo $this->_config[0]['vars']['codificaPagina']; ?>
" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 class="logo"><a href="#top"><img src="images/logo.png" /></a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
                            <li><a href="index.php?m=bookShuttle"><?php echo $this->_config[0]['vars']['prenotazione']; ?>
</a></li>
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
								<a href="#" class="icon fa-angle-down"><?php echo $this->_config[0]['vars']['cambioLingua']; ?>
</a>
								<ul>
									<li><a href="index.php?m=impostaLingua&lingua=<?php echo $this->_tpl_vars['codiceLinguaItaliano']; ?>
"><?php echo $this->_config[0]['vars']['linguaItaliana']; ?>
</a></li>
									<li><a href="index.php?m=impostaLingua&lingua=<?php echo $this->_tpl_vars['codiceLinguaInglese']; ?>
"><?php echo $this->_config[0]['vars']['linguaInglese']; ?>
</a></li>
									<li><a href="index.php?m=impostaLingua&lingua=<?php echo $this->_tpl_vars['codiceLinguaEbraica']; ?>
"><?php echo $this->_config[0]['vars']['linguaEbraica']; ?>
</a></li>


								</ul>
							</li>
							<li><a href="#" class="button"><?php echo $this->_config[0]['vars']['registrazione']; ?>
</a></li>
						</ul>
					</nav>
                    <div class="nav-shadow"></div>
				</header>

			<!-- Main -->

                    <?php echo $this->_tpl_vars['paginaDaVisualizzare']; ?>



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
        <?php echo '
			<script>
                $(\'a[href^="#"]\').on(\'click\', function (event) {
                    var target = $(this.getAttribute(\'href\'));
                    if (target.length) {
                        event.preventDefault();
                        $(\'html, body\').stop().animate({
                            scrollTop: target.offset().top + (-70)
                        }, 500);
                    }
                });
            </script>
		'; ?>

      
      
      <!-- google address autocomplete -->
      <script>
          <?php echo '
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: \'short_name\',
        route: \'long_name\',
        locality: \'long_name\',
        administrative_area_level_1: \'short_name\',
        country: \'long_name\',
        postal_code: \'short_name\'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById(\'autocomplete\')),
            {types: [\'geocode\']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener(\'place_changed\', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = \'\';
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

      // Bias the autocomplete object to the user\'s geographical location,
      // as supplied by the browser\'s \'navigator.geolocation\' object.
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
          '; ?>

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaY2lrdlT5lxaf6IKEfA90dqSDsOKQLrY&libraries=places&callback=initAutocomplete" async defer></script>

	</body>
</html>