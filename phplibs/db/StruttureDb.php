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
                                . " s.id, s.tipo, s.descrizione_$suffissoPerCampiLingua as descrizione, s.attiva "
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

        $stmt->bind_result($contatore);


        $stmt->fetch();



        $stmt->close();

        return $esiste;
    }


    /**
 *	
 */
} // end of class
?>
