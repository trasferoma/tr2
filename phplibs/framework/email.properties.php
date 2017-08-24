<?php
global $EmProp_aEmail;

class EmailBlock {
	function EmailBlock(){
		$this->stTitolo 	  = "";
		$this->stDescrizione  = "";
		$this->stInformazione = "";
		$this->stAvviso 	  = "";

		$this->aFiles 	  	  = array();
	}
}
// -------------------------------------------------
//	Blocco email
// -------------------------------------------------

$hEmail = new EmailBlock();

$hEmail->stTitolo 		= "Offerta tre per Business";
$hEmail->stSpiegazione 	= "Offerta Commerciale TRE for Business";
$hEmail->stMessaggio  = "";
$hEmail->stMessaggioHTML  = "";
$hEmail->aFiles[] 		= "email/Offerta3xBusiness/presentazione 3 for business.pdf";

$EmProp_aEmail [] = $hEmail;

// -------------------------------------------------
// -------------------------------------------------
//	Blocco email
// -------------------------------------------------

$hEmail = new EmailBlock();

$hEmail->stTitolo 		= "Pda Aziendale";
$hEmail->stSpiegazione 	= "Proposta di Abbonamento per Aziende con relative condizioni contrattuali";
$hEmail->stMessaggio  = "
Aderire a questa promozione è estremamente semplice. Basterà seguire
attentamente i seguenti punti:

Stampare e compilare il 'Modulo da Compilare - Proposta di abbonamento H3G'

*        Pagina 1 - Contiene tutte le vostre notizie aziendali.
Compilarla con tutti i dati richiesti.

Per la scelta della formula di pagamento: 

*        Le voci 'ABI', 'CAB' e 'C/C' sono da compilare sempre per ogni tipo di pagamento
*        In caso di pagamento con 'addebito diretto su conto corrente(RID)' compilare anche il modulo RID allegato

*        Pagina 2 - Contiene le notizie riguardanti le modalità di acquisto dei videofonini.
Pagina molto delicata da compilare. Chiedete la nostra Consulenza per la compilazione.
        
*        Pagina 3 - L’indirizzo di spedizione deve necessariamente corrispondere a quello della sede legale o operativa presente sulla Vostra Camerale. Indicate eventualmente gli orari di preferenza.

Firma e Timbro a fondo pagina ove indicato

Documentazione Necessaria
*        Fotocopia del documento d'identità dell'amministratore (fronte e retro)
*        Fotocopia visura camerale (non più vecchia di 3 mesi)

IMPORTANTISSIMO

Potrete anticiparci il tutto (modulo di adesione + Documentazione
necessaria + Modulo Rid)
al numero di fax 06 39 67 40 66 

Ma è INDISPENSABILE inviare il tutto in ORIGINALE via posta prioritaria
entro 6 giorni dalla data di invio del fax a:

TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma

La mancata ricezione degli originali, potrebbe causare sospensione del servizio.

Number Portability
Non appena ricevuti i videofonini da TRE ci dovrete contattare al fine
di attivare la Number Portability.

I Videofonini che sottoscriverete, Vi verranno inviati direttamente
all'indirizzo che voi richiederete con consegna gratuita e senza nessun
costo aggiuntivo.

";
$hEmail->stMessaggioHTML  = "
Aderire a questa promozione è estremamente semplice. Basterà seguire attentamente i seguenti punti:<br><br>\n\n

