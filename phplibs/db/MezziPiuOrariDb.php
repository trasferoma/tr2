<?php
/*
 *  “s”	Corrisponde a variabili associate al tipo di dato stringa.
 *  “i”	Corrisponde a variabili associate al tipo di dato numeri interi.
 *  “d”	Corrisponde a variabili associate al tipo di dato numeri double.
 *  “b”	Corrisponde a variabili associate al tipo di dato BLOB, formato binario.
 */
class MezziPiuOrariDb {

    // ---------------------------------------
    static function listaCompleta(&$hCtx, $suffissoPerCampiLingua, $idStruttura) {
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
            .   " v.id, v.id_struttura, v.descrizione_$suffissoPerCampiLingua as descrizione, v.attiva "
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


    /**
 *	
 */
} // end of class
?>
