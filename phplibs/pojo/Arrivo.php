<?php
/**
 * Created by PhpStorm.
 * User: f.dearcangelis
 * Date: 29/08/2017
 * Time: 09:55
 */

class Arrivo implements Serializable
{
    private $data = null;
    private $struttura = null;
    private $mezzoPiuOrario = null;
    private $numeroAdulti = null;
    private $numeroAnimali = null;
    private $numeroBambiniDa3A6 = null;
    private $numeroBambiniDa6A12 = null;
    private $nomeContatto = null;
    private $cognomeContatto = null;
    private $emailContatto = null;
    private $cellulareContatto = null;
    private $nomeDestinazione = null;
    private $indirizzoDestinazione = null;

    /**
     * @return null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param null $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return null
     */
    public function getStruttura()
    {
        return $this->struttura;
    }

    /**
     * @return null
     */
    public function getMezzoPiuOrario()
    {
        return $this->mezzoPiuOrario;
    }

    /**
     * @param null $mezzoPiuOrario
     */
    public function setMezzoPiuOrario($mezzoPiuOrario)
    {
        $this->mezzoPiuOrario = $mezzoPiuOrario;
    }

    /**
     * @param null $struttura
     */
    public function setStruttura($struttura)
    {
        $this->struttura = $struttura;
    }

    /**
     * @return null
     */
    public function getNumeroAdulti()
    {
        return $this->numeroAdulti;
    }

    /**
     * @param null $numeroAdulti
     */
    public function setNumeroAdulti($numeroAdulti)
    {
        $this->numeroAdulti = $numeroAdulti;
    }

    /**
     * @return null
     */
    public function getNumeroAnimali()
    {
        return $this->numeroAnimali;
    }

    /**
     * @param null $numeroAnimali
     */
    public function setNumeroAnimali($numeroAnimali)
    {
        $this->numeroAnimali = $numeroAnimali;
    }

    /**
     * @return null
     */
    public function getNumeroBambiniDa3A6()
    {
        return $this->numeroBambiniDa3A6;
    }

    /**
     * @param null $numeroBambiniDa3A6
     */
    public function setNumeroBambiniDa3A6($numeroBambiniDa3A6)
    {
        $this->numeroBambiniDa3A6 = $numeroBambiniDa3A6;
    }

    /**
     * @return null
     */
    public function getNumeroBambiniDa6A12()
    {
        return $this->numeroBambiniDa6A12;
    }

    /**
     * @param null $numeroBambiniDa6A12
     */
    public function setNumeroBambiniDa6A12($numeroBambiniDa6A12)
    {
        $this->numeroBambiniDa6A12 = $numeroBambiniDa6A12;
    }

    /**
     * @return null
     */
    public function getNomeContatto()
    {
        return $this->nomeContatto;
    }

    /**
     * @param null $nomeContatto
     */
    public function setNomeContatto($nomeContatto)
    {
        $this->nomeContatto = $nomeContatto;
    }

    /**
     * @return null
     */
    public function getCognomeContatto()
    {
        return $this->cognomeContatto;
    }

    /**
     * @param null $cognomeContatto
     */
    public function setCognomeContatto($cognomeContatto)
    {
        $this->cognomeContatto = $cognomeContatto;
    }

    /**
     * @return null
     */
    public function getEmailContatto()
    {
        return $this->emailContatto;
    }

    /**
     * @param null $emailContatto
     */
    public function setEmailContatto($emailContatto)
    {
        $this->emailContatto = $emailContatto;
    }

    /**
     * @return null
     */
    public function getCellulareContatto()
    {
        return $this->cellulareContatto;
    }

    /**
     * @param null $cellulareContatto
     */
    public function setCellulareContatto($cellulareContatto)
    {
        $this->cellulareContatto = $cellulareContatto;
    }

    /**
     * @return null
     */
    public function getNomeDestinazione()
    {
        return $this->nomeDestinazione;
    }

    /**
     * @param null $nomeDestinazione
     */
    public function setNomeDestinazione($nomeDestinazione)
    {
        $this->nomeDestinazione = $nomeDestinazione;
    }

    /**
     * @return null
     */
    public function getIndirizzoDestinazione()
    {
        return $this->indirizzoDestinazione;
    }

    /**
     * @param null $indirizzoDestinazione
     */
    public function setIndirizzoDestinazione($indirizzoDestinazione)
    {
        $this->indirizzoDestinazione = $indirizzoDestinazione;
    }



    public function serialize() {
        return serialize([
            $this->data,
            $this->struttura,
            $this->mezzoPiuOrario,
            $this->numeroAdulti,
            $this->numeroAnimali,
            $this->numeroBambiniDa3A6,
            $this->numeroBambiniDa6A12,
            $this->nomeContatto,
            $this->cognomeContatto,
            $this->emailContatto,
            $this->cellulareContatto,
            $this->nomeDestinazione,
            $this->indirizzoDestinazione
        ]);
    }


    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list(
            $this->data,
            $this->struttura,
            $this->mezzoPiuOrario,
            $this->numeroAdulti,
            $this->numeroAnimali,
            $this->numeroBambiniDa3A6,
            $this->numeroBambiniDa6A12,
            $this->nomeContatto,
            $this->cognomeContatto,
            $this->emailContatto,
            $this->cellulareContatto,
            $this->nomeDestinazione,
            $this->indirizzoDestinazione
            ) = unserialize($serialized);
    }
}