<p><font color=  \"#333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\"> Stampare e compilare il \"Modulo da Compilare - Proposta di abbonamento H3G\"</font><p></p>
<ul><li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=  \"FF0000\">Pagina 1 </font></strong><font color=  \"0000FF\">- Contiene tutte le vostre notizie aziendali. Compilarla con tutti i dati richiesti.</font>

    <br>Per la scelta della formula di pagamento:
      </font>
  <ul>
      <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Le voci \"ABI\", \"CAB\" e \"C/C\" sono da compilare sempre per ogni tipo di pagamento</font></li>
            <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">In caso di pagamento con \"addebito diretto su conto corrente(RID)\" compilare anche il <strong>modulo RID allegato

            </strong></font></li>
    </ul>
    </li>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=  \"FF0000\">Pagina 2</font></strong><font color=  \"0000FF\"> - Contiene le notizie riguardanti le modalità di acquisto dei videofonini.</font><br>
	Pagina molto delicata da compilare. Chiedete la nostra Consulenza per la compilazione.

  </font></li>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=  \"FF0000\">Pagina 3</font></strong> - L’indirizzo di spedizione deve necessariamente corrispondere a quello della sede legale o operativa presente sulla Vostra Camerale. Indicate eventualmente gli orari di preferenza.</li>

   <li><strong>Firma e Timbro a fondo pagina ove indicato</strong></font></li>
</ul>
<p><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\"> 

Documentazione Necessaria</font><p></p>
<ul>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=  \"0000FF\">Fotocopia del documento d'identità </font></strong><font color=  \"0000FF\">dell'amministratore (fronte e retro)</font></font></li>
  <li><strong><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Fotocopia visura camerale </font></strong><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">(non più vecchia di 3 mesi)</font></li>
</ul>
<p align=  \"center\"><font color=  \"FF0000\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">IMPORTANTISSIMO</font><p></p>
<p align=  \"left\"><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">  

  </font><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong>Potrete anticiparci il tutto </strong> (modulo di adesione + Documentazione necessaria + Modulo Rid)

  <strong>al numero <font color=#ff0000>di fax 06 39 67 40 66 </font><br><br>

  Ma è <font color=  \"FF0000\">INDISPENSABILE</font> inviare il tutto in ORIGINALE via posta prioritaria entro 6 giorni dalla data di invio del fax a:<br><br>

  

</strong></font><strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma</font></strong><p></p>

<strong>La mancata ricezione degli originali, potrebbe causare sospensione del servizio.</strong><br><br>


<p align=  \"left\"><font color=  \"0000FF\"><strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Number Portability<br>

</font></strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Non appena ricevuti i videofonini da TRE ci dovrete contattare al fine di attivare la <strong>Number Portability </strong>.</font></font><p></p>
<p align=  \"left\"><font color=  \"000033\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">I Videofonini che sottoscriverete, Vi verranno inviati direttamente all'indirizzo che voi richiederete con <strong>consegna gratuita</strong> e senza nessun costo aggiuntivo.</font><p></p>

";
$hEmail->aFiles[] 		= "email/PdaAaziendale/Condizioni Contrattuali - Proposta di abbonamento H3G.pdf";
$hEmail->aFiles[] 		= "email/PdaAaziendale/Modulo da Compilare - Proposta di abbonamento H3G.pdf";

$EmProp_aEmail [] = $hEmail;

// -------------------------------------------------
// -------------------------------------------------
//	Blocco email
// -------------------------------------------------

$hEmail = new EmailBlock();

$hEmail->stTitolo 		= "Pda Aziendale Ricaricabile";
$hEmail->stSpiegazione 	= "Moduli Ricaricabili b.free con relative condizioni";
$hEmail->stMessaggio  = "
Documentazione Necessaria
*        Fotocopia del documento d'identità dell'amministratore (fronte e retro)
*        Fotocopia visura camerale (non più vecchia di 3 mesi)

IMPORTANTISSIMO

Potrete anticiparci il tutto (modulo di adesione + Documentazione
necessaria + Modulo Rid)
al numero di fax 06 39 67 40 66 

Ma è INDISPENSABILE inviare il tutto in ORIGINALE via posta prioritaria
entro 6 giorni dalla data di invio del fax a:

TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma

La mancata ricezione degli originali, potrebbe causare sospensione del servizio.

";
$hEmail->stMessaggioHTML  = "
<p><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\"> 

Documentazione Necessaria</font><p></p>
<ul>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=  \"0000FF\">Fotocopia del documento d'identità </font></strong><font color=  \"0000FF\">dell'amministratore (fronte e retro)</font></font></li>
  <li><strong><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Fotocopia visura camerale </font></strong><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">(non più vecchia di 3 mesi)</font></li>
