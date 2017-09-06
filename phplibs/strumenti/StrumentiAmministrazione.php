<?php
require_once("./phplibs/framework/Utility.php");
class StrumentiAmministrazione
{
    public static function utenteLoggato() {
        return isset($_SESSION["utenteLogin"]);
    }

    public static function vaiLoginSeNonLoggato() {
        if (StrumentiAmministrazione::utenteLoggato() == false) {
            Utility::redirect("?m=login");
            exit;
        }
    }
}
?>