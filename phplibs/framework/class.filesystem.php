<?php
/**
 * Libreria di supporto per accesso al filesystem
 *
 * @package utility
 *
 */
/* ******************************************************************** */
/**
 *	PHP INCLUDE 
 */
/* ********************************************************************** */
/**
 * Definizione della classe di contesto
 * @package utility
 */
class Utility {
/* ********************************************************************** */
/**
 *	PHP SPECIFIC GLOBAL VARIABLES
 */
/* ********************************************************************** */
/**
 *	PHP SPECIFIC FUNCTIONS
 */
/* ********************************************************************** */
/**
 *	PHP FUNCTIONS
 */
/* ********************************************************************** */
/**
 * 	Elimina dir e subdir
 *	@param string $stDir Directory da rimuovere
 */
function sUtil_Remove( string $stDir ) {

	//$file = DIR_TMP . "/" . $stDir;

	$file = $stDir;

	@chmod($file,0777); 

	if (is_dir($file)) { 

		$handle = opendir($file); 

		while($filename = readdir($handle)) { 
	  		if ($filename != "." && $filename != "..") { 
	  			sUtil_Remove($file."/".$filename); 
	  		} 
	 	} 

		closedir($handle); 

	 	rmdir($file); 
	} else { 

		@unlink($file); 
	} 

}
/**
 *	Copia una directory e tutte le sue subdir
 *
 *	@param string $from_path Directory sorgente
 *	@param string $to_path Directory destinazione
 */
function sUtil_DirCopy( string $from_path,  string $to_path) { 
	@mkdir($to_path, 0777); 
	$this_path = getcwd(); 
	if (is_dir($from_path)) { 
		@chdir($from_path); 
		$handle=opendir('.'); 
		while (($file = readdir($handle))!==false) { 
			if (($file != ".") && ($file != "..")) { 
				if (is_dir($file)) { 
					sUtil_DirCopy($from_path.$file."/", $to_path.$file."/"); 
					@chdir($from_path); 
				} 

				if (is_file($file)){ 
					$f = copy($from_path.$file, $to_path.$file); 
					if( $f == false ) { return false; }
				} 
			} 
		} 

		closedir($handle); 
	} 

	return true;
}
function recurse_chown_chgrp($path2dir, $uid, $gid){
   $dir = new dir($path2dir);
   while(($file = $dir->read()) !== false) {
       if(is_dir($dir->path.$file)) {
           recurse_chown_chgrp($dir->path.$file, $uid, $gid);
       } else {
           chown($file, $uid);
           chgrp($file, $gid);
       }
   }
   $dir->close();
}
?>