</ul>
<p align=  \"center\"><font color=  \"FF0000\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">IMPORTANTISSIMO</font><p></p>
<p align=  \"left\"><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">  

  </font><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong>Potrete anticiparci il tutto </strong> (modulo di adesione + Documentazione necessaria + Modulo Rid)

  <strong>al numero <font color=#ff0000>di fax 06 39 67 40 66 </font><br><br>

  Ma è <font color=  \"FF0000\">INDISPENSABILE</font> inviare il tutto in ORIGINALE via posta prioritaria entro 6 giorni dalla data di invio del fax a:<br><br>

  

</strong></font><strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma</font></strong><p></p>

<strong>La mancata ricezione degli originali, potrebbe causare sospensione del servizio.</strong><br><br>

</font></strong><p></p>
";
$hEmail->aFiles[] 		= "email/PdaRicaricabiliAziende/Condizioni Contrattuali - RICARICABILE b[1].free.pdf";
$hEmail->aFiles[] 		= "email/PdaRicaricabiliAziende/Modulo da Compilare - RICARICABILE b[1].free.pdf";
$hEmail->aFiles[] 		= "email/PdaRicaricabiliAziende/Modulo OMNIA da compilare per b[1].free.pdf";

$EmProp_aEmail [] = $hEmail;

// -------------------------------------------------
// -------------------------------------------------
//	Blocco email
// -------------------------------------------------

$hEmail = new EmailBlock();

$hEmail->stTitolo 		= "Pda Ditte Individuali";
$hEmail->stSpiegazione 	= "Proposta di Abbonamento per Liberi Professionisti e Ditte Individuali con relative condizioni contrattuali";
$hEmail->stMessaggio  = "
Aderire a questa promozione è estremamente semplice. Basterà seguire
attentamente i seguenti punti:

Stampare e compilare il 'Modulo da Compilare - Proposta di abbonamento
H3G Ditte Individuali'

*	Pagina 1 - Contiene tutte le vostre notizie aziendali.
	Compilarla con tutti i dati richiesti.
	Per la scelta della formula di pagamento: 

*	Le voci 'ABI', 'CAB' e 'C/C' sono da compilare sempre per ogni tipo di pagamento
*	In caso di pagamento con 'addebito diretto su conto corrente(RID)' compilare anche il modulo RID allegato
*	Pagina 2 - Contiene le notizie riguardanti le modalità di acquisto dei videofonini.

	Pagina molto delicata da compilare. Chiedete la nostra Consulenza per la compilazione.
        
*	Pagina 3 - L’indirizzo di spedizione deve necessariamente corrispondere a quello della sede legale o operativa presente sulla Vostra Camerale. Indicate eventualmente gli orari di preferenza

*	Firma e Timbro a fondo pagina ove indicato

Documentazione Necessaria

*	Fotocopia del documento d'identità dell'amministratore (fronte e retro)
*	Fotocopia certificato di attribuzione partita iva

IMPORTANTISSIMO


Potrete anticiparci il tutto (modulo di adesione + Documentazione
necessaria + Modulo Rid)
al numero di fax 06 39 67 40 66 

Ma è INDISPENSABILE inviare il tutto in ORIGINALE via posta prioritaria
entro 6 giorni dalla data di invio del fax a:

TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma

La mancata ricezione degli originali, potrebbe causare sospensione del servizio

Number Portability
Non appena ricevuti i videofonini da TRE ci dovrete contattare al fine
di attivare la Number Portability.

