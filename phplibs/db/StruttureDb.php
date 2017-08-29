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
                                . " s.id, s.tipo, l.descrizione_$suffissoPerCampiLingua as descrizione"
                                . " FROM tr_strutture s "
                                . " inner join tr_struttura_2_lingue l on s.id = l.id_struttura "
                                . " order by s.tipo, l.descrizione_$suffissoPerCampiLingua "
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


/**
 *	
 */
} // end of class
?>
