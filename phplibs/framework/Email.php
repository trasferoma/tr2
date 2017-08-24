<?
/***********************************************************************
 * @include:        email_util.inc
 * @descr:          Libreria di utilita' generale per la sezione 
 *					riguardante le email.
 *
 * @dependencies:   
 *
 * @notes:          
 *
 ***********************************************************************/
/***********************************************************************
 *					PHP INCLUDE 
 **********************************************************************/
//require("./php3libs/trace.inc");
//require("./php3libs/societa_util.php3");
//require("./php3libs/html_util.php3");

/***********************************************************************
 *					PHP CLASS DEFINITION
 **********************************************************************/
/*--------------------------------------------------------------------
 * @descr:	Obj context definition
 *
 *--------------------------------------------------------------------*/
class sMail_Context 
{
		//this->BuildData( );
		//this->Send( );
		//this->_GetInfo ( );
		//this->BuildMultipart();
		//this->BuildMessage();
		//this->AddAttachment();
		//this->Buffering();
		//this->GenEmailPck();

		var $parts;
		var $to;
		var $from;
		var $reply;
		var $headers;
		var $body;
		var $subject;
/*--------------------------------------------------------------------
 * @descr:	Costructor
 *--------------------------------------------------------------------*/
	function sMail_Context( ) {

		$this->stMime	= false;
		$this->parts	= array();
		$this->to		= false;
		$this->from		= false;
		$this->reply	= false;
		$this->headers	= false;
		$this->body		= false;
		$this->subject	= false;

		return; 
	}
/*-------------------------------------------------------------------*/
/*--------------------------------------------------------------------
 * @descr:	Compose mail data to send.
 *--------------------------------------------------------------------*/
	function _GetInfo ( $stFieldName, $stFieldVal ) {

		$stRet = "";	

		if ( $stFieldVal  ) {
			$stRet =  $stFieldName . $stFieldVal . "\n";
		}

		return $stRet; 
	}
/*--------------------------------------------------------------------*/



/*--------------------------------------------------------------------
 * @descr:	Compose mail data to send.
 *--------------------------------------------------------------------*/
	function BuildData( ) {

		$stMime = "";

		$stMime .= $this->_GetInfo( "From: ", $this->from );
		$stMime .= $this->_GetInfo( "", $this->headers );
		$stMime .= $this->_GetInfo( "To: ", $this->to );
		$stMime .= $this->_GetInfo( "Reply-to: ", $this->reply );
		$stMime .= $this->_GetInfo( "Subject: ", $this->subject );
		
      if (!empty($this->body)){
         $this->AddAttachment($this->body,  "",  "text/plain");
		}
      $stMime .=  "MIME-Version: 1.0\n".$this->BuildMultipart();
		return $stMime; 
	}
/*--------------------------------------------------------------------*/

/*--------------------------------------------------------------------
 * @descr:	Compose mail data to send.
 *--------------------------------------------------------------------*/
	function Send( ) {


		$stMime = $this->BuildData( );

      	$fRet = mail($this->to, $this->subject,  "", $stMime);

		return $fRet; 
	}
/*--------------------------------------------------------------------*/

/*--------------------------------------------------------------------
 * @descr:	Compile a parts array. This is the array of attachements.
 *			Also the body is attach with this method.
 *--------------------------------------------------------------------*/
	function AddAttachment($message, $name =  "", $ctype = "application/octet-stream") {

		$this->parts[] = array 	(
								"ctype" => $ctype,
								"message" => $message,
								"encode" => $encode,
								"name" => $name
								);

		return true; 
	}
/*--------------------------------------------------------------------*/

/*--------------------------------------------------------------------
 * @descr:	Read a specific input file and return a file in a output 
 *			buffer variable.
 *--------------------------------------------------------------------*/
	function Buffering( $stFileAllegato ) {

		$fd = fopen($stFileAllegato, "r");

		if( $fd == false || $fd < 0 ) { return false; }

		$Buffer = fread($fd, filesize($stFileAllegato));

		fclose($fd);

		return $Buffer; 
	}
/*--------------------------------------------------------------------*/
/*--------------------------------------------------------------------
 * @descr:	Encode a attach object in the attach array list
 *--------------------------------------------------------------------*/
	function BuildMessage($part) {

		$message = $part[ "message"];
		$message = chunk_split( base64_encode( $message ) );
		$encoding =  "base64";

		$stRet 	=	"Content-Type: "
				.	$part[ "ctype"]
				.	($part[ "name"]? "; name = \""
				.	$part[ "name"].  "\"" :  "")
				.	"\nContent-Transfer-Encoding: $encoding\n\n$message\n";

		return $stRet; 
}

/*--------------------------------------------------------------------*/

/*--------------------------------------------------------------------
 * @descr:	Inizia il processo di codifica e impacchettamento degli attachements
 *--------------------------------------------------------------------*/
	function BuildMultipart() {

		$boundary =  "b".md5( uniqid( time() ) );
		$multipart	=	"Content-Type: multipart/mixed; boundary = $boundary\n\nThis is a MIME encoded message.\n\n--$boundary";

		for($i = sizeof($this->parts)-1; $i >= 0; $i--) {

			$multipart .= "\n".$this->BuildMessage($this->parts[$i]). "--$boundary";
		}

		return $multipart.=  "--\n";
	}
}// End sMail_Context Class

/***********************************************************************
 *					PHP SPECIFIC GLOBAL VARIABLES
 **********************************************************************/

/***********************************************************************
 *					PHP SPECIFIC FUNCTIONS
 **********************************************************************/
/*--------------------------------------------------------------------
 * @descr:  Initialize library
 *--------------------------------------------------------------------*/
function sMail_Init( ) {

	$hMail = new sMail_Context();

	return $hMail; 
}

/*--------------------------------------------------------------------
 * @descr:  Transfer attachements array from a eMailContext source to an other
 *--------------------------------------------------------------------*/
function sMail_AttachCP(&$hSrc, &$hDst ) {

	// Il ciclo parte da 1 perche a 0 c'e' il body.

/*
 * Nel ciclo c'e' -1 perche' l'ultimo elemento e' il body che pero' non viene 
 * trattato come allegato.
 */

	for( $i = 0; $i < count( $hSrc->parts ) -1; $i++ ) {		
		$hDst->parts[ ] = $hSrc->parts[ $i ];
	}

	return true; 
}
/*--------------------------------------------------------------------
 * @descr:  Record in a file the email address of sender by TAF tool
 *--------------------------------------------------------------------*/
function sMail_DumpAddrSnd( $stAddr ) {
	$stFile= "taf/snd_e-address.txt";

	$fd = fopen($stFile, "a+");

	if( $fd == false || $fd < 0 ) { return false; }

	fwrite($fd, $stAddr);
	fwrite($fd, "\n");

	fclose($fd);

	return true; 
}

/*--------------------------------------------------------------------
 * @descr:  Record in a file the email address of recever by TAF tool
 *--------------------------------------------------------------------*/
function sMail_DumpAddrRcv( $stAddr ) {
	$stFile= "taf/rcv_e-address.txt";

	$fd = fopen($stFile, "a+");

	if( $fd == false || $fd < 0 ) { return false; }

	fwrite($fd, $stAddr);
	fwrite($fd, "\n");

	fclose($fd);

	return true; 
}
/*--------------------------------------------------------------------
 * @descr: Terminate library  
 *--------------------------------------------------------------------*/
function sMail_Term( &$hMail ) {

	unset( $hMail );

	return true; 
}

/***********************************************************************
 *					END
 **********************************************************************/