I Videofonini che sottoscriverete, Vi verranno inviati direttamente
all'indirizzo che voi richiederete con consegna gratuita e senza nessun
costo aggiuntivo.
";	
$hEmail->stMessaggioHTML  = "
<p><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Aderire a questa promozione è estremamente semplice. Basterà seguire attentamente i seguenti punti:</font><p></p>
<p><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\"> Stampare e compilare il \"Modulo da Compilare - Proposta di abbonamento H3G Ditte Individuali\"</font><p></p>
<ul>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=  \"FF0000\">Pagina 1 </font></strong><font color=  \"0000FF\">- Contiene tutte le vostre notizie aziendali. Compilarla con tutti i dati richiesti.</font>

        <br>Per la scelta della formula di pagamento: </font>
      <ul>
        <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Le voci \"ABI\", \"CAB\" e \"C/C\" sono da compilare sempre per ogni tipo di pagamento</font></li>
        <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">In caso di pagamento con \"addebito diretto su conto corrente(RID)\" compilare anche il <strong>modulo RID allegato

        </strong></font></li>
      </ul>
  </li>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=  \"FF0000\">Pagina 2</font></strong><font color=  \"0000FF\"> - Contiene le notizie riguardanti le modalità di acquisto dei videofonini.</font><br>

Pagina molto delicata da compilare. Chiedete la nostra Consulenza per la compilazione.

  </font></li>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=  \"FF0000\">Pagina 3</font></strong> - L’indirizzo di spedizione deve necessariamente corrispondere a quello della sede legale o operativa presente sulla Vostra Camerale. Indicate eventualmente gli orari di preferenza.</li>

	<li><strong>Firma e Timbro a fondo pagina ove indicato</strong></font></li>
</ul>
<p><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\"> 

  Documentazione Necessaria</font><p></p>
<ul>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=  \"0000FF\">Fotocopia del documento d'identità </font></strong><font color=  \"0000FF\">dell'amministratore (fronte e retro)</font></font></li>
  <li><strong><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">F</font><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">otocopia certificato di attribuzione partita iva<BR>
  </font></strong></li>
</ul>
<p align=  \"center\"><font color=  \"FF0000\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">IMPORTANTISSIMO</font><p></p>
<p align=  \"left\"><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\"> 

  </font><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong>Potrete anticiparci il tutto </strong> (modulo di adesione + Documentazione necessaria + Modulo Rid)

  <strong>al numero di <font color=#ff0000>fax 06 39 67 40 66 </font><br><br>

  Ma è <font color=  \"FF0000\">INDISPENSABILE</font> inviare il tutto in ORIGINALE via posta prioritaria entro 6 giorni dalla data di invio del fax a:<br><br>


</strong></font><strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma</font></strong><p></p>

<strong>La mancata ricezione degli originali, potrebbe causare sospensione del servizio.</strong><br><br>

<p align=  \"left\"><font color=  \"0000FF\"><strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Number Portability<br>

</font></strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Non appena ricevuti i videofonini da TRE ci dovrete contattare al fine di attivare la <strong>Number Portability </strong>.</font></font><p></p>
<p align=  \"left\"><font color=  \"000033\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">I Videofonini che sottoscriverete, Vi verranno inviati direttamente all'indirizzo che voi richiederete con <strong>consegna gratuita</strong> e senza nessun costo aggiuntivo.</font><p></p>

";

$hEmail->aFiles[] 		= "email/PdaDitteIndividuali/Condizioni Contrattuali - Proposta di abbonamento H3G Ditte Individuali.pdf";
$hEmail->aFiles[] 		= "email/PdaDitteIndividuali/Modulo da Compilare - Proposta di abbonamento H3G Ditte Individuali.pdf";

$EmProp_aEmail [] = $hEmail;

// -------------------------------------------------
// -------------------------------------------------
//	Blocco email
// -------------------------------------------------

$hEmail = new EmailBlock();

$hEmail->stTitolo 		= "Pda Ditte Individuali Ricaricabile";
$hEmail->stSpiegazione 	= "Moduli Ricaricabili b.free con relative condizioni contrattuali";
$hEmail->stMessaggio  = "
Documentazione Necessaria
*        Fotocopia del documento d'identità dell'amministratore (fronte e retro)
*        Fotocopia visura camerale (non più vecchia di 3 mesi)

IMPORTANTISSIMO

Potrete anticiparci il tutto (modulo di adesione + Documentazione
necessaria + Modulo Rid)
al numero di fax 06 39 67 40 66 

