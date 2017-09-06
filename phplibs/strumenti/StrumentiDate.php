<?php
/**
 * Created by PhpStorm.
 * User: f.dearcangelis
 * Date: 05/09/2017
 * Time: 15:38
 */

class StrumentiDate
{
    public static function daFormatoItalianoInFormatoDb($dataInFormatoItaliano) {
        $a = explode("/", $dataInFormatoItaliano);
        $dataTrasformata = $a[2] . "-" . $a[1] . "-" . $a[0];

        return $dataTrasformata;
    }
}