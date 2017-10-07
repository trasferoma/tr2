<?php
require_once ("./phplibs/enumerazioni/TipiPasseggero.php");
class PasseggeriDb
{
    static function getNumeroPasseggeriNelloShuttle(&$hCtx, $idShuttle) {
        $mysqli = &$hCtx->hDBCtx;
        $numeroPasseggeriPresenti = null;

        $query = "SELECT count(*) as numeroPasseggeriPresenti FROM tr_passeggeri WHERE id_shuttle = ?";

        $stmt = $mysqli->prepare($query);

        if ($stmt == false) {
            die ("Errore nella query: " . $query);
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
            die('Errore Esecuzione Query: ' . htmlspecialchars($mysqli->error));
        }

        $stmt->close();
    }

    public static function getIdUltimoPasseggeroInserito(&$hCtx)
    {
        $mysqli = &$hCtx->hDBCtx;
        return $mysqli->insert_id;
    }


}