Ma è INDISPENSABILE inviare il tutto in ORIGINALE via posta prioritaria
entro 6 giorni dalla data di invio del fax a:

TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma

La mancata ricezione degli originali, potrebbe causare sospensione del servizio.

";
$hEmail->stMessaggioHTML  = "
<p><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\"> 

Documentazione Necessaria</font><p></p>
<ul>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=  \"0000FF\">Fotocopia del documento d'identità </font></strong><font color=  \"0000FF\">dell'amministratore (fronte e retro)</font></font></li>
  <li><strong><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Fotocopia visura camerale </font></strong><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">(non più vecchia di 3 mesi)</font></li>
</ul>
<p align=  \"center\"><font color=  \"FF0000\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">IMPORTANTISSIMO</font><p></p>
<p align=  \"left\"><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">  

  </font><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong>Potrete anticiparci il tutto </strong> (modulo di adesione + Documentazione necessaria + Modulo Rid)

  <strong>al numero <font color=#ff0000>di fax 06 39 67 40 66 </font><br><br>

  Ma è <font color=  \"FF0000\">INDISPENSABILE</font> inviare il tutto in ORIGINALE via posta prioritaria entro 6 giorni dalla data di invio del fax a:<br><br>

  

</strong></font><strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma</font></strong><p></p>

<strong>La mancata ricezione degli originali, potrebbe causare sospensione del servizio.</strong><br><br>

</font></strong><p></p>

";

$hEmail->aFiles[] 		= "email/PdaRicaricabiliDitteIndividuali/Condizioni Contrattuali - RICARICABILE b[1].free - ditte individuali.pdf";
$hEmail->aFiles[] 		= "email/PdaRicaricabiliDitteIndividuali/Modulo da Compilare - RICARICABILE b[1].free - ditte individuali.pdf";
$hEmail->aFiles[] 		= "email/PdaRicaricabiliDitteIndividuali/Modulo OMNIA da compilare per b[1].free ditte individuali.pdf";

$EmProp_aEmail [] = $hEmail;

// -------------------------------------------------
// -------------------------------------------------
//	Blocco email
// -------------------------------------------------

$hEmail = new EmailBlock();

$hEmail->stTitolo 		= "RID";
$hEmail->stSpiegazione 	= "Modulo RID per addebito diretto su conto corrente";
$hEmail->stMessaggio  	= "";
$hEmail->stMessaggioHTML  = "";

$hEmail->aFiles[] 		= "email/RID/RID.pdf";

$EmProp_aEmail [] = $hEmail;

// -------------------------------------------------
// -------------------------------------------------
//	Blocco email
// -------------------------------------------------

$hEmail = new EmailBlock();

$hEmail->stTitolo 		= "MNP Aziendale";
$hEmail->stSpiegazione 	= $hEmail->stTitolo;
$hEmail->stMessaggio  	= "
Le procedure da seguire sono le seguenti:

1 - Stampare e compilare il modulo allegato con tutti i dati richiesti, prestando molta attenzione alla compilazione dei dati numerici, ovvero inserire correttamente il Numero di telefono dell'operatore di provenienza con il relativo seriale ed il Numero fornito provvisoriamente dalla TRE con relativo seriale. 

IMPORTANTE

Specificare l'operatore di provenienza (Tim, Wind, Vodafone) ed il tipo di contratto con l'altro operatore ovvero se si possiede una ricaricabile od un abbonamento. Qualora le sim su cui effettuare il Number Portabilità non fossero intestate all'azienda inviare autocertificazione dell'intestatario della sim che dichiara di cedere il numero alla vostra azienda unitamente al documento di identità del proprietario della Usim da cedere. 

2 - Inviare anche la fotocopia della/e SIM del vostro attuale gestore insieme alla fotocopia della Usim Tre in modo tale da poter avere una maggiore trasparenza sui dati forniti 

3 - Inviare il modulo MNP e le fotocopie delle SIM via fax allo 06 39.67.40.66 

4 - Nel caso in cui non lo abbiate gia fatto, Vi ricordiamo di inviare gli originali del modulo di sottoscrizione a: TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma

