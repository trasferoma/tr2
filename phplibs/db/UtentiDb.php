<?php
/*
 *  “s”	Corrisponde a variabili associate al tipo di dato stringa.
 *  “i”	Corrisponde a variabili associate al tipo di dato numeri interi.
 *  “d”	Corrisponde a variabili associate al tipo di dato numeri double.
 *  “b”	Corrisponde a variabili associate al tipo di dato BLOB, formato binario.
 */
class UtentiDb {


    // ---------------------------------------
    static function getUtenteByUsernamePiuPassword(&$hCtx, $username, $password) {
        $mysqli = &$hCtx->hDBCtx;

        $query = "SELECT id, nome, cognome, email, uname, passwd, onoff FROM tr_utenti WHERE uname = ? AND passwd = ? and onoff = 1";

        $stmt = $mysqli->prepare($query);

        if ($stmt == false) {
            die ("Errore nella query: " . $query);
        }

        $stmt->bind_param('ss', $username, $password);

        $stmt->execute();

        $result = $stmt->get_result();

        $utente = null;

        while ($row = $result->fetch_assoc()) {
            if ($utente != null) {
                die("Esiste più di un utente con stesso user stessa password.");
            }
            $utente = $row;
        }
        $stmt->close();

        return $utente;
    }

	// ---------------------------------------
	static function esisteUtente(&$hCtx, $uname, $passwd) {
        $mysqli = &$hCtx->hDBCtx;
        $contatore = null;

        $stmt  = $mysqli->prepare("SELECT count(*) as contatore FROM tr_utenti WHERE uname = ? AND passwd = ?");

        $stmt->bind_param('ss', $uname, $passwd);

        $stmt->execute();

        $stmt->bind_result($contatore);

        $stmt->fetch();

        if ($contatore > 0) {
            $esiste = true;
        } else {
            $esiste = false;
        }

        $stmt->close();

        return $esiste;
    }

    // ---------------------------------------
    static function getLista(&$hCtx) {
        $mysqli = &$hCtx->hDBCtx;
        $uname = null;

        $stmt  = $mysqli->prepare("SELECT * FROM tr_utenti");

        $stmt->execute();

        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo "<pre>"; print_r($row); exit;
        }

        $stmt->close();
    }

    // ---------------------------------------
    static function aggiungiUtente(&$hCtx) {
        $mysqli = &$hCtx->hDBCtx;
        $uname = "Jester";

        $stmt = $mysqli->prepare("INSERT INTO tr_utenti (nome) value (?)");
        $stmt->bind_param('s', $uname);
        $stmt->execute();

        printf("%d Row inserted.\n", $stmt->affected_rows);

        exit;

        $stmt->close();
    }
/**
 *	
 */
} // end of class
?>
