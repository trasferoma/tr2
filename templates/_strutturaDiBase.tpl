 <!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" ><!--<![endif]-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inline s.r.l.</title>
<!-- Fogli di stile -->
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.css">
<link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css">
<link rel="stylesheet" href="assets/css/custom.css">
<!-- Modernizr -->
<script src="assets/js/modernizr.custom.js"></script>
<!-- respond.js per IE8 -->
<!--[if lt IE 9]>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
<style>
{literal}
html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -121px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 121px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }



{/literal}


</style>
</head>
<body>
<!-- Part 1: Wrap all page content here -->
<div id="wrap">

<div class="se-pre-con"></div>
<!-- Header e barra di navigazione -->
<header>
{if $mostraAvvisoCookie}
	<div class="avvisi-navigazione">
		<div id="coockie-info" class="alert alert-info">
			<a href="?coockieAccettato=1" class="close" data-dismiss="alert">&times;</a>
			<strong>Avviso!</strong> Questo sito utilizza i cookies. Utilizzando il nostro sito web l'utente dichiara di accettare e acconsentire all’ utilizzo dei cookies in conformità con i termini di uso dei cookies espressi in <a href="#" class="avvisi-navigazione_link-in-evidenza">questo documento</a>.
		</div>
	</div>
{/if}
<nav class="navbar navbar-default">
<div class="container">
 <div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
  </button>
  <!-- a class="navbar-brand" href="#">www.inlinesrl.com</a -->
 </div> 
 <div class="collapse navbar-collapse navbar-responsive-collapse">
   <ul class="nav navbar-nav">
	   <li {if $voceMenuSelezionataHome} class="active" {/if}><a href="index.html">Home</a></li>
	   <li {if $voceMenuSelezionataChiSiamo} class="active"{/if}><a href="chiSiamo.html">Chi Siamo</a></li>
	   <li {if $voceMenuSelezionataConsulenza} class="active"{/if}><a href="consulenza.html">Consulenza</a></li>
	   <li {if $voceMenuSelezionataFormazione} class="active"{/if}><a href="formazione.html">Formazione</a></li>
	   <li {if $voceMenuSelezionataSoluzioni} class="active"{/if}><a href="soluzioni.html">Soluzioni</a></li>
	   <li {if $voceMenuSelezionataClientiPartner} class="active"{/if}><a href="clientiPartner.html">Clienti &amp; Partner</a></li>
	   <li {if $voceMenuSelezionataCertificazioni} class="active"{/if}><a href="certificazioni.html">Certificazioni</a></li>
	   <li {if $voceMenuSelezionataInterventi} class="active"{/if}><a href="interventi.html">Interventi</a></li>
	   <li {if $voceMenuSelezionataContatti} class="active"{/if}><a href="contatti.html">Contatti</a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Lingua<span class="caret"></span></a>
			 <ul class="dropdown-menu">
				 <li><a href="#"><img src="assets/img/icone/b_italiano.gif" alt="lingua italiana"> Italiano</a></li>
				 <li><a href="#"><img src="assets/img/icone/b_inglese.gif" alt="lingua inglese"> Inglese</a></li>
			</ul>
		</li>
		
   </ul>
 </div><!-- /.nav-collapse -->
</div>
</nav><!-- /.navbar -->
</header><!-- /header -->

<div class="content">
	{$paginaDaVisualizzare}
</div>

<div id="push"></div>
</div> <!--  fine wrap -->
<!-- Footer -->
<div id="footer">
	<footer>
	<section id="footer-copy">
		<div class="row">
			<div class="col-sm-7">
			   <a href="http://www.dnvba.it" target="_blank"><img src="assets/img/ISO_9001_COL.png" alt="Marchio DNV GL Certificazione ISO 9001" id="logoFooter" class="thumbnail img-responsive" ></a>
			</div>

			<div class="col-sm-5">
				<address>
					<strong>INLINE S.r.l.</strong>
					via Flaminia, 215 00196 ROMA
					C.C.I.A.A. nr. 778793</br>
					Iscr. Trib. di Roma Reg. Soc. al nr. 6477/93</br>
								C.F. e Partita Iva n. 04545551006</br>
					info@inlinesrl.com - www.inlinesrl.com &middot; <a href="privacy.html">Privacy Policy</a> e <a href="noteLegali.html">Note Legali</a>

				</address>
			</div>
		</div>
		</section>
	</footer>
</div>

<!-- jQuery e plugin JavaScript  -->
<script src="assets/js/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/flexslider/jquery.flexslider.js"></script>
<script src="assets/js/scripts.js"></script>

</body>
</html>