Teniamo a precisare che i tempi di attivazione del Number Portability dipendono esclusivamente dal gestore di provenienza che deve rilasciare i numeri. Eventuali ritardi non sono quindi in alcun modo imputabili alla H3G S.p.A.


";
$hEmail->stMessaggioHTML  = "
<font color=  \"000033\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">A seguito del contratto da Voi stipulato con TRE Vi inviamo in allegato il modulo di Mobile Number Portability </font><p></p>
<p><font color=  \"000033\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Le procedure da seguire sono le seguenti:</font><p></p>
<ol>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"> <font color=  \"000033\">Stampare e compilare il modulo allegato con tutti i dati richiesti, prestando molta attenzione alla compilazione dei dati numerici, ovvero inserire correttamente il Numero di telefono dell'operatore di provenienza con il relativo seriale ed il Numero fornito provvisoriamente dalla TRE con relativo seriale.</font>

      </font></li>
<blockquote>
  <p align=  \"center\"><font color=  \"FF0000\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong>IMPORTANTE</strong></font><p></p>
  <p><font color=  \"003366\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Specificare l'operatore di provenienza (Tim, Wind, Vodafone) ed il tipo di contratto con l'altro operatore ovvero se si possiede una ricaricabile od un abbonamento.

    </font><font color=  \"003366\"><strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Qualora le sim su cui effettuare il Number Portabilità non fossero intestate all’azienda inviare autocertificazione dell’intestatario della sim che dichiara di cedere il numero alla vostra azienda unitamente al documento di identità del proprietario della Usim da cedere.

    </font></strong></font><p></p>
</blockquote>
  <li><font color=  \"003366\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Inviare anche la fotocopia della/e SIM del vostro attuale gestore insieme alla fotocopia della Usim Tre in modo tale da poter avere una maggiore trasparenza sui dati forniti

  </font></li>
  <li><font color=  \"003366\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Inviare il modulo MNP e le fotocopie delle SIM via fax allo <strong><font size=  \"4\">06 39.67.40.66
          

          </font></strong></font></li>
  <li>
    <font color=  \"003366\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Nel caso in cui non lo abbiate gia fatto, Vi ricordiamo di inviare gli originali del modulo di sottoscrizione a:</font>

      

        <strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma</font></strong></div>
  </li>
</ol>
<p><font color=  \"000066\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Teniamo a precisare che i tempi di attivazione del Number Portability dipendono esclusivamente dal gestore di provenienza che deve rilasciare i numeri. 

Eventuali ritardi non sono quindi in alcun modo imputabili alla H3G S.p.A.</font><p></p>
";
$hEmail->aFiles[] 		= "email/mnp/MNP-AZIENDE.pdf";

$EmProp_aEmail [] = $hEmail;

// -------------------------------------------------
// -------------------------------------------------
//	Blocco email
// -------------------------------------------------

$hEmail = new EmailBlock();

$hEmail->stTitolo 		= "MNP Ditte individuali";
$hEmail->stSpiegazione 	= $hEmail->stTitolo;
$hEmail->stMessaggio  	= "
Le procedure da seguire sono le seguenti:

1 - Stampare e compilare il modulo allegato con tutti i dati richiesti, prestando molta attenzione alla compilazione dei dati numerici, ovvero inserire correttamente il Numero di telefono dell'operatore di provenienza con il relativo seriale ed il Numero fornito provvisoriamente dalla TRE con relativo seriale. 

IMPORTANTE

Specificare l'operatore di provenienza (Tim, Wind, Vodafone) ed il tipo di contratto con l'altro operatore ovvero se si possiede una ricaricabile od un abbonamento. Qualora le sim su cui effettuare il Number Portabilità non fossero intestate all'azienda inviare autocertificazione dell'intestatario della sim che dichiara di cedere il numero alla vostra azienda unitamente al documento di identità del proprietario della Usim da cedere. 

2 - Inviare anche la fotocopia della/e SIM del vostro attuale gestore insieme alla fotocopia della Usim Tre in modo tale da poter avere una maggiore trasparenza sui dati forniti 

