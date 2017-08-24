<?php

class UtilityPerFileSystem {
	/**
	 * La classe torna la lista di tutti i file che hanno l'estensione passata in input comprese le sottocartelle.
	 */
	public static function listaFile($dir, $estensione, $ancheSottoCartelle=true) {
		// echo "$dir <br/>";
	    $scansione = scandir($dir);
	    $i = 0;
	    $lista = array();

	    foreach ($scansione as $elemento){
	        if ($elemento != '.' && $elemento != '..') {
	 			if (is_dir($dir.'/'.$elemento) && $ancheSottoCartelle) {
	            	// echo "---" . $dir.'/'.$elemento . "<br/>";                    
	            	$lista = array_merge($lista, UtilityPerFileSystem::listaFile($dir.'/'.$elemento, $estensione)); 
	            } else  if (strlen($elemento) >= 5) {
	                if (substr($elemento, -4) == $estensione) {
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
}
?>