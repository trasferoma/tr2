<?php
require_once("./phplibs/framework/BaseClass.php");
require_once("./phplibs/framework/Utility.php");
require_once("./phplibs/framework/UtilityPerFileSystem.php");
require_once("./phplibs/db/UtentiDb.php");
require_once("./phplibs/strumenti/StrumentiAmministrazione.php");

/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package formazione
 */
class Login extends BaseClass {
	/** *************************************************** */
	function Login(&$hCtx, &$hSessionCtx, $fNoWork=false ) {
		$this->BaseClass($hCtx, $hSessionCtx, "home");
		$this->controlloFlusso();
	}
	/** *************************************************** */
	public function controlloFlusso() {
		switch ($_REQUEST["operazione"]) {
            case "disconnetti":
                $successo = $this->disconnetti();
                if ($successo == false) {
                    Utility::redirect("?m=home");
                    exit;
                }
                Utility::redirect("?m=login");
                exit;
			case "eseguiLogin":
				$successo = $this->eseguiLogin();
				if ($successo == false) {
					Utility::redirect("?m=login");
					exit;
				}
				Utility::redirect("?m=home");
				exit;

				break;
			default:
				$this->pagina();
				break;
		}
	}
	/** *************************************************** */
	private function pagina() {
		$smarty = &$this->smarty;

		if (StrumentiAmministrazione::utenteLoggato()) {
			Utility::redirect("?m=home");
			exit;
		}

		GestioneLingua::caricaDizionario($smarty, "Login");

		$this->setPaginaDaMostrare($smarty->fetch('amministrazione/login/consoleLogin.tpl'));
	}

    /**
     * Controlla esistenza dell'utente sulla base dati
     */
    private function eseguiLogin()
    {
        $risultato = false;

        $utente = UtentiDb::getUtenteByUsernamePiuPassword($this->hCtx, $_REQUEST["username"], $_REQUEST["password"]);

        if ($utente != null) {
            $_SESSION["utenteLogin"] = serialize($utente);
            $risultato = true;
		} else {
            $risultato = false;
		}

        return $risultato;
    }

    /**
     * Controlla esistenza dell'utente sulla base dati
     */
    private function disconnetti()
    {
		unset($_SESSION["utenteLogin"]);
		$risultato = true;

        return $risultato;
    }
    /** *************************************************** */
} //End of class definition.
?>
