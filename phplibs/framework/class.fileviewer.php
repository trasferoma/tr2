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
/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package 
 */
class FileViewer {
	var $hFastTmpl;
	var $hCtx;
	var $stModKey;

	var $stUrl;
	var $stFilePath;
	var $stFileOriginalName;

/** *************************************************** */
/**
 *	Costruttore
 */
function FileViewer( &$hCtx, $stModKey, $stFilePath, $stFileOriginalName, $stUrl ) {

	$this->hFastTmpl = &$hCtx->hFastTemplate;
	$this->hCtx 	 = &$hCtx;

	$this->stModKey  = $stModKey;

	$this->stUrl	 = $stUrl;

	if( Utility::isLnkFile( $stFilePath ) ) {
		$this->stFilePath = Utility::getLnkFileReal( $stFilePath );
	}else{
		$this->stFilePath = $stFilePath;
	}

	$this->stFileOriginalName = $stFileOriginalName;

	$this->working();
}
/** *************************************************** */
/**
 *	Gestisce il lavoro del modulo 
 */
function working() {

	if( $this->stUrl != "" ) {
		Utility::redirect( $this->stUrl );
		return;
	}

	$stFileExt = Utility::getFileExt( $this->stFileOriginalName );
	if( strtolower( $stFileExt ) == "pdf" ) {
		$mime_type = "application/pdf";
	}else{
		//$mime_type = "application/octetstream";
		$mime_type = "application/save";
	}

	// BEGIN extra headers to resolve IE caching bug (JRP 9 Feb 2003)
	// [http://bugs.php.net/bug.php?id=16173]
	header("Pragma: ");
	header("Cache-Control: ");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	//header("Cache-Control: no-store, no-cache, must-revalidate");  //HTTP/1.1
	header("Cache-Control: post-check=0, pre-check=0", false);
	// END extra headers to resolve IE caching bug

	header("MIME-Version: 1.0");
	header( "Content-length:  " . filesize( $this->stFilePath) );
	header('Content-Type: ' . $mime_type);
	
	 header('Content-Transfer-Encoding: binary');

	if( Utility::isLnkFile( $this->stFileOriginalName ) ) {
		//header( "Content-disposition: inline; filename=" . Utility::lnkFileName( $this->stFileOriginalName ) );
		header( "Content-disposition: attachment; filename=" . Utility::lnkFileName( $this->stFileOriginalName ) );
	}else{
		//header( "Content-disposition: inline; filename=" . $this->stFileOriginalName );
		header( "Content-disposition: attachment; filename=" . $this->stFileOriginalName );
	}

	readfile( $this->stFilePath );
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