3 - Inviare il modulo MNP e le fotocopie delle SIM via fax allo 06 39.67.40.66 

4 - Nel caso in cui non lo abbiate gia fatto, Vi ricordiamo di inviare gli originali del modulo di sottoscrizione a: TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma

Teniamo a precisare che i tempi di attivazione del Number Portability dipendono esclusivamente dal gestore di provenienza che deve rilasciare i numeri. Eventuali ritardi non sono quindi in alcun modo imputabili alla H3G S.p.A.
";

$hEmail->stMessaggioHTML  = "
<font color=  \"000033\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">A seguito del contratto da Voi stipulato con TRE Vi inviamo in allegato il modulo di Mobile Number Portability </font><p></p>
<p><font color=  \"000033\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Le procedure da seguire sono le seguenti:</font><p></p>
<ol>
  <li><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"> <font color=  \"000033\">Stampare e compilare il modulo allegato con tutti i dati richiesti, prestando molta attenzione alla compilazione dei dati numerici, ovvero inserire correttamente il Numero di telefono dell'operatore di provenienza con il relativo seriale ed il Numero fornito provvisoriamente dalla TRE con relativo seriale.</font>

      </font></li>
<blockquote>
  <p align=  \"center\"><font color=  \"FF0000\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong>IMPORTANTE</strong></font><p></p>
  <p><font color=  \"003366\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Specificare l'operatore di provenienza (Tim, Wind, Vodafone) ed il tipo di contratto con l'altro operatore ovvero se si possiede una ricaricabile od un abbonamento.

    </font><font color=  \"003366\"><strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Qualora le sim su cui effettuare il Number Portabilità non fossero intestate all’azienda inviare autocertificazione dell’intestatario della sim che dichiara di cedere il numero alla vostra azienda unitamente al documento di identità del proprietario della Usim da cedere.

    </font></strong></font><p></p>
</blockquote>
  <li><font color=  \"003366\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Inviare anche la fotocopia della/e SIM del vostro attuale gestore insieme alla fotocopia della Usim Tre in modo tale da poter avere una maggiore trasparenza sui dati forniti

  </font></li>
  <li><font color=  \"003366\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Inviare il modulo MNP e le fotocopie delle SIM via fax allo <strong><font size=  \"4\">06 39.67.40.66
          

          </font></strong></font></li>
  <li>
    <font color=  \"003366\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Nel caso in cui non lo abbiate gia fatto, Vi ricordiamo di inviare gli originali del modulo di sottoscrizione a:</font>

      

        <strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma</font></strong></div>
  </li>
</ol>
<p><font color=  \"000066\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Teniamo a precisare che i tempi di attivazione del Number Portability dipendono esclusivamente dal gestore di provenienza che deve rilasciare i numeri. 

Eventuali ritardi non sono quindi in alcun modo imputabili alla H3G S.p.A.</font><p></p>
";

$hEmail->aFiles[] 		= "email/mnp/MNP-Ditte Individuali.pdf";

$EmProp_aEmail [] = $hEmail;

// -------------------------------------------------
// -------------------------------------------------
//	Blocco email
// -------------------------------------------------

$hEmail = new EmailBlock();

$hEmail->stTitolo 		= "Modulistica UNILIBERA";
$hEmail->stSpiegazione 	= "Offerta commerciale e proposta di Abbonamento con relative condizioni contrattuali";
$hEmail->stMessaggio  	= "Per Aderire a questa promozione


* Stampare   il Modulo da Compilare - Proposta di abbonamento  TELEUNIT

* Chiamarci allo 06 6380098 per assistenza in fase di compilazione

* Firma e Timbro ovunque dove indicato

* Allegare sempre la Vostra Ultima Bolletta Telecom

IMPORTANTISSIMO

Potrete anticiparci il tutto al numero di fax 06 39 67 40 66 

Ma è INDISPENSABILE inviare il tutto in ORIGINALE via posta prioritaria entro 6 giorni dalla data di invio del fax a:
  
TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma

