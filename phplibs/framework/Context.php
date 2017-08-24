<?php
/**
 * Classe context
 *
 * @package context
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
class Context {
	var $hDBCtx;
/** *************************************************** */
/**
 *	Costruttore
 *	@param boolean $fDB se true prova a prendere il DB secondo le specifiche del config.php
 *	@param boolean $fFastT se true istanzia la classe dei fasttemplates secondo le specifiche del config.php
 *	@param boolean $fDict se true attiva il dizionario
 *	@param string  $stLingua Lingua sulla base della quale caricare il dizionario
 *	@param string  $idLingua Lingua sulla base della quale fare le query
 */
function Context($fDB = false, $fFastT = false) {

	$this->hDBCtx = null;
	$this->smarty = null;

	if ($fDB) {
		$this->hDBCtx = $this->getConnessioneAlDb(DB_HOST, DB_USER, DB_PWD, DB_NAME);
	}
	if ($fFastT) {
		$this->smarty = new Smarty;
	}
}
/** *************************************************** */
	public function getConnessioneAlDb($host, $user, $pwd, $nomeDb) {
		$mysqli = new mysqli($host, $user, $pwd, $nomeDb);
		if ($mysqli->connect_errno) {
			printf("Errore di connessione %s\n", $mysqli->connect_error);
			exit();
		}

		return $mysqli;
	}
/** *************************************************** */
/**
 *	Ritorna lo stato del DB connesso oppure no
 *
 *	@return boolean
 */
	public function isDBOnLine() {
		return $this->hDBCtx;
	}
/** *************************************************** */
/**
 *	Ritorna lo stato del FastT 
 *
 *	@return boolean
 */
	public function isFastTOnLine() {
		return $this->smarty;
	}
/** *************************************************** */
/**
 *	Chiude la libreria
 *		- Chiude la connessione con il DB
 *		- Libera la memoria allocata per il context
 *
 *	@param Context $hCtx Il contesto
 */
function destroy( ) {
	$this->hDBCtx->close();
	return true;
}
/** *************************************************** */
} //End of class definition.
?>
