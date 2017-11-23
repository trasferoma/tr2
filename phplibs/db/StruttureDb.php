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
        $id = null;
        $tipo = null;
        $descrizione = null;
        $attiva = null;

        $mysqli = &$hCtx->hDBCtx;

        $stmt  = $mysqli->prepare(
                                  "SELECT "
                                . " s.id, s.tipo, s.descrizione_$suffissoPerCampiLingua as descrizione, s.attiva "
                                . " FROM tr_strutture s "
                                . " order by s.tipo, s.descrizione_$suffissoPerCampiLingua "
        );

        $stmt->execute();

        $stmt->bind_result($id, $tipo, $descrizione, $attiva);

        while ($stmt->fetch()) {
            $riga["id"] = $id;
            $riga["tipo"] = $tipo;
            $riga["descrizione"] = $descrizione;
            $riga["attiva"] = $attiva;

            $risultati[] = $riga;
        }

        // echo "<pre>"; print_r($risultati); exit;
        /**
        $result = $stmt->get_result();

        $risultati = array();

        while ($row = $result->fetch_assoc()) {
            // echo "<pre>"; print_r($row); exit;
            $risultati[] = $row;
        }
        */
        $stmt->close();

        return $risultati;
    }

    public static function getStrutturaByID($hCtx, $id, $suffissoPerCampiLingua)
    {
        $mysqli = &$hCtx->hDBCtx;
        $contatore = null;
        $idStruttura = null;
        $tipo = null;
        $descrizione = null;
        $attiva = null;

        $stmt  = $mysqli->prepare(
            "SELECT "
            . " s.id, s.tipo, s.descrizione_$suffissoPerCampiLingua as descrizione, s.attiva "
            . " FROM tr_strutture s "
            . " where s.id = ?"
        );

        $stmt->bind_param('d', $id);

        $stmt->execute();

        $stmt->bind_result($idStruttura, $tipo, $descrizione, $attiva);

        while ($stmt->fetch()) {
            $riga["id"] = $idStruttura;
            $riga["tipo"] = $tipo;
            $riga["descrizione"] = $descrizione;
            $riga["attiva"] = $attiva;

            $risultati = $riga;
        }
/*
        $result = $stmt->get_result();

        $risultati = array();

        while ($row = $result->fetch_assoc()) {
            // echo "<pre>"; print_r($row); exit;
            $risultati = $row;
        }
*/
        $stmt->close();

        return $risultati;
    }

    public static function getStrutturaByIDCompleta($hCtx, $id)
    {
        $mysqli = &$hCtx->hDBCtx;
        $contatore = null;
        $idStruttura = null;
        $tipo = null;
        $attiva = null;
        $descrizioneIt = null;
        $descrizioneEn = null;
        $descrizioneAbjad = null;

        $stmt  = $mysqli->prepare(
            "SELECT "
            . " s.id, s.tipo, s.attiva, s.descrizione_it, s.descrizione_en, s.descrizione_abjad "
            . " FROM tr_strutture s "
            . " where s.id = ?"
        );

        $stmt->bind_param('d', $id);

        $stmt->execute();

        $stmt->bind_result($idStruttura, $tipo, $attiva, $descrizioneIt, $descrizioneEn, $descrizioneAbjad);

        while ($stmt->fetch()) {
            $riga["id"] = $idStruttura;
            $riga["tipo"] = $tipo;
            $riga["attiva"] = $attiva;
            $riga["descrizione_it"] = $descrizioneIt;
            $riga["descrizione_en"] = $descrizioneEn;
            $riga["descrizione_abjad"] = $descrizioneAbjad;

            $risultati = $riga;
        }
/*
        $result = $stmt->get_result();

        $risultati = array();

        while ($row = $result->fetch_assoc()) {
            $risultati = $row;
        }
*/
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
            die('salvaStruttura -> Errore Esecuzione Query: ' . htmlspecialchars($mysqli->error));
        }

        $stmt->close();
    }
} // end of class
?>
