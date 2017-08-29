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
    private $voloPiuOrario = null;

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
    public function getVoloPiuOrario()
    {
        return $this->voloPiuOrario;
    }

    /**
     * @param null $voloPiuOrario
     */
    public function setVoloPiuOrario($voloPiuOrario)
    {
        $this->voloPiuOrario = $voloPiuOrario;
    }

    /**
     * @param null $struttura
     */
    public function setStruttura($struttura)
    {
        $this->struttura = $struttura;
    }
    public function serialize() {
        return serialize([
            $this->data,
            $this->struttura,
            $this->voloPiuOrario,
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
            $this->voloPiuOrario
            ) = unserialize($serialized);
    }
}