<?php
/**
 * Libreria di utilita' generale
 *
 * @package utility
 *
 */
/* ******************************************************************** */
/**
 *	PHP INCLUDE 
 */
/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package utility
 */
class Utility {
/**
 *	PHP SPECIFIC GLOBAL VARIABLES
 */
/**
 *	Contiene il client agent
 *	@global string $BROWSER_AGENT
 *
 *	@see browserGetAgent()
 *	@see browserGetVersion()
 *	@see browserGetPlatform()
 *	@see browserIsMac()
 *	@see browserIsWindows()
 *	@see browserIsIE()
 *	@see browserIsNetscape()
 */
var $BROWSER_AGENT 	  = "";
/**
 *	Contiene il client agent version
 *	@global string $BROWSER_VER 
 *
 *	@see browserGetAgent()
 *	@see browserGetVersion()
 *	@see browserGetPlatform()
 *	@see browserIsMac()
 *	@see browserIsWindows()
 *	@see browserIsIE()
 *	@see browserIsNetscape()
 */
var $BROWSER_VER 	  = "";
/**
 *	Contiene la piattaforma client
 *	@global string $BROWSER_PLATFORM
 *
 *	@see browserGetAgent()
 *	@see browserGetVersion()
 *	@see browserGetPlatform()
 *	@see browserIsMac()
 *	@see browserIsWindows()
 *	@see browserIsIE()
 *	@see browserIsNetscape()
 */
var $BROWSER_PLATFORM = "";

static function getStatoApplicativo() {
	return STATO_APPLICATIVO;
}

/**
 *	PHP SPECIFIC FUNCTIONS
 */
/**
 *	PHP FUNCTIONS
 */
/**********************************************************************/
/**
 *	Apre un file per scrivere il LOG.
 *	il file descriptor del log viene mantenuto nella variabile globale
 *	$util_logFd
 */
static function logOpen( $stLogFileName ) {
	global $util_logFd;
	$fd = fopen( $stLogFileName, "w+" );

	if( $fd == false ) { return false; }

	$util_logFd = $fd;

	return true;
}
/**********************************************************************/
/**
 *	Scrive una riga nel log
 */
static function logWrite( $st ) {
	global $util_logFd;
	fwrite( $util_logFd, $st );
	fwrite( $util_logFd, "\n" );
}
/**********************************************************************/
/**
 *	Chiude il file di log
 */
static function logClose( ) {
	global $util_logFd;
	@close( $util_logFd );
}
/**
 *	Ritorna in il metodo di passaggio delle informazioni del FORM HTML.
 *	@return string Ritorna il tipo di transazione se POST o GET
 */
static function getMethod( ) {

    global $_SERVER;

	$stRet = $_SERVER["REQUEST_METHOD"];

	if( $stRet == "" ) {
		global $HTTP_SERVER_VARS;
		$stRet = $HTTP_SERVER_VARS["REQUEST_METHOD"];
	}

	return $stRet;
}
/**
 *
 * 	Ritorna l'array che contiene i dati del FORM HTML indipendentemente al metodo, GET o POST usato.
 *	@return array Hashtable contenente la coppia "nome campo" => "valore campo"
 */
static function formData( ) {
	return $_REQUEST;
}
/*
 *--------------------------------------------------------------------
 * @descr:	Mette i separatori delle migliaia
 *--------------------------------------------------------------------
 */
static function currencyFormat($rImporto, $nNumDecimali=0) {
	$rImporto = round ($rImporto, $nNumDecimali);

	list($stIntero, $stDecimale) = explode(".", $rImporto);

	$stRet 	= "";
	$n 		= strlen($stIntero);

	$nStart = 3;

	while ($n > $nStart) {
		if ($stRet != "") { $stRet = "." . $stRet; }

		$stRet = substr($stIntero, -$nStart, 3) . $stRet;
		$nStart += 3;
	}

	$nStart -= 3;
	$nCharRimasti = $n - $nStart;

	if ($stRet != "") { $stRet = "." . $stRet; }

	return $stRet = substr($stIntero, 0, $nCharRimasti) . $stRet;
}

/**
 * Trasforma la data composta dai parametri di ingresso nel formato timestamp
 *
 *	@param int $h ora
 *	@param int $m minuti
 *	@param int $s secondi
 *	@param int $day giorno
 *	@param int $month mese
 *	@param int $year anno
 *	@return int ritorna la data in timestamp
 */
static function getTimeNow	( 
							$h = false, 
							$m = false, 
							$s = false, 
							$day = false,
							$month = false,
							$year = false
							) {

	if ( ! $h ) $h 	= 0;
	if ( ! $m ) $s 	= 0;
	if ( ! $s ) $s 	= 0;

	if ( ! $day ) 	$day 	= date("d"); 
	if ( ! $month ) $month 	= date("m"); 
	if ( ! $year ) 	$year 	= date("Y"); 

	$nRet = mktime ( $h, $m, $s, $month, $day, $year);

	return $nRet;
}
/**
 * 	Esegue un azione SQL generica ( insert, delete, select )
 *	@param Context $g_hCtx Il contesto
 *	@param string stQry Buffer della query
 *	@param boolean $fLog Flag per attivare il log delle query
 *	@return boolean lo stato della query
 */
static function sqlAction( &$hCtx, $stQry, $fLog = true ) {

	$fRet = $hCtx->sqlAction( $stQry, $fLog );

	return $fRet;
}
/**
 * 	Ritorna l'ultimo ID inserito
 *	@param Context $hCtx Il contesto
 *	@return int ultimo ID inserito
 */
static function lastID( &$hCtx ) {
	$stID = $hCtx->lastID( );

	return $stID;
}
/**
 *	Inserisce nell'array delle sezioni una nuova sezione con i dati risultanti dalla qry passata in input.	
 *	@param Context $hCtx Il contesto
 *	@param string $stSectName Chiave della sezione
 *	@param string $stQry Buffer della query
 *	@return boolean Stato dell'operazione
 */
static function getSect( &$hCtx, $stSectName, $stQry ) {

	$hSect = $hCtx->getSect( $stQry );

	$fRet = false;

	if ( $hSect ){
		$hCtx->aSect[ $stSectName ] = $hSect;
		$fRet = true;
	}

	return $fRet;
}
/**
 * 	Esegue un unico ciclo di fetch per la lettura dei risultati della query
 *	@param Context $hCtx Il contesto
 *	@param string $stSectName Chiave della sezione
 *	@return boolean Stato della lettura
 */
static function sectStart( $hCtx, $stSectName ) {
	$fRet = sectNext( $hCtx, $stSectName );
	return $fRet;
}

/**
 *	Esegue un ciclo di fetch per il recupero dei dati dal DB
 *
 *	@param Context $hCtx Il contesto
 *	@param string $stSectName Chiave della sezione
 *	@return boolean Stato della lettura false indica anche fine degli elementi
 */
static function sectNext( &$hCtx, $stSectName ) {

	$hSect = $hCtx->sectNext( $stSectName );

	$fRet = false;

	if ( $hSect ){
		$hCtx->aSect[ $stSectName ] = $hSect;
		$fRet = true;
	}

	return $fRet;
}
/**
 *	Ritorna una parte della data ( stData ) sia essa giorno, mese o anno a seconda del parametro in input ( stObj ).
 *	i possibili valori di $stObj sono :
 *		- day
 *		- month
 *		- year
 *
 *	@param string $stObj tipo di operazione
 *	@param string $stDate Data da elaborare
 *	@return string Porzione della data desiderata
 */
static function getFromDate( $stObj, $stDate ) {

	$a = split("-", $stDate );

	switch ( $stObj ) {

	case "day":
        $stRet = $a[ 2 ];
		break;
	case "month":
        $stRet = $a[ 1 ];
		break;
	case "year":
        $stRet = $a[ 0 ];
		break;
	default:
        $stRet = false;
		break;
	}
	return $stRet;
}
/**
 *	Converte una data in formato yyyy/mm/dd nel formato europeo dd/mm/yyyy
 *
 *	Il campo $stType puo' avere vari valori sulla base del quale formato 
 *	si presenta la data di input.
 *
 *	-	YYYYMMDD
 *	-	YYMMDD
 *	-	YYYY-MM-DD
 *	-	YY-MM-DD
 *
 *	@param string $stData Data nel formato da specificare
 *	@param string $stType Formato della data di input
 *	@return string Data convertita
 */
static function europeDate( $stDate, $stType = "YY-MM-DD" ) {

	switch( $stType ) {
	case "YYYYMMDD":

		$stY = substr( $stDate, 0, 4 );
		$stM = substr( $stDate, 4, 2 );
		$stD = substr( $stDate, 6, 2 );

		break;
		
	case "YYMMDD":

		$stY = substr( $stDate, 0, 2 );
		$stM = substr( $stDate, 2, 2 );
		$stD = substr( $stDate, 4, 2 );

		break;
		
	case "YYYY-MM-DD 00:00:00":
		$a = explode(" ", $stDate);
		$stDate = $a[0];
	case "YYYY-MM-DD":
	case "YY-MM-DD":
	default:

		$a = split("-", $stDate);

		$stD = $a[ 2 ];
		$stM = $a[ 1 ];
		$stY = $a[ 0 ];

		break;
	}

	$stRet = sprintf("%s/%s/%s", $stD,  $stM, $stY );

	return $stRet;
}
/**
 *	Converte una data in formato dd/mm/yyyy nel formato sql yyyy/mm/dd
 *
 *	Il campo $stType puo' avere vari valori sulla base del quale formato 
 *	si presenta la data di input.
 *
 *	- DD/MM/YY
 *
 *	@param string $stDate Data nel formato da specificare
 *	@param string $stType Formato della data di input
 *	@return string Data convertita
 */
static function sqlDate( $stDate, $stType = "DD/MM/YY" ) {

	switch( $stType ) {
	case "DD/MM/YY":
		$stD = substr( $stDate, 0, 2 );
		$stM = substr( $stDate, 3, 2 );
		$stY = substr( $stDate, 6, 4 );

		$stRet = sprintf("%s-%s-%s", $stY,  $stM, $stD );
	}

	return $stRet; 
}
/**
 *	Disabilita la cache del browser
 */
static function headerNoCache( ) {

	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");

	return;
}

/**
 * 	Esegue un redirect sullo specifico URL passato in input.
 *
 *	@param string stURL URL destinazione
 */
static function redirect( $stURL ) {
	header("Location: $stURL");
	return;
}
/**
 *	Ritorna la data corrente nel formato ora + data
 *	i campi di imput sono i separatori da mettere fra gli elementi dell'ora e gli
 *	elementi della data
 *
 *	@param string $stDataSeparator Separatore per data
 *	@param string $stTimeSeparator Separatore per orario
 *	@param 
 *
 *	@return string ritorna la stringa formattata
 */
static function getData( $fNoSecond = false, $stDataSeparator = "", $stTimeSeparator = "" ) {

	$stAnno = date("Y");
	$stMese = date("m");
	$stGiorno = date("d");

	if( $fNoSecond ) {
		$stOre     = "00";
		$stMinuti  = "00";
		$stSecondi = "00";
	}else{
		$stOre     = date("h");
		$stMinuti  = date("i");
		$stSecondi = date("s");
	}
	$stRet = $stAnno . $stDataSeparator . $stMese . $stDataSeparator . $stGiorno . " " .$stOre . $stTimeSeparator . $stMinuti . $stTimeSeparator . $stSecondi;

	return $stRet;
}
/**
 *	Riceve in ingresso una data in un formato da specificare ( default: yyyy-mm-gg ) e la trasforma nel formato timestamp
 *
 *	@param string $stData Data da convertire
 *	@return int Data nel formato timestamp
 */
static function date2TimeStamp( $stData, $stType = "YYYY/MM/GG" ) {


	switch( $stType ) {
	case "GG-MM-YYYY":
		$a = explode( "-", $stData );
		$stD = $a[ 0 ];
		$stM = $a[ 1 ]; 	
		$stY = $a[ 2 ]; 	
		break;
	case "GG/MM/YYYY":
		$a = explode( "/", $stData );
		$stD = $a[ 0 ];
		$stM = $a[ 1 ]; 	
		$stY = $a[ 2 ]; 	
		break;
	case "YYYY-MM-GG":
		$a = explode( "-", $stData );
		$stY = $a[ 0 ]; 	
		$stM = $a[ 1 ]; 	
		$stD = $a[ 2 ];
		break;
	case "YYYY/MM/GG":
		$a = explode( "/", $stData );
		$stY = $a[ 0 ]; 	
		$stM = $a[ 1 ]; 	
		$stD = $a[ 2 ];
		break;
	}

	$nRet = mktime( 0, 0, 0, $stM, $stD, $stY );

	return $nRet;
}
/**
 *	Rimuove il carattere " e le sostituisce con l'equivalente HTML
 *	@param string $st Stringa da controllare
 *	@return string Stringa controllata
 */
static function textHTMLFilter( $st ) {

	$st = stripslashes( $st ) ;
	$a = explode("\"", $st );
	$st = join("&quot;", $a);

	return $st;
}
/**
 *	Rimuove tutti i tag HTML dalla stringa di input
 *	@param string $st Stringa da controllare
 *	@return string Stringa controllata
 */
static function stripTags( $st ) {
	$stRet = strip_tags( $st );
	return $stRet;
}
/**
 *	Tronca il buffer di input alla dimensione espressa da $nChar 
 *	$nChar rappresenta infatti il numero massimo di caratteri consentiti.
 *
 * 	Attenzione $nChar comprende i tag HTML eventualmente presenti nel buffer di input
 *
 *	@param string $stBuffer Stringa da troncare
 *	@param int $nChar numero massimo di caratteri consentiti
 */
static function shortText( $stBuffer, $nChar ) {

	if ( strlen( $stBuffer ) <= $nChar ) {
		return $stBuffer;
	}

	do{
		$nPos = strpos( $stBuffer, " ", $nChar );
		$nChar--;
	}while ( $nPos == false || $nPos == "" );

	$stRet = substr( $stBuffer, 0, $nPos );

	$stRet = $stRet . "....";

	return $stRet;
}
/**
 *	Ritorna un booleanno sulla base del fatto che il file name passato in input 
 *	sia un window lnk file oppure no
 *
 *	@param string $stFIle Stringa contenente il nome del file
 *	@return boolean file lnk si/no
 *
 */
static function isLnkFile( $stFileName ) {
	$aSav = explode(".", $stFileName );
	$fRet = ( $aSav[ count( $aSav ) -1 ] == "lnk" ) ? true : false ;

	return $fRet;
}
/**
 *	Ritorna il nome del link senza l'estensione lnk
 *
 *	@param string $stFile Stringa contenente il nome del file
 *	@return string file senza lnk 
 */
static function lnkFileName( $stFileName ) {
	$a = explode(".", $stFileName );

	array_pop( $a );
	$stName = join( ".", $a );

	return $stName;
}
/**
 *	Ritorna l'estensione del file passato in input
 *
 *	@param string $stFIle Stringa contenente il nome del file
 *	@return string Estensione del file
 *
 */
static function getFileExt( $stFileName ) {
	$aSav = explode(".", $stFileName );
	$stRet = ( Utility::isLnkFile( $stFileName ) ) ? $aSav[ count( $aSav ) -2 ] : $aSav[ count( $aSav ) -1 ] ;

	return $stRet;
}
/**
 *	Prende in input una stringa contenente l'estenaione del file e ritorla l'estensione default
 *
 *	@param string $stExt Stringa contenente l'estensione del file
 *	@return string Estensione ricavata
 *
 */
static function getIcoExt($stExt) {
	switch (strtolower(trim($stExt))) {
	case "zip":
	case "tar":
	case "ace":
	case "tgz":
	case "sit":
	case "gz":
	case "hqx":
	case "rar":
		$stExt = "zip";
		break;
	case "swf":
		$stExt = "swf";
		break;
	case "gif":
	case "jpg":
	case "jpeg":
	case "tif":
	case "png":
	case "pit":
	case "pict":
	case "pct":
	case "pcx":
	case "raw":
	case "bmp":
		$stExt = "jpg";
		break;
	case "doc":
	case "txt":
	case "rtf":
	case "wri":
	case "dot":
	case "log":
		$stExt = "doc";
		break;
	case "pdf":
		$stExt = "pdf";
		break;
	case "ppt":
		$stExt = "ppt";
		break;
	default:
		$stExt = "unknow";
		break;
	}

	return $stExt;
}
/**
 *	Ritorna il vero nome di file puntato dal file lnk
 */
static function getLnkFileReal( $stFile ) {

	if( Utility:: browserIsWindows() ) {
		$stCmd = FS_BASE . "\\tools\\readlnk.exe \"$stFile\"";
		return exec( $stCmd, $aRet );
	}

	return readlink( $stFile );
}
/**
 *	Torna la dimensione del file passato in input in un array di due elementi
 *	il primo elemento indica la misura della size;
 *	il secondo elemento indica l'unita' di misura in byte.
 */
static function getFileSize( $stFile ) {

	if( file_exists( $stFile ) == false ) {
		$aRet[ "size" ] = 0;
		$aRet[ "byte_unit" ] = "Kb";

		return $aRet;
	} 

	if( Utility::isLnkFile( $stFile ) ) {
		$stFile = Utility::getLnkFileReal( $stFile );
	}
	

	$stGrandezza = "MB";

	$nSize = round( ( @filesize( $stFile ) / 1024 ) / 1024, 1 );

	if( $nSize == 0 ) {
		$nSize = round( @filesize( $stFile ) / 1024, 1 );
		$stGrandezza = "Kb";
	}

	$aRet[ "size" ] = $nSize;
	$aRet[ "byte_unit" ] = $stGrandezza;

	return $aRet;
}
/**
 *	Se la variabile $stVal passata in input e' vuota viene ritornato il valore della chiave
 *	$stKey preso dal cookie.
 *	Se questa chiave dovesse non esistere all'ora viene ritornato il default passato $stDflt.
 *
 *	Comunque vada il risultato viene salvato nel cookie
 */
static function cookieGet( $stKey, $stModKey ) {

	global $HTTP_COOKIE_VARS;
	$stCookKey = sprintf( "%s_%s", $stModKey, $stKey );

	return ( isset( $HTTP_COOKIE_VARS[ $stCookKey ] ) ) ? $HTTP_COOKIE_VARS[ $stCookKey ] : false ;
}
/**
 *	Se la variabile $stVal passata in input e' vuota viene ritornato il valore della chiave
 *	$stKey preso dal cookie.
 *	Se questa chiave dovesse non esistere all'ora viene ritornato il default passato $stDflt.
 *
 *	Comunque vada il risultato viene salvato nel cookie
 */
static function cookieSet( $stKey, $stModKey, $stDflt, $stVal ) {

	global $HTTP_COOKIE_VARS;
	$stCookKey = sprintf( "%s_%s", $stModKey, $stKey );

	if( $stVal == "" ) {
		$stVal	= ( isset( $HTTP_COOKIE_VARS[ $stCookKey ] ) ) ? $HTTP_COOKIE_VARS[ $stCookKey ] : $stDflt ;
	}

	setcookie( $stCookKey, $stVal );
	$HTTP_COOKIE_VARS[$stCookKey] = $stVal;

	return $stVal;
}
/**
 *	Elimina un elemento dal cookie
 */
static function cokieErase( $stKey, $stModKey ) {

	global $HTTP_COOKIE_VARS;

	$stCookKey = sprintf( "%s_%s", $stModKey, $stKey );
	$stVal = -1;

	setcookie( $stCookKey, $stVal );
	$HTTP_COOKIE_VARS[$stCookKey] = $stVal;
}

/**
 *		Fa il parse dei parametri passati in input secondo 
 *		gli standard del motore di ricerca
 */
static function parseKeys( $stKey ){

	unset( $arKey );                    // Initialize array

	$stKey = stripslashes( $stKey );

	// estrae stringa ""
	while( preg_match ( "/\"[^\"]*\"/", $stKey, $match ) ) {
		$stKey = @preg_replace ( "/\"[^\"]*\"/", "", $stKey );  // elimina "matched" dal testo

		$match[0] = @preg_replace ("'\"'", "", $match[0] );     // elimina " dalla matched string

		$arKey[count($arKey)] = trim($match[0]);
	}


	$arTemp = explode( " ", $stKey );

	for( $i=0; $i<count($arTemp); $i++ ) {
		if( trim($arTemp[$i])!="" ) {
			$arKey[count($arKey)] = trim($arTemp[$i]);
		}
	}

	return $arKey;
}
/**
 * Differenza fra date, il formato delle date deve essere il seguente:
 *
 *	yyyy-mm-gg hh:mm:ss
 *	
 */
 static function datediff($tipo, $partenza, $fine)
    {
        switch ($tipo)
        {
            case "A" : $tipo = 365;
            break;
            case "M" : $tipo = (365 / 12);
            break;
            case "S" : $tipo = (365 / 52);
            break;
            case "G" : $tipo = 1;
            break;
        }
        $arr_partenza = explode("-", $partenza);
        $partenza_gg = $arr_partenza[2];
        $partenza_mm = $arr_partenza[1];
        $partenza_aa = $arr_partenza[0];
        $arr_fine = explode("-", $fine);
        $fine_gg = $arr_fine[2];
        $fine_mm = $arr_fine[1];
        $fine_aa = $arr_fine[0];
        $date_diff = mktime(12, 0, 0, $fine_mm, $fine_gg, $fine_aa) - mktime(12, 0, 0, $partenza_mm, $partenza_gg, $partenza_aa);
        $date_diff  = floor(($date_diff / 60 / 60 / 24) / $tipo);
        return $date_diff;
	}
/**
 *
 */
static function getListaMesi() {
	return  array ("", "Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");
}
/**
 * Differenza fra date, il formato delle date deve essere il seguente:
 *
 *	gg-mm-yyyy hh:mm:ss
 *	
 */
static function getDateDifference($dateFrom, $dateTo, $unit = 'd')
{
   $difference = null;

   $dateFromElements = split(' ', $dateFrom);
   $dateToElements = split(' ', $dateTo);

   $dateFromDateElements = split('-', $dateFromElements[0]);
   $dateFromTimeElements = split(':', $dateFromElements[1]);
   $dateToDateElements = split('-', $dateToElements[0]);
   $dateToTimeElements = split(':', $dateToElements[1]);

   // Get unix timestamp for both dates

   $date1 = mktime($dateFromTimeElements[0], $dateFromTimeElements[1], $dateFromTimeElements[2], $dateFromDateElements[1], $dateFromDateElements[0], $dateFromDateElements[2]);
   $date2 = mktime($dateToTimeElements[0], $dateToTimeElements[1], $dateToTimeElements[2], $dateToDateElements[1], $dateToDateElements[0], $dateToDateElements[2]);

   if( $date1 > $date2 )
   {
       return null;
   }

   $diff = $date2 - $date1;

   $days = 0;
   $hours = 0;
   $minutes = 0;
   $seconds = 0;

   if ($diff % 86400 <= 0)  // there are 86,400 seconds in a day
   {
       $days = $diff / 86400;
   }

   if($diff % 86400 > 0)
   {
       $rest = ($diff % 86400);
       $days = ($diff - $rest) / 86400;

       if( $rest % 3600 > 0 )
       {
           $rest1 = ($rest % 3600);
           $hours = ($rest - $rest1) / 3600;

           if( $rest1 % 60 > 0 )
           {
               $rest2 = ($rest1 % 60);
               $minutes = ($rest1 - $rest2) / 60;
               $seconds = $rest2;
           }
           else
           {
               $minutes = $rest1 / 60;
           }
       }
       else
       {
           $hours = $rest / 3600;
       }
   }

   switch($unit)
   {
       case 'd':
       case 'D':

           $partialDays = 0;

           $partialDays += ($seconds / 86400);
           $partialDays += ($minutes / 1440);
           $partialDays += ($hours / 24);

           $difference = $days + $partialDays;

           break;

       case 'h':
       case 'H':

           $partialHours = 0;

           $partialHours += ($seconds / 3600);
           $partialHours += ($minutes / 60);

           $difference = $hours + ($days * 24) + $partialHours;

           break;

       case 'm':
       case 'M':

           $partialMinutes = 0;

           $partialMinutes += ($seconds / 60);

           $difference = $minutes + ($days * 1440) + ($hours * 60) + $partialMinutes;

           break;

       case 's':
       case 'S':

           $difference = $seconds + ($days * 86400) + ($hours * 3600) + ($minutes * 60);

           break;

       case 'a':
       case 'A':

           $difference = array (
               "days" => $days,
               "hours" => $hours,
               "minutes" => $minutes,
               "seconds" => $seconds
           );

           break;
   }

   return $difference;
}
/**
 * Esegue un programma chiamato dal PHP in background, questo significa che dopo la chiamata il php non aspetta il risultato 
 *
 *	ma continua l'elaborazione
 */
static function execInBackground($path, $exe, $args = "") {
   global $conf;
   
	$fRet = true;

   if (file_exists($path . $exe)) {
       chdir($path);
       if (substr(php_uname(), 0, 7) == "Windows"){
           pclose(popen("start \"bla\" \"" . $exe . "\" " . escapeshellarg($args), "r"));    
       } else {
           exec("./" . $exe . " " . escapeshellarg($args) . " > /dev/null &");    
       }
   }else{
		$fRet = false;
   }

   return $fRet;
}
/**
 *	Ritorna le informazioni relative al browser agent
 *	i tipi di browser possibili sono i seguenti:
 *		- IE
 *		- OPERA
 *		- MOZILLA
 *		- OTHER
 *
 *	@return string
 */
static function browserGetAgent () {
	global $HTTP_USER_AGENT;

	if (ereg( 'MSIE ([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version)) {
		$BROWSER_VER=$log_version[1];
		$BROWSER_AGENT='IE';
	} elseif (ereg( 'Opera ([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version)) {
		$BROWSER_VER=$log_version[1];
		$BROWSER_AGENT='OPERA';
	} elseif (ereg( 'Mozilla/([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version)) {
		$BROWSER_VER=$log_version[1];
		$BROWSER_AGENT='MOZILLA';
	} else {
		$BROWSER_VER=0;
		$BROWSER_AGENT='OTHER';
	}
	return $BROWSER_AGENT;
}

/**
 *	Ritorna la versione del browser
 *	@return string
 */
static function browserGetVersion() {
    global $BROWSER_VER;
    return $BROWSER_VER;
}

/**
 *	Ritorna la piattaforma del client.
 *	Le possibili opzioni sono :
 *		- Win
 *		- Mac
 *		- Linux
 *		- Unix
 *		- Other
 *
 *	@return string
 */
static function browserGetPlatform() {
    global $HTTP_USER_AGENT;

	if (strstr($HTTP_USER_AGENT,'Win')) {
		$BROWSER_PLATFORM='Win';
	} else if (strstr($HTTP_USER_AGENT,'Mac')) {
		$BROWSER_PLATFORM='Mac';
	} else if (strstr($HTTP_USER_AGENT,'Linux')) {
		$BROWSER_PLATFORM='Linux';
	} else if (strstr($HTTP_USER_AGENT,'Unix')) {
		$BROWSER_PLATFORM='Unix';
	} else {
		$BROWSER_PLATFORM='Other';
	}
    return $BROWSER_PLATFORM;
}
/**
 *	Ritorna true se la piattaforma client e' un Linux
 *	@return boolean
 */
static function browserIsLinux() {
    if (Utility::browserGetPlatform()=='Linux') {
        return true;
    } else {
        return false;
    }
}
/**
 *	Ritorna true se la piattaforma client e' un Mac
 *	@return boolean
 */
static function browserIsMac() {
    if (Utility::browserGetPlatform()=='Mac') {
        return true;
    } else {
        return false;
    }
}

/**
 *	Ritorna true se la piattaforma client e' un Window
 *	@return boolean
 */
static function browserIsWindows() {
    if (Utility::browserGetPlatform()=='Win') {
        return true;
    } else {
        return false;
    }
}

/**
 *	Ritorna true se l'agent e' internet explorer
 *	@return boolean
 */
static function browserIsIE() {
    if (browserGetAgent()=='IE') {
        return true;
    } else {
        return false;
    }
}
/**
 *	Ritorna true se l'agent e' netscape 
 *	@return boolean
 */
static function browserIsNetscape() {
    if (browserGetAgent()=='MOZILLA') {
        return true;
    } else {
        return false;
    }
}
/**
 * 	Elimina dir e subdir
 *	@param string $stDir Directory da rimuovere
 */
static function fs_rmdir( $stDir ) {

	//$file = DIR_TMP . "/" . $stDir;

	$file = $stDir;

	@chmod($file,0777); 

	if (is_dir($file)) { 

		$handle = opendir($file); 

		while($filename = readdir($handle)) { 
	  		if ($filename != "." && $filename != "..") { 
	  			sUtil_Remove($file."/".$filename); 
	  		} 
	 	} 

		closedir($handle); 
	 	rmdir($file); 
	} else { 
		@unlink($file); 
	} 

}
/**
 *	Copia una directory e tutte le sue subdir
 *
 *	@param string $from_path Directory sorgente
 *	@param string $to_path Directory destinazione
 */
static function fs_dircopy( $from_path,  $to_path) { 
	@mkdir($to_path, 0777); 
	$this_path = getcwd(); 
	if (is_dir($from_path)) { 
		@chdir($from_path); 
		$handle=opendir('.'); 
		while (($file = readdir($handle))!==false) { 
			if (($file != ".") && ($file != "..")) { 
				if (is_dir($file)) { 
					sUtil_DirCopy($from_path.$file."/", $to_path.$file."/"); 
					@chdir($from_path); 
				} 

				if (is_file($file)){ 
					$f = copy($from_path.$file, $to_path.$file); 
					if( $f == false ) { return false; }
				} 
			} 
		} 

		closedir($handle); 
	} 

	return true;
}
/**
 *	Cambia ricorsivamente il UID e il GID di file e directory a partire da un path specifico
 *
 *	@param string $path Directory sorgente
 *	@param string $uid userID
 *	@param string $gid groupID
 */
static function fs_chown_chgrp ($path, $uid, $gid) {
   $d = opendir ($path) ;
   while(($file = readdir($d)) !== false) {
       	if ($file != "." && $file != "..") {
			$typepath = $path . "/" . $file ;

			echo  "$typepath--<br>";
			echo  "$uid--<br>";

			chown($typepath, $uid);
			//chgrp($typepath, $gid);

			if (filetype ($typepath) == 'dir') {
				Utility::fs_chown_chgrp ($typepath, $uid, $gid);
			}
       	}
   }// end While
}

} //End of class definition.

?>
