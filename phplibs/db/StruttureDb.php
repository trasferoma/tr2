<?php
/*
 *  “s”	Corrisponde a variabili associate al tipo di dato stringa.
 *  “i”	Corrisponde a variabili associate al tipo di dato numeri interi.
 *  “d”	Corrisponde a variabili associate al tipo di dato numeri double.
 *  “b”	Corrisponde a variabili associate al tipo di dato BLOB, formato binario.
 */
class StruttureDb {

    // ---------------------------------------
    static function listaCompleta(&$hCtx, $suffissoPerCampiLingua) {
        $mysqli = &$hCtx->hDBCtx;

        $stmt  = $mysqli->prepare(
                                  "SELECT "
                                . " s.id, s.tipo, s.descrizione_$suffissoPerCampiLingua as descrizione, s.attiva, s.tipo "
                                . " FROM tr_strutture s "
                                . " order by s.tipo, s.descrizione_$suffissoPerCampiLingua "
        );

        $stmt->execute();

        $result = $stmt->get_result();

        $risultati = array();

        while ($row = $result->fetch_assoc()) {
            // echo "<pre>"; print_r($row); exit;
            $risultati[] = $row;
        }

        $stmt->close();

        return $risultati;
    }

    public static function getStrutturaByID($hCtx, $id, $suffissoPerCampiLingua)
    {
        $mysqli = &$hCtx->hDBCtx;
        $contatore = null;

        $stmt  = $mysqli->prepare(
            "SELECT "
            . " s.id, s.tipo, s.descrizione_$suffissoPerCampiLingua as descrizione, s.attiva "
            . " FROM tr_strutture s "
            . " where s.id = ?"
        );

        $stmt->bind_param('d', $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $risultati = array();

        while ($row = $result->fetch_assoc()) {
            // echo "<pre>"; print_r($row); exit;
            $risultati = $row;
        }

        $stmt->close();

        return $risultati;
    }

    public static function getStrutturaByIDCompleta($hCtx, $id)
    {
        $mysqli = &$hCtx->hDBCtx;
        $contatore = null;

        $stmt  = $mysqli->prepare(
            "SELECT "
            . " s.id, s.tipo, s.attiva, s.descrizione_it, s.descrizione_en, s.descrizione_abjad "
            . " FROM tr_strutture s "
            . " where s.id = ?"
        );

        $stmt->bind_param('d', $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $risultati = array();

        while ($row = $result->fetch_assoc()) {
            $risultati = $row;
        }

        $stmt->close();
        // echo "<pre>"; print_r($risultati); exit;
        return $risultati;
    }

    public static function salvaStruttura($hCtx, $campi)
    {
        $mysqli = &$hCtx->hDBCtx;

        $listaColonne = "id, tipo, attiva, descrizione_it, descrizione_en, descrizione_abjad";

        $sql = "INSERT INTO tr_strutture ($listaColonne) values (?,?,?,?,?,?) on duplicate key UPDATE tipo = ?, attiva = ?, descrizione_it = ?, descrizione_en = ?, descrizione_abjad = ?";

/*
        printf("INSERT INTO tr_strutture ($listaColonne) values ('%s',%d,'%s','%s','%s') on duplicate key UPDATE id = %d,",
            $campi["id"],
            $campi["tipo"],
            $campi["attiva"],
            $campi["descrizione_it"],
            $campi["descrizione_en"],
            $campi["descrizione_abjad"],
            $campi["id"]);

        exit;
*/
        $stmt = $mysqli->prepare($sql);

        if ( false === $stmt ) {
            die('Errore Preparazione Query: ' . htmlspecialchars($mysqli->error));
        }

        // echo "<pre>"; print_r($campi); exit;

        $stmt->bind_param('dsdssssdsss',
            $campi["id"],
            $campi["tipo"],
            $campi["attiva"],
            $campi["descrizione_it"],
            $campi["descrizione_en"],
            $campi["descrizione_abjad"],
            $campi["tipo"],
            $campi["attiva"],
            $campi["descrizione_it"],
            $campi["descrizione_en"],
            $campi["descrizione_abjad"]
        );

        $esito = $stmt->execute();

        if ($esito == false) {
            die('Errore Esecuzione Query: ' . htmlspecialchars($mysqli->error));
        }

        $stmt->close();
    }
} // end of class
?>
