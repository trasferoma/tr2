<?php
/**
 * Classe context
 *
 * @package context
 *
 */
require_once("./phplibs/framework/BaseClass.php");
require_once("./phplibs/framework/Utility.php");
/**
 *	PHP CLASS DEFINITION
 */
/**
 * Definizione della classe di contesto
 * @package formazione
 */
class Home extends BaseClass {
/** *************************************************** */
public function Home( &$hCtx, &$hSessionCtx, $stModKey, $fNoWork=false ) {
	$this->BaseClass($hCtx, $hSessionCtx, $stModKey);
	$this->controlloFlusso();
}
/** *************************************************** */
public function controlloFlusso() {
	Api::voceMenuSelezionata($this->hCtx, "home");

	switch ($_REQUEST["operazione"]) {
	default:
		$this->pagina();
		break;
	}
}
/** *************************************************** */
private function pagina() {
	$smarty = &$this->smarty;

	$this->slider();
	
	$this->setPaginaDaMostrare($smarty->fetch('home.tpl'));
}
/** *************************************************** */
private function slider() {
	$lista = $this->listaElementiSlider($this->hCtx);
	$this->smarty->assign("slider", $lista);
}

public function listaFile($dir) {
	// echo "$dir <br/>";
    $scansione = scandir($dir);
    $i = 0;
    $lista = array();

    foreach ($scansione as $elemento){
        if ($elemento != '.' && $elemento != '..') {
 			if (is_dir($dir.'/'.$elemento)) {
            	// echo "---" . $dir.'/'.$elemento . "<br/>";                    
            	$lista = array_merge($lista, $this->listaFile($dir.'/'.$elemento)); 
            } else  if (strlen($elemento) >= 5) {
                if (substr($elemento, -4) == '.png') {
                	$fileDaCaricare = array();
                	$fileDaCaricare["cartella"] =  $dir;
                	$fileDaCaricare["file"] =  $elemento;

                    array_push($lista, $fileDaCaricare);
                    //echo dirname($elemento) . $elemento . "<br/>";
                    // echo $dir.'/'.$elemento.'<br/>';
                }    
            }         
        }
    }
    return $lista;
}

/** *************************************************** */
private function getSelezioneElementiDeiProdotti() {
	// echo "<pre>"; print_r($this->listaFile("catalogo/slide")); exit;

	$listaElementiCompleta = $this->listaFile("catalogo/slide");
	$listaElementiSelezionati = Array();

	for ($i = 0; $i < 6; $i++) {

		do {
			$indice = array_rand($listaElementiCompleta, 1);
			$elemento = $listaElementiCompleta[$indice];				
		} while (in_array($elemento, $listaElementiSelezionati) == true);

		array_push($listaElementiSelezionati, $elemento);
	}
	return $listaElementiSelezionati;
}

/** *************************************************** */
private function listaElementiSlider(&$hCtx) {
	$listaRitorno = Array();
	$listaElementi = $this->getSelezioneElementiDeiProdotti();

	foreach ($listaElementi as $i => $elemento) {
		$elemento["id"] = "";
		$elemento["fotoSlider"] = $elemento["cartella"] . "/" . $elemento["file"];
		$a = explode(".", $elemento["file"]);
		$elemento["titolo"] = $a[0];
		$elemento["sottoTitolo"] = "";
		$elemento["legenda"] = $elemento["titolo"];
		array_push($listaRitorno, $elemento);
	}

	return $listaRitorno;
	
	// echo "<pre>"; print_r($listaElementiSelezionati); exit;
/*
	

	$lista = Array();

	$elemento["id"] = 1;
	$elemento["fotoSlider"] = "catalogo/tende-da-arredamento/pannelli-giapponesi/small/pannelli-giapponesi-01.jpg";
	$elemento["titolo"] = "Tende giapponesi";
	$elemento["sottoTitolo"] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, dolor sit amet.";
	$elemento["legenda"] = "Tende giapponesi";
	array_push($lista, $elemento);

	$elemento["id"] = 2;
	$elemento["fotoSlider"] = "catalogo/tende-da-arredamento/sistemi-per-lucernari/small/lucernaio.jpg";
	$elemento["titolo"] = "Lucernaio";
	$elemento["sottoTitolo"] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, dolor sit amet.";
	$elemento["legenda"] = "Lucernaio";
	array_push($lista, $elemento);

	$elemento["id"] = 3;
	$elemento["fotoSlider"] = "catalogo/tende-da-arredamento/tende-a-pacchetto/small/softbox-435.jpg";
	$elemento["titolo"] = "Siftbox";
	$elemento["sottoTitolo"] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, dolor sit amet.";
	$elemento["legenda"] = "Siftbox";
	array_push($lista, $elemento);

	$elemento["id"] = 4;
	$elemento["fotoSlider"] = "catalogo/tende-da-esterno/giardino/small/tende-nuvola.jpg";
	$elemento["titolo"] = "Tenda Nuvola";
	$elemento["sottoTitolo"] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, dolor sit amet.";
	$elemento["legenda"] = "Tenda Nuvola";
	array_push($lista, $elemento);

	$elemento["id"] = 5;
	$elemento["fotoSlider"] = "catalogo/tende-da-arredamento/tende-a-pacchetto/small/basic-441.jpg";
	$elemento["titolo"] = "Tenda a pacchetto";
	$elemento["sottoTitolo"] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, dolor sit amet.";
	$elemento["legenda"] = "Tenda a pacchetto";
	array_push($lista, $elemento);

	$elemento["id"] = 6;
	$elemento["fotoSlider"] = "catalogo/tende-da-esterno/tunnel-pagode/small/pensilina.jpg";
	$elemento["titolo"] = "Pensilina";
	$elemento["sottoTitolo"] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, dolor sit amet.";
	$elemento["legenda"] = "Pensilina";
	array_push($lista, $elemento);
*/
	return $listaElementiSelezionati;
}

/** *************************************************** */
public function destroy( ) {
	return true;
}
/** *************************************************** */
} //End of class definition.
?>
