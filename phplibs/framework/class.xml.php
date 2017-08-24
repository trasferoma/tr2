<?php
/**
 *
 */
function XML_StartElementHandler( $parser, $name, $attribs ) {

	global $g_fRecords;
	global $g_stKey;
	global $g_stLabel;
	global $g_stEnabled;
	global $g_stKeyPreserv;
	global $g_stBigKey;
	$g_stKeyPreserv = "";
	//printf( "START Name: %s, Attribs : %s<br>",  $name, $attribs );
	//print_r( $attribs );

	$name = strtolower( $name );

	switch( $name ) {
	case "record" :
		$g_fRecords = true; 
		$g_stKey = "";
		$g_stLabel = "";
		$g_stEnabled = "";
		break;
	case "general" :
	case "filesystem" :
	case "libs" :
		$g_stBigKey = $name;
		break;
	case "field" :
		$g_stKey = $attribs[ "NAME" ];
		$g_stLabel = $attribs[ "LABEL" ];
		$g_stEnabled = $attribs[ "ENABLED" ];
		break;
	}


}
/**
 *
 */
function XML_EndElementHandler( $parser, $name ) {

	global $g_fRecords;
	global $g_stKeyPreserv;

	$g_stKeyPreserv = "";

	//printf( "END Name: %s <br>",  $name );

	$name = strtolower( $name );

	switch( $name ) {
	case "record" :
		$g_fRecords = false; 
		break;
	}
}
/**
 *
 */
function XML_UnpEntityHandler ( $parser ){
	return true;
}
/**
 *
 */
function XML_CDataHandler( $parser, $data ) {

	global $g_stKey;
	global $g_stLabel;
	global $g_stEnabled;
	global $g_stKeyPreserv;
	global $g_fRecords;
	global $g_hData;
	global $g_stBigKey;

	//printf( "IDX : %s Key : %s CDATA : %s<br>",  $g_nIdx, $g_stKey, $data );

	if( $g_stKey == "" ) {
		$g_stKey = $g_stKeyPreserv;
	}

	if( ( ! $g_fRecords ) || $g_stKey == "" ) { return; }

	$i = count( $g_hData [ $g_stBigKey ][ $g_stKey ] );
		
	$g_hData [ $g_stBigKey ][ $g_stKey ] [$i] ["data"]= trim( $data );
	$g_hData [ $g_stBigKey ][ $g_stKey ] [$i] ["label"]= $g_stLabel;
	$g_hData [ $g_stBigKey ][ $g_stKey ] [$i] ["enabled"]= $g_stEnabled;

	$g_stKeyPreserv = $g_stKey;

	$g_stKey = "";
}

/**
 *
 */
function XML_xml2array( $stXMLBuffer ) {

	global $g_hData;

	$parser = xml_parser_create();

	xml_set_element_handler( $parser, "XML_StartElementHandler", "XML_EndElementHandler" );
	xml_set_character_data_handler( $parser, "XML_CDataHandler" );
	xml_set_notation_decl_handler( $parser, "XML_UnpEntityHandler" );

	xml_parse( $parser, $stXMLBuffer ) ;

	return $g_hData;
}
/**
 *
 */
function XML_array2xml( $aFld ) {
	
    $stXMLBuffer = "<?xml version=\"1.0\"?>\n";
	$stXMLBuffer .= "<record>\n";

	foreach ( $aFld as $key => $aEle) {
		$stXMLBuffer .= "\t<$key>\n";
		foreach ( $aEle as $k => $v) {
			/*
			$stXMLBuffer .= sprintf( 
									"\t\t<field name=\"%s\" label=\"%s\">%s</field>\n", 
									$k, 
									htmlspecialchars( $v[ 0 ]["label"] ),
									htmlspecialchars( $v[ 0 ]["data"] )
									);
			*/

			$stXMLBuffer .= sprintf( "\t\t<field name=\"%s\" ",  $k );

			if( isset( $v[ 0 ]["label"] ) ) {
				$stXMLBuffer .= sprintf( "label=\"%s\"", htmlspecialchars( $v[ 0 ]["label"] ) );
			}

			if( isset( $v[ 0 ]["enabled"] ) ) {
				$stXMLBuffer .= sprintf( "enabled=\"%s\"", htmlspecialchars( $v[ 0 ]["enabled"] ) );
			}
			
			$stXMLBuffer .= sprintf( ">%s</field>\n", htmlspecialchars( $v[ 0 ]["data"] ) );

		}
		$stXMLBuffer .= "\t</$key>\n";
	}

	$stXMLBuffer .= "</record>\n";

	return $stXMLBuffer;
}
?>
