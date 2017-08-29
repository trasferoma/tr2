<?php
/*
 *  “s”	Corrisponde a variabili associate al tipo di dato stringa.
 *  “i”	Corrisponde a variabili associate al tipo di dato numeri interi.
 *  “d”	Corrisponde a variabili associate al tipo di dato numeri double.
 *  “b”	Corrisponde a variabili associate al tipo di dato BLOB, formato binario.
 */
class VoliPiuOrariDb {

    // ---------------------------------------
    static function listaCompleta(&$hCtx, $suffissoPerCampiLingua, $idStruttura) {
        $mysqli = &$hCtx->hDBCtx;

        $stmt  = $mysqli->prepare(
                                    " SELECT "
                                .   " v.id, v.id_struttura, l.descrizione_$suffissoPerCampiLingua as descrizione "
                                .   " FROM tr_voli_piu_orari v "
                                .   " inner join tr_voli_piu_orari_2_lingue l on v.id = l.id_volo_piu_orario "
                                .   " where v.id_struttura = ? "
                                .   " order by l.descrizione_$suffissoPerCampiLingua "
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


/**
 *	
 */
} // end of class
?>
