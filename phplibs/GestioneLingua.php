<?php
/**
 * Classe 
 *
 * @package 
 *
 */
/* ******************************************************************** */
require_once("./phplibs/framework/Utility.php");

class GestioneLingua {

	/** *************************************************** */
	public static function impostaLingua($lingua) {
		// Utility::cookieSet(CHIAVE_SESSIONE_LINGUA, "", LINGUA_DEFAULT, $lingua);
		$_SESSION[CHIAVE_SESSIONE_LINGUA] = $lingua != "" ? $lingua : LINGUA_DEFAULT;
	}

	public static function getLinguaImpostata() {
		$linguaImpostata = $_SESSION[CHIAVE_SESSIONE_LINGUA];

		if ($linguaImpostata == "") {
			$linguaImpostata = LINGUA_DEFAULT;
		}

		return $linguaImpostata;
	}

    public static function caricaDizionario(&$smarty, $sezioneDizionario = null)
    {
        $linguaImpostata = GestioneLingua::getLinguaImpostata();
		// $smarty->clear_config();

        switch ($linguaImpostata) {
			case Lingue::EN:
                $smarty->config_load('./../dizionario/en.conf', $sezioneDizionario );
				break;
            case Lingue::IT:
			default:
				$smarty->config_load('./../dizionario/it.conf', $sezioneDizionario );
                break;
		}
    }
    /** *************************************************** */
} //End of class definition.
?>
