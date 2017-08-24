<?
/***********************************************************************

 * @include:        

 * @descr:Page tab    

 *

 * @dependencies:   

 *

 * @notes:          

 *

 ***********************************************************************/

/***********************************************************************

 *					PHP INCLUDE 

 **********************************************************************/

/***********************************************************************

 *					PHP CLASS DEFINITION

 **********************************************************************/

/*--------------------------------------------------------------------

 * @descr:	Obj context definition

 *

 *--------------------------------------------------------------------*/
 $g_nSerial = 0;

class sPageTab
{

/*--------------------------------------------------------------------

 * @descr:	Costructor

 *--------------------------------------------------------------------*/
	function sPageTab( ){

		
		// PutPageTab()
		
		// _putChangePageLink()
		
		/* Numero degli elementi per pagina */
		
		$this->nElementsPerPage = 10;
		
	
		/* Per quante pagine invia la riga dei numeri 
			(imposta numero dispari)
			Se <0 non invia mai
		*/ 
		$this->nPagesPerLine = 9;
	
		/* Nome della funzione linkata ai numeri di pagina
		   *** importante!!  ****
		 *   Questa funzione e' prevista di avere un parametro
		     di numero intero che indica l'indice della pagina da
		 *   visualizzare
		     La pagina HTML che chiama sPageTab deve avere lo script
		 *   dichiarato in maniera seguente:
		        function _submit(page) {
		 *   	      visualizzazione a seconda della pagina 'page'...
		        }
		 */
		
		$this->stFunction = "_submit";


		/* Nome dello script della funzione descritta qui sopra senza ':' */
		
		$this->stScript = "javascript";
		$this->stNoLink = "void(null);";


		/* Classe del font quando linkato */
		
		$this->stLinkedFontClass = "nero11n";


		/* Classe del font quando non linkato( cioe' la pagina e' corrente ) */
		
		$this->stUnlinkedFontClass = "nero11n";

		/* Classe del font quando disabilitato */
		
		$this->stDisabledFontClass = "nero11n";


		/* Stringa che indica la pagina seguente( "[>>next]" ) */
		
		//$this->stNext = "[Avanti&gt;&gt;]";
		$this->stNext = "avanti&nbsp;&raquo;";


		/* Stringa che indica la pagina precedente( "[<<prev]" ) */ 
		
		//$this->stPrev = "[&lt;&lt;Indietro]";
		$this->stPrev = "&laquo;&nbsp;indietro";


		/*  Separatore tra i numeri di pagina ( '|'| di "[<<prev] 1|2|3 [>>next]"  )*/
		
//		$this->stSeparator = "|";				// '|'
		$this->stSeparator = "&nbsp;&nbsp;";	// due spazi


		/* Prefisso e suffisso 
		 * Vengono messi solo quando ci sono piu' di una pagina
		 */
		
		$this->stPrefix = "<table><tr><td>";
		$this->stSuffix = "</td></tr></table>";
	
	}


/*--------------------------------------------------------------------

 * @descr:	PutPageTab
  
 *--------------------------------------------------------------------*/
	function PutPageTab( $totalElems, $currentPage ) {

		$pages = ceil( $totalElems/ $this->nElementsPerPage );
		$stRet = "";
		if( $pages>1 ){
			
			if( $this->stPrefix!="" ){
				//echo $this->stPrefix;
				$stRet = $this->stPrefix;
			}

			// [<<prev] tag
			$stRet .= $this->_putChangePageLink( $currentPage -1, $currentPage , $pages, $this->stPrev );

			$startPage = 0;		// numero inizio pagina da dimostrare
			$endPage = $pages;	// numero fine pagina da dimostrare
								// Se $this->nPagesPerLine<=0 dimostra tutte le pagine
								
			if( $this->nPagesPerLine>0 ){
			
				// Pagina corrente sta al entro
				$startPage = $currentPage - floor( $this->nPagesPerLine/2 );
				$endPage = $currentPage + floor( $this->nPagesPerLine/2 ) + 1;
			
				if( $startPage<0 ){
					$startPage = 0;
					$endPage = $startPage + $this->nPagesPerLine;
					
					if( $endPage>$pages ){
						$endPage = $pages;
					}
				}

				if( $endPage>$pages ){
					$endPage = $pages;
					$startPage = $endPage - $this->nPagesPerLine;
					if( $startPage<0 ){
						$startPage = 0;
					}
				}
			}
		
			// Numero di pagine ...
			for( $i=$startPage; $i<$endPage; $i++ ){
				
				//echo ($i==0) ? "&nbsp;" : $this->stSeparator;
				$stRet .= ($i==0) ? "&nbsp;" : $this->stSeparator;

				$stRet .= $this->_putChangePageLink( $i, $currentPage , $pages, $i+1 );
			}
			$stRet .= "&nbsp;&nbsp;";

			// [avandi>>] tag
			$stRet .= $this->_putChangePageLink( $currentPage +1, $currentPage , $pages, $this->stNext );
			
			if( $this->stSuffix!="" ){
				//echo $this->stSuffix;
				$stRet .= $this->stSuffix;
			}
		}
		return $stRet;


	}

	function _putChangePageLink( $linkPage, $curPage, $totalPage, $stLinkPage ){
		
		$stURL = "";
		if( $linkPage>=0 && $linkPage<$totalPage ){
			if( $linkPage!=$curPage ){

				$href = $this->stScript . ":" . $this->stNoLink ;

 				global $g_nSerial;
 				$g_nSerial++;

				$stLinkName = "link_$g_nSerial";

				$event = "onmouseup=\"" . $this->stFunction . "( '" . $stLinkName . "', " . $linkPage . ")\"";

				$stURL = "<a href=\"$href\" class=\"$this->stLinkedFontClass\" name=\"$stLinkName\" id=\"$stLinkName\" $event>$stLinkPage</a>";
			}else{
				$stURL = "<font class=\"$this->stUnlinkedFontClass\"><B><u>$stLinkPage</u></B></font>";
			} 
		} else{
				$stURL = "<font class=\"$this->stDisabledFontClass\" >$stLinkPage</font>";
		}
		return $stURL;
	}
}
?>