La mancata ricezione degli originali, potrebbe causare sospensione del servizio.
";

$hEmail->stMessaggioHTML  = "<font color=  \"000033\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Per Aderire a questa promozione<br><br>
* Stampare   il Modulo da Compilare - Proposta di abbonamento  TELEUNIT<br><br>
* Chiamarci allo 06 6380098 per assistenza in fase di compilazione<br><br>
* Firma e Timbro ovunque dove indicato<br><br>
* Allegare sempre la Vostra Ultima Bolletta Telecom<br><br>
<br></font>
<p align=  \"center\"><font color=  \"FF0000\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">IMPORTANTISSIMO</font><p></p>
<p align=  \"left\"><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">  

  </font><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong>Potrete anticiparci il tutto </strong> <strong>al numero <font color=#ff0000>di fax 06 39 67 40 66 </font><br><br>

  Ma è <font color=  \"FF0000\">INDISPENSABILE</font> inviare il tutto in ORIGINALE via posta prioritaria entro 6 giorni dalla data di invio del fax a:<br><br>

  

</strong></font><strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma</font></strong><p></p>

<strong>La mancata ricezione degli originali, potrebbe causare sospensione del servizio.</strong><br><br>
";

$hEmail->aFiles[] 		= "email/teleunit/unilibera.zip";

$EmProp_aEmail [] = $hEmail;

// -------------------------------------------------
// -------------------------------------------------
//	Blocco email
// -------------------------------------------------

$hEmail = new EmailBlock();

$hEmail->stTitolo 		= "Modulistica GOVOIP";
$hEmail->stSpiegazione 	= "Offerta commerciale e proposta di Abbonamento con relative condizioni contrattuali";
$hEmail->stMessaggio  	= "Per Aderire a questa promozione


* Stampare   il Modulo da Compilare - Proposta di abbonamento  TELEUNIT

* Chiamarci allo 06 6380098 per assistenza in fase di compilazione

* Firma e Timbro ovunque dove indicato

* Allegare sempre la Vostra Ultima Bolletta Telecom

IMPORTANTISSIMO

Potrete anticiparci il tutto al numero di fax 06 39 67 40 66 

Ma è INDISPENSABILE inviare il tutto in ORIGINALE via posta prioritaria entro 6 giorni dalla data di invio del fax a:
  
TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma

La mancata ricezione degli originali, potrebbe causare sospensione del servizio.
";

$hEmail->stMessaggioHTML  = "<font color=  \"000033\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">Per Aderire a questa promozione<br><br>
* Stampare   il Modulo da Compilare - Proposta di abbonamento  TELEUNIT<br><br>
* Chiamarci allo 06 6380098 per assistenza in fase di compilazione<br><br>
* Firma e Timbro ovunque dove indicato<br><br>
* Allegare sempre la Vostra Ultima Bolletta Telecom<br><br>
<br></font>
<p align=  \"center\"><font color=  \"FF0000\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">IMPORTANTISSIMO</font><p></p>
<p align=  \"left\"><font color=  \"333333\" size=  \"4\" face=  \"Verdana, Arial, Helvetica, sans-serif\">  

  </font><font color=  \"0000FF\" size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\"><strong>Potrete anticiparci il tutto </strong> <strong>al numero <font color=#ff0000>di fax 06 39 67 40 66 </font><br><br>

  Ma è <font color=  \"FF0000\">INDISPENSABILE</font> inviare il tutto in ORIGINALE via posta prioritaria entro 6 giorni dalla data di invio del fax a:<br><br>

  

</strong></font><strong><font size=  \"2\" face=  \"Verdana, Arial, Helvetica, sans-serif\">TargeTpoinT srl - Via Carlo Galassi Paluzzi 5 - 00167 Roma</font></strong><p></p>

<strong>La mancata ricezione degli originali, potrebbe causare sospensione del servizio.</strong><br><br>
";

$hEmail->aFiles[] 		= "email/teleunit/Modulistica GOVOIP.zip";

$EmProp_aEmail [] = $hEmail;

// -------------------------------------------------
?>
