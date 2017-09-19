<?php
/*
 *  “s”	Corrisponde a variabili associate al tipo di dato stringa.
 *  “i”	Corrisponde a variabili associate al tipo di dato numeri interi.
 *  “d”	Corrisponde a variabili associate al tipo di dato numeri double.
 *  “b”	Corrisponde a variabili associate al tipo di dato BLOB, formato binario.
 */
class MezziPiuOrariDb {
    // ---------------------------------------
    static function listaCompleta(&$hCtx, $suffissoPerCampiLingua) {
        $mysqli = &$hCtx->hDBCtx;

        $stmt  = $mysqli->prepare(
            " SELECT "
            .   " v.id, v.direzione, v.id_struttura, s.attiva as struttura_attiva, s.tipo as tipo_struttura, s.descrizione_$suffissoPerCampiLingua as struttura, v.descrizione_$suffissoPerCampiLingua as descrizione, v.attiva "
            .   " FROM tr_mezzi_piu_orari v "
            .   " inner join tr_strutture s on  v.id_struttura = s.id"
            .   " order by s.tipo, v.descrizione_$suffissoPerCampiLingua "
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

    // ---------------------------------------
    static function listaInArrivo(&$hCtx, $suffissoPerCampiLingua) {
        $mysqli = &$hCtx->hDBCtx;

        $stmt  = $mysqli->prepare(
            " SELECT "
            .   " v.id, v.direzione, v.id_struttura, s.attiva as struttura_attiva, s.tipo as tipo_struttura, s.descrizione_$suffissoPerCampiLingua as struttura, v.descrizione_$suffissoPerCampiLingua as descrizione, v.attiva "
            .   " FROM tr_mezzi_piu_orari v "
            .   " inner join tr_strutture s on  v.id_struttura = s.id"
            .   " where v.direzione = 'arrivo' "
            .   " order by s.tipo, v.descrizione_$suffissoPerCampiLingua "
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

    // ---------------------------------------
    static function listaInPartenza(&$hCtx, $suffissoPerCampiLingua) {
        $mysqli = &$hCtx->hDBCtx;

        $stmt  = $mysqli->prepare(
            " SELECT "
            .   " v.id, v.direzione, v.id_struttura, s.attiva as struttura_attiva, s.tipo as tipo_struttura, s.descrizione_$suffissoPerCampiLingua as struttura, v.descrizione_$suffissoPerCampiLingua as descrizione, v.attiva "
            .   " FROM tr_mezzi_piu_orari v "
            .   " inner join tr_strutture s on  v.id_struttura = s.id"
            .   " where v.direzione = 'partenza' "
            .   " order by s.tipo, v.descrizione_$suffissoPerCampiLingua "
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
    // ---------------------------------------
    static function listaCompletaSpecificoMezzoPiuOrario(&$hCtx, $suffissoPerCampiLingua, $idStruttura) {
        $mysqli = &$hCtx->hDBCtx;

        $stmt  = $mysqli->prepare(
            " SELECT "
            .   " v.id, v.id_struttura, v.descrizione_$suffissoPerCampiLingua as descrizione, v.attiva "
            .   " FROM tr_mezzi_piu_orari v "
            .   " where v.id_struttura = ? "
            .   " order by v.descrizione_$suffissoPerCampiLingua "
        );

        $stmt->bind_param('d', $idStruttura);

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


    public static function getMezzoPiuOrarioByID($hCtx, $id, $suffissoPerCampiLingua)
    {
        $mysqli = &$hCtx->hDBCtx;
        $contatore = null;

        $stmt  = $mysqli->prepare(
            "SELECT "
            .   " v.id, v.direzione, v.id_struttura, v.descrizione_$suffissoPerCampiLingua as descrizione, v.attiva "
            . " FROM tr_mezzi_piu_orari v "
            . " where v.id = ?"
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

    public static function getMezzoPiuOrarioByIDCompleto($hCtx, $id)
    {
        $mysqli = &$hCtx->hDBCtx;
        $contatore = null;

        $stmt  = $mysqli->prepare(
            "SELECT "
            . "  v.id, v.direzione, v.id_struttura, v.attiva, v.descrizione_it, v.descrizione_en, v.descrizione_abjad "
            . " FROM tr_mezzi_piu_orari v "
            . " where v.id = ?"
        );

        if ( false === $stmt ) {
            die('Errore Preparazione Query: ' . htmlspecialchars($mysqli->error));
        }

        $stmt->bind_param('d', $id);

        $esito = $stmt->execute();

        if ($esito == false) {
            die('Errore Esecuzione Query: ' . htmlspecialchars($mysqli->error));
        }

        $result = $stmt->get_result();

        $risultati = array();

        while ($row = $result->fetch_assoc()) {
            $risultati = $row;
        }

        $stmt->close();
        //echo "<pre>"; print_r($risultati); exit;
        return $risultati;
    }
    public static function salvaMezzoPiuOrario($hCtx, $campi)
    {
        $mysqli = &$hCtx->hDBCtx;

        $listaColonne = "id, id_struttura, direzione, attiva, descrizione_it, descrizione_en, descrizione_abjad";

        $sql = "INSERT INTO tr_mezzi_piu_orari ($listaColonne) values (?,?,?,?,?,?,?) on duplicate key UPDATE id_struttura = ?, direzione = ?, attiva = ?, descrizione_it = ?, descrizione_en = ?, descrizione_abjad = ?";

        $stmt = $mysqli->prepare($sql);

        if ( false === $stmt ) {
            die('Errore Preparazione Query: ' . htmlspecialchars($mysqli->error));
        }

        // echo "<pre>"; print_r($campi); exit;

        $stmt->bind_param('ddsdsssdsdsss',
            $campi["id"],
            $campi["struttura"],
            $campi["direzione"],
            $campi["attiva"],
            $campi["descrizione_it"],
            $campi["descrizione_en"],
            $campi["descrizione_abjad"],
            $campi["struttura"],
            $campi["direzione"],
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
