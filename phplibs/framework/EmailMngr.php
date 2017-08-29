<?php
/**
 * Classe 
 *
 * @package 
 *
 */
/* ******************************************************************** */
/**
 *	PHP INCLUDE 
 */
require_once("./phplibs/BaseClass.php");
require_once("./phplibs/Api.php");
require_once("./phplibs/email.properties.php");
//require_once("./phplibs/sendmail.class.php");
/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package 
 */
class EmailMngr extends BaseClass{

/** *************************************************** */
/**
 *	Costruttore
 */
function EmailMngr( &$hCtx, $stModKey, $fNoWork=false ) {

	$this->BaseClass($hCtx, $stModKey);

	$this->stNumAgenzia = "06 6380098";
	$this->stFax 		= "06 39674066";

	if( $fNoWork == false ) {
		$this->working();
	}


}
/** *************************************************** */
/**
 *	Gestisce il lavoro del modulo 
 */
function working() {

	$stModKey = $this->stModKey;

	switch( $_REQUEST[ "modop" ] ) {
	case "send":
		$n = $this->makeEmail();	
		Utility::redirect("?m=$stModKey&nemail=$n");
		exit;
	case "list":
	default:
		$this->lista();	
		break;
	}
}
/** *************************************************** */
/**
 *	Ritorna l'header formattato
 */
function getHeader( $stDestinatario ) {
	$st = "Gentile $stDestinatario, \n\nCome anticipato telefonicamente, Le inviamo in allegato la seguente documentazione:\n\n ";
	return $st;
}
/** *************************************************** */
/**
 *	Ritorna l'header formattato
 */
function getHeaderHTML( $stDestinatario ) {
		$st = <<<EOT
		<p><img src=  "http://www.puntotreg.it/images/logoemail.jpg" width=  "280" height=  "280"></p>Gentile $stDestinatario, <br><br>Come anticipato telefonicamente, Le inviamo in allegato la seguente documentazione: <br>\n<br>\n
EOT;
	return $st;
}
/** *************************************************** */
/**
 *	Info privacy
 */
function getPrivacyHTML($stNumAgenzia = "", $stFax = "") {

	global $HTTP_COOKIE_VARS;

	$stNumAgenzia = ( $stNumAgenzia == "" ) ? $this->stNumAgenzia : $stNumAgenzia ;
	$stFax = ( $stFax == "" ) ? $this->stFax : $stFax ;

	$st = "
Note sulla Privacy & Diritti dell�Interessato<br>
<br>
Le abbiamo inviato questa email per soddisfare una sua richiesta d�interessamento ai nostri servizi pervenutaci tramite il nostro sito e confermata telefonicamente, e per metterla quindi al corrente di quelle che sono le offerte, le condizioni contrattuali ed altri informazioni pertinenti alla sua richiesta, che abbiamo cercato di soddisfare tramite l�invio di appositi allegati alla presente.<br>
<br>
Ai sensi dell�art. 13 del D. lgs. 196/2003 sulla privacy, la TargeTpoinT titolare del trattamento dei suoi dati, con sede in via Carlo Galassi Paluzzi, 5 telefono: $stNumAgenzia fax $stFax ha integrato nel suo sito internet www.puntotreg.it un�idonea informativa accessibile a tutti. <br>
 <br> 
A riguardo, desideriamo informarLa che Lei potr� sempre esercitare i diritti di cui all'articolo 7 del D.LGS. n. 196/03, tra cui il diritto di accedere ai Suoi dati, di ottenerne senza ritardo l'aggiornamento, la rettificazione ovvero, quando vi ha interesse, l�integrazione, la cancellazione, la trasformazione in forma anonima o il blocco dei dati trattati in violazione di legge, compresi quelli di cui non e' necessaria la conservazione in relazione agli scopi per i quali i dati sono stati raccolti o successivamente trattati. Infine potr� opporsi al trattamento dei Suoi dati o semplicemente pu� opporsi alla trasmissione di email  per finalit� di informazione commerciale o pubblicitaria. <br>
<br>
Per esercitare i diritti in oggetto La preghiamo di contattarci all�indirizzo email privacy@puntotreg.it o di contattarci senza alcuna formalit� al numero di fax sopra indicato.<br>
<br>
RingraziandoLa ancora per averCi contattato, l�occasione ci � gradita per porgerLe i nostri pi� Cordiali Saluti.<br>
	";
	return $st;
}
/** *************************************************** */
/**
 *	Info privacy
 */
function getPrivacy($stNumAgenzia = "", $stFax = "") {

	global $HTTP_COOKIE_VARS;

	$stNumAgenzia = ( $stNumAgenzia == "" ) ? $this->stNumAgenzia : $stNumAgenzia ;
	$stFax = ( $stFax == "" ) ? $this->stFax : $stFax ;

	$st = "
Note sulla Privacy & Diritti dell�Interessato

Le abbiamo inviato questa email per soddisfare una sua richiesta d�interessamento ai nostri servizi pervenutaci tramite il nostro sito e confermata telefonicamente, e per metterla quindi al corrente di quelle che sono le offerte, le condizioni contrattuali ed altri informazioni pertinenti alla sua richiesta, che abbiamo cercato di soddisfare tramite l�invio di appositi allegati alla presente.

Ai sensi dell�art. 13 del D. lgs. 196/2003 sulla privacy, la TargeTpoinT titolare del trattamento dei suoi dati, con sede in via Carlo Galassi Paluzzi, 5 telefono: $stNumAgenzia fax $stFax ha integrato nel suo sito internet www.puntotreg.it un�idonea informativa accessibile a tutti. 
  
A riguardo, desideriamo informarLa che Lei potr� sempre esercitare i diritti di cui all'articolo 7 del D.LGS. n. 196/03, tra cui il diritto di accedere ai Suoi dati, di ottenerne senza ritardo l'aggiornamento, la rettificazione ovvero, quando vi ha interesse, l�integrazione, la cancellazione, la trasformazione in forma anonima o il blocco dei dati trattati in violazione di legge, compresi quelli di cui non e' necessaria la conservazione in relazione agli scopi per i quali i dati sono stati raccolti o successivamente trattati. Infine potr� opporsi al trattamento dei Suoi dati o semplicemente pu� opporsi alla trasmissione di email  per finalit� di informazione commerciale o pubblicitaria. 

Per esercitare i diritti in oggetto La preghiamo di contattarci all�indirizzo email privacy@puntotreg.it o di contattarci senza alcuna formalit� al numero di fax sopra indicato.

RingraziandoLa ancora per averCi contattato, l�occasione ci � gradita per porgerLe i nostri pi� Cordiali Saluti.
	
	";
	return $st;
}
/** *************************************************** */
/**
 *	Ritorna il footer formattato
 */
function getFooter() {

	global $HTTP_COOKIE_VARS;

	$stNumAgenzia = ( $HTTP_COOKIE_VARS[ LOGIN_NUMAGENZIA ] == "" ) ? $this->stNumAgenzia : $HTTP_COOKIE_VARS[ LOGIN_NUMAGENZIA ];
	$stFax = ( $HTTP_COOKIE_VARS[ LOGIN_FAX ] == "" ) ? $this->stFax : $HTTP_COOKIE_VARS[ LOGIN_FAX ];

	$stTitolo = $HTTP_COOKIE_VARS[ LOGIN_COOKIE_NAME ];
	$stEmail = $HTTP_COOKIE_VARS[ LOGIN_COOKIE_EMAIL ];
	$stCell1 = $HTTP_COOKIE_VARS[ LOGIN_COOKIE_CELL_1];
	$stCell2 = $HTTP_COOKIE_VARS[ LOGIN_COOKIE_CELL_2 ];

	$st = "
Ovviamente siamo a vostra completa disposizione per
qualsiasi tipo di informazione in merito alla nostra offerta  chiamando il
numero 06 63.800.98 
	
Con i migliori saluti, $stTitolo

Recapiti utili

Cellulare: $stCell1
Cellulare: $stCell2
Linea diretta: $stNumAgenzia
Fax: $stFax       	
Email: $stEmail 


	";
	return $st;
}
/** *************************************************** */
/**
 *	Ritorna il footer formattato
 */
function getFooterHTML() {

	global $HTTP_COOKIE_VARS;

	$stTitolo = $HTTP_COOKIE_VARS[ LOGIN_COOKIE_NAME ];

	$stNumAgenzia = ( $HTTP_COOKIE_VARS[ LOGIN_NUMAGENZIA ] == "" ) ? $this->stNumAgenzia : $HTTP_COOKIE_VARS[ LOGIN_NUMAGENZIA ];
	$stFax = ( $HTTP_COOKIE_VARS[ LOGIN_FAX ] == "" ) ? $this->stFax : $HTTP_COOKIE_VARS[ LOGIN_FAX ];

	$stEmail = $HTTP_COOKIE_VARS[ LOGIN_COOKIE_EMAIL ];
	$stCell1 = $HTTP_COOKIE_VARS[ LOGIN_COOKIE_CELL_1];
	$stCell2 = $HTTP_COOKIE_VARS[ LOGIN_COOKIE_CELL_2 ];

$st = "Ovviamente siamo a vostra completa disposizione per qualsiasi tipo di informazione in merito alla nostra offerta  chiamando il numero $stNumAgenzia <br>\n<br>\nCon i migliori saluti, $stTitolo<br>\n<br>\n<b>Recapiti utili</b><br>\n<br>\n";
	$st.="<table border=1 cellpadding=2 cellspacing=0 width=300><tr><td>Cellulare</td><td>$stCell1<br>\n</td></tr><tr><td>Cellulare</td><td>$stCell2<br>\n</td></tr><tr><td>Linea diretta</td><td>06.63800.98<br>\n</td></tr><tr><td>Fax</td><td>$stFax<br>\n</td></tr><tr><td>Email</td><td>$stEmail<br>\n</td></tr></table><br>\n";

	return $st;
}
/** *************************************************** */
/**
 *	Prende gli indici sull'array dei modelli 
 */
function getModelli() {

	$aRet = Array();

	while( list( $k, $v ) = @each( $_REQUEST ) ) {

		if( strncmp( $k, "chk_", strlen( "chk_" ) ) != 0 ) { continue; }
		$aRet[] = $v;
	}
	return $aRet;
}
/** *************************************************** */
/**
 *	Invio delle email
 */
function makeEmail() {
	
	$aDestinatari = explode(",", $_REQUEST["destinatari"] );

	$aModelli 		= $this->getModelli();
	$stTmplBodyHTML = $this->getBody($aModelli, $fHTML=true);
	$stTmplBodyTEXT = $this->getBody($aModelli, $fHTML=false);
	$aFile 			= $this->getFile($aModelli);

	/*
	echo "<pre>";
	print_r($aFile);
	echo "</pre>";
	*/

	for( $i = 0; $i < count( $aDestinatari) ; $i++ ) {
		$a = explode("||", $aDestinatari[ $i ] );
		$stEmail = $a[ 0 ];
		$stTitolo = $a[ 1 ];

		$stBodyHTML = ereg_replace("{TITOLO}", $stTitolo, $stTmplBodyHTML );
		$stBodyTEXT = ereg_replace("{TITOLO}", $stTitolo, $stTmplBodyTEXT );

		/*
		echo nl2br($stBodyTEXT);
		exit;
		*/

		$this->send($stTitolo, $stEmail, $stBodyHTML,$stBodyTEXT, $aFile);

		$this->emailRicevuta($stTitolo, $aModelli, $stEmail);
	}

	return $i;
}
/** *************************************************** */
/**
 *	Invio delle email
 */
function send($stTitolo, $stEmail, $stBodyHTML, $stBodyTEXT, $aFile) {

	global $HTTP_COOKIE_VARS;

	$INCLUDE_DIR = "./phplibs";

	require_once($INCLUDE_DIR . "/class.phpmailer.php");

	$mail = new PHPMailer();

	$mail->From     = $HTTP_COOKIE_VARS[ LOGIN_COOKIE_EMAIL2 ];
	$mail->FromName = $HTTP_COOKIE_VARS[ LOGIN_COOKIE_NAME ];
	//$mail->Host     = SMTP_HOST;
	$mail->Mailer   = "mail";


    $mail->Body    = $stBodyHTML;

    $mail->AltBody = $stBodyTEXT;
    $mail->AddAddress( $stEmail );

	//$mail->AddBCC(EMAIL_CONTENITORE);
	// ----------- $mail->AddBCC($HTTP_COOKIE_VARS[ LOGIN_COOKIE_EMAIL ]);
	//$mail->AddBCC($HTTP_COOKIE_VARS[ LOGIN_COOKIE_EMAIL2]);

	$mail->Subject = $_REQUEST["oggetto"];

	for( $i = 0 ; $i < count($aFile); $i++ ) {
		$stFilePath = $aFile[ $i ];
   		$mail->AddAttachment( $stFilePath );
	}

    if(!$mail->Send()) {
        echo "There has been a mail error sending to 1<br>";
		exit;
	}

    // Clear all addresses and attachments for next loop
    $mail->ClearAddresses();
    $mail->ClearAttachments();
}
/** *************************************************** */
/**
 *	Crea e invia le email per ricevuta al contenitore e all'agente
 */
function emailRicevuta($stTitolo, $aModelli, $stEmail) {

	global $EmProp_aEmail;
	global $HTTP_COOKIE_VARS;

	$INCLUDE_DIR = "./phplibs";

	require_once($INCLUDE_DIR . "/class.phpmailer.php");

	$mail = new PHPMailer();

	$mail->From     = $stEmail;
	//$mail->FromName = "Email automatica puntotreg - $stEmail";
	$mail->FromName = "$stEmail";
	//$mail->Host   = SMTP_HOST;
	$mail->Mailer   = "mail";

	//messaggio 
	$messaggio = "Inviati i seguenti modelli:\n\n";

	for( $j = 0 ; $j < count($aModelli); $j++ ) {
		$nIdx = $aModelli[$j];
		$hEmail = $EmProp_aEmail[$nIdx];
		$messaggio .= "- " . $hEmail->stTitolo . "\n";
	}

    $mail->Body    = $messaggio;

    $mail->AltBody = $messaggio;
    $mail->AddAddress( $HTTP_COOKIE_VARS[ LOGIN_COOKIE_EMAIL2] );

	// oggetto 
	//$mail->Subject = "email inviata per $stTitolo";
	$mail->Subject = "$stTitolo";

    if(!$mail->Send()) {
        echo "There has been a mail error sending to 1<br>";
		exit;
	}

    // Clear all addresses and attachments for next loop
    $mail->ClearAddresses();
    $mail->ClearAttachments();
}
/** *************************************************** */
/**
 *	Crea e invia le email per ricevuta al contenitore e all'agente
 */
function emailRicevuta2($stTitolo, $aModelli, $stEmail) {

	global $EmProp_aEmail;
	global $HTTP_COOKIE_VARS;

	// destinatari 
	//$destinatari  = EMAIL_CONTENITORE . ", " ; // notare la virgola
	//$destinatari .= $HTTP_COOKIE_VARS[ LOGIN_COOKIE_EMAIL2];

	$destinatari .= $HTTP_COOKIE_VARS[ LOGIN_COOKIE_EMAIL2];

	// oggetto 
	$oggetto = "email inviata per $stTitolo";

	//messaggio 
	$messaggio = "Inviati i seguenti modelli:\n\n";

	for( $j = 0 ; $j < count($aModelli); $j++ ) {
		$nIdx = $aModelli[$j];
		$hEmail = $EmProp_aEmail[$nIdx];
		$messaggio .= "- " . $hEmail->stTitolo . "\n";
	}

	//Per inviare email in formato HTML, si deve impostare l'intestazione Content-type. 
	$intestazioni  = "MIME-Version: 1.0\r\n";
	$intestazioni .= "Content-type: text/html; charset=iso-8859-1\r\n";

	// intestazioni addizionali 
	$intestazioni .= "From: Email automatica puntotreg <$stEmail>\r\n";
	//$intestazioni .= "To: Mary <mary@example.com>, Kelly <kelly@example.com>\r\n";
	//$intestazioni .= "Cc: archiviocompleanni@example.com\r\n";
	//$intestazioni .= "Bcc: controllocompleanni@example.com\r\n";

	//ed infine l'invio 

	
	/*
	printf("Destinatari: $destinatari<br>" );
	printf("Oggetto: $oggetto<br>" );
	printf("Messaggio: " . nl2br($messaggio) . "<br>" );
	printf("Intestazioni: " . nl2br($intestazioni) . "<br>" );
	*/
		
	mail($destinatari, $oggetto, $messaggio, $intestazioni);
}
/** *************************************************** */
/**
 *	Invio delle email
 */
function send2($stTitolo, $stEmail, $stBody, $aFile) {

	global $HTTP_COOKIE_VARS;

	$mail = new sendmail();
	$mail->SetCharSet("ISO-8859-1");
	
	$mail->from($HTTP_COOKIE_VARS[ LOGIN_COOKIE_NAME ],$HTTP_COOKIE_VARS[ LOGIN_COOKIE_EMAIL2 ]);

	// Angeben der Empfängeremailadresse
	$mail->to($stEmail);

	// Angeben des Cc Empfänger
	//$mail->cc("qqqq@eeee.it");
	//$mail->cc("xxxx@zzzz.it");

	// Angeben dec Bcc Empfänger
	$mail->bcc(EMAIL_CONTENITORE);
	$mail->bcc($HTTP_COOKIE_VARS[ LOGIN_COOKIE_EMAIL ]);

	$mail->subject($_REQUEST["oggetto"]);

	$mail->text($stBody);

	for( $i = 0 ; $i < count($aFile); $i++ ) {
		$mail->attachment( $aFile[ $i ] );
	}

	$mail->send();
}
/** *************************************************** */
/**
 *	Lista dei file da allegare
 */
function getFile($aModelli){

	global $EmProp_aEmail;

	$aRet = Array();

	for( $i = 0 ; $i < count($aModelli); $i++ ) {
		$nIdx = $aModelli[$i];
		$hEmail = $EmProp_aEmail[$nIdx];

		for( $j = 0 ; $j < count($hEmail->aFiles) ; $j++ ) {
			$aRet[] = $hEmail->aFiles[ $j ];
		}

	}

	return $aRet;
}
/** *************************************************** */
/**
 *	Forma il corpo della email
 */
function getBody($aModelli, $fHTML){

	global $EmProp_aEmail;

	if( $fHTML ){
		$stHeader = $this->getHeaderHTML( "{TITOLO}" );
		$stFooter = $this->getFooterHTML( );
		$stFooter .= $this->getPrivacyHTML( );
	}else{
		$stHeader = $this->getHeader( "{TITOLO}" );
		$stFooter = $this->getFooter( );
		$stFooter .= $this->getPrivacy( );
	}


	$stDocAllegata = "";

	$stBody = $stHeader;
	
	$stBody .= "\n";
	$stBody .= "{DOC_ALLEGATA}";
	$stBody .= "\n";

	for( $j = 0 ; $j < count($aModelli); $j++ ) {
		$nIdx = $aModelli[$j];
		$hEmail = $EmProp_aEmail[$nIdx];

		if( $fHTML ){
			$stDocAllegata .= "- " . $hEmail->stSpiegazione . "<br>\n<br>\n";

			if( $hEmail->stMessaggioHTML != "" ) {
							
				$stBody .= "<hr size=  1>\n";
				$stBody .= "<font color=  \"#333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">" . $hEmail->stTitolo . "</font>";
				$stBody .= "<hr size=  1>\n";
				$stBody .= $hEmail->stMessaggioHTML;
			}
		}else{
			$stDocAllegata .= "- " . $hEmail->stTitolo . "\n";
			if( $hEmail->stMessaggio != "" ) {
							
				$stBody .= "\n";
				$stBody .= "-------------------------------------------\n";
				$stBody .= $hEmail->stTitolo;
				$stBody .= "\n";
				$stBody .= "-------------------------------------------\n";
				$stBody .= $hEmail->stMessaggio;
			}
		}

	}

	$stBody .= $stFooter;

	$stBody = ereg_replace("{DOC_ALLEGATA}", $stDocAllegata, $stBody );

	return $stBody;
}
/** *************************************************** */
/**
 *	Lista degli elementi
 */
function lista() {
	global $EmProp_aEmail;

	$h 		= &$this->hFastTmpl;

	$h->define_dynamic ( $DynBlk="row_chk", $TmplKey="dati" );

	if( isset( $_REQUEST["nemail"] ) ) {
		$h->assign("EMAIL_INVIATE", "<b>" . $_REQUEST["nemail"] . "</b>");
	}else{
		$h->assign("EMAIL_INVIATE", "" );
	}

	require_once("./phplibs/email.properties.php");

	$aArticle = Api::normalMenu( $this->hCtx );
	$h->define( array ( "dati" => "templates/email_mngr.tpl" ) );

	for( $i = 0 ; $i < count( $EmProp_aEmail ) ; $i++ ) {

		$stBgColor = ( $i % 2 != 0 ) ? "#ffffff" : "#efefef" ;

		$hEmail = &$EmProp_aEmail[ $i ];

		$h->assign("BGCOLOR", $stBgColor );
		$h->assign("IDX", $i );
		$h->assign("CHK_VALUE", "$i" );
		$h->assign("CHK_TITOLO", $hEmail->stTitolo);
	
		$h->parse("ROWS_CHK", ".row_chk" );
	}
}
/** *************************************************** */
/**
 *
 */
function destroy( ) {

	return true;
}
/** *************************************************** */
} //End of class definition.
?>
