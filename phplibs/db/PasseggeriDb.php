<?php
require_once ("./phplibs/enumerazioni/TipiPasseggero.php");
class PasseggeriDb
{
    static function getNumeroPasseggeriNelloShuttle(&$hCtx, $idShuttle) {
        $mysqli = &$hCtx->hDBCtx;
        $numeroPasseggeriPresenti = null;


        $query = "SELECT count(*) as numeroPasseggeriPresenti FROM tr_passeggeri WHERE id_shuttle = ?";

        $stmt = $mysqli->prepare($query);
        // echo "<pre>"; print_r($hCtx); exit;

        if ($stmt == false) {
            echo mysqli_connect_errno(); echo " - ";
            die ("getNumeroPasseggeriNelloShuttle: Errore nella query: " . $query);

        }

        $stmt->bind_param('d', $idShuttle);

        $stmt->execute();

        $stmt->bind_result($numeroPasseggeriPresenti);

        $stmt->fetch();

        $numeroPasseggeri = $numeroPasseggeriPresenti;

/*
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();

        $numeroPasseggeri = $row["numeroPasseggeriPresenti"];
*/
        $stmt->close();

        return $numeroPasseggeri;
    }
    public static function creaPasseggeroAdulto($hCtx, $idPrenotazione, $idShuttle)
    {
        PasseggeriDb::creaPasseggero($hCtx, $idPrenotazione, $idShuttle, TipiPasseggero::adulto);
    }

    public static function creaPasseggeroBambinoDa3A6($hCtx, $idPrenotazione, $idShuttle)
    {
        PasseggeriDb::creaPasseggero($hCtx, $idPrenotazione, $idShuttle, TipiPasseggero::bambino3_6);

    }
    public static function creaPasseggeroBambinoDa6A12($hCtx, $idPrenotazione, $idShuttle)
    {
        PasseggeriDb::creaPasseggero($hCtx, $idPrenotazione, $idShuttle, TipiPasseggero::bambino6_12);
    }

    public static function creaPasseggero($hCtx, $idPrenotazione, $idShuttle, $tipoPasseggero)
    {
        $mysqli = &$hCtx->hDBCtx;

        $listaColonne = "id_shuttle, id_prenotazione, tipo";

        $sql = "INSERT INTO tr_passeggeri ($listaColonne) values (?,?,?)";

        $stmt = $mysqli->prepare($sql);

        if ( false === $stmt ) {
            die('Errore Preparazione Query (creaPasseggero): ' . htmlspecialchars($mysqli->error));
        }

        // echo "<pre>"; print_r($campi); exit;

        $stmt->bind_param('dds',
            $idShuttle,
            $idPrenotazione,
            $tipoPasseggero
        );

        $esito = $stmt->execute();

        if ($esito == false) {
            die('creaPasseggero -> Errore Esecuzione Query: ' . htmlspecialchars($mysqli->error));
        }

        $stmt->close();
    }

    public static function getIdUltimoPasseggeroInserito(&$hCtx)
    {
        $mysqli = &$hCtx->hDBCtx;
        return $mysqli->insert_id;
    }

    static function getListaPasseggeriByIdShuttle(&$hCtx, $idSchuttle) {
        $mysqli = &$hCtx->hDBCtx;
        $idElemento = null;
        $idSchuttleAssegnato = null;
        $idPrenotazione = null;
        $tipo = null;
        $nomeContatto = null;
        $cognomeContatto = null;
        $emailContatto = null;
        $cellulareContatto = null;
        $indirizzoDestinazione = null;

        $query  = "SELECT pas.id , pas.id_shuttle, pas.id_prenotazione, pas.tipo, pre.nome_contatto, pre.cognome_contatto, pre.email_contatto, pre.cellulare_contatto, pre.indirizzo_destinazione FROM tr_passeggeri pas "
                . " inner join tr_prenotazioni pre on pre.id = pas.id_prenotazione "
                . " WHERE id_shuttle = ? "
                . " order by id_prenotazione";

        $stmt = $mysqli->prepare($query);

        if ($stmt == false) {
            die ("Errore nella query: " . $query);
        }

        $stmt->bind_param('d', $idSchuttle);

        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result($idElemento, $idSchuttleAssegnato, $idPrenotazione, $tipo, $nomeContatto, $cognomeContatto, $emailContatto, $cellulareContatto, $indirizzoDestinazione);

        $shuttle = null;

        while ($stmt->fetch()) {
            $riga["id"] = $idElemento;
            $riga["id_shuttle"] = $idSchuttleAssegnato;
            $riga["id_prenotazione"] = $idPrenotazione;
            $riga["tipo"] = $tipo;

            $riga["nome_contatto"] = $nomeContatto;
            $riga["cognome_contatto"] = $cognomeContatto;
            $riga["email_contatto"] = $emailContatto;
            $riga["cellulare_contatto"] = $cellulareContatto;
            $riga["indirizzo_destinazione"] = $indirizzoDestinazione;

            $listaPasseggeri[] = $riga;
        }

        $stmt->free_result();

        $stmt->close();

        return $listaPasseggeri;
    }
}