<?php /* Smarty version 2.6.19, created on 2017-09-05 12:13:48
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
                
                <div class="mobile-header">
                	<img src="images/logo2.png">
                </div>

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

      
	</body>
</html>