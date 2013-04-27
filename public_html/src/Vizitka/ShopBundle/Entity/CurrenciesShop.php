<?php

namespace Vizitka\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CurrenciesShop
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CurrenciesShop
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="sign", type="string", length=20)
     */
    private $sign;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="smallint")
     */
    private $code;

    /**
     * @var float
     *
     * @ORM\Column(name="rate_from", type="float")
     */
    private $rate_from;

    /**
     * @var float
     *
     * @ORM\Column(name="rate_to", type="float")
     */
    private $rate_to;

    /**
     * @var integer
     *
     * @ORM\Column(name="cents", type="smallint")
     */
    private $cents;

    /**
     * @var integer
     *
     * @ORM\Column(name="enabled", type="smallint")
     */
    private $enabled;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CurrenciesShop
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set sign
     *
     * @param string $sign
     * @return CurrenciesShop
     */
    public function setSign($sign)
    {
        $this->sign = $sign;
    
        return $this;
    }

    /**
     * Get sign
     *
     * @return string 
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * Set code
     *
     * @param integer $code
     * @return CurrenciesShop
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set rate_from
     *
     * @param float $rateFrom
     * @return CurrenciesShop
     */
    public function setRateFrom($rateFrom)
    {
        $this->rate_from = $rateFrom;
    
        return $this;
    }

    /**
     * Get rate_from
     *
     * @return float 
     */
    public function getRateFrom()
    {
        return $this->rate_from;
    }

    /**
     * Set rate_to
     *
     * @param float $rateTo
     * @return CurrenciesShop
     */
    public function setRateTo($rateTo)
    {
        $this->rate_to = $rateTo;
    
        return $this;
    }

    /**
     * Get rate_to
     *
     * @return float 
     */
    public function getRateTo()
    {
        return $this->rate_to;
    }

    /**
     * Set cents
     *
     * @param integer $cents
     * @return CurrenciesShop
     */
    public function setCents($cents)
    {
        $this->cents = $cents;
    
        return $this;
    }

    /**
     * Get cents
     *
     * @return integer 
     */
    public function getCents()
    {
        return $this->cents;
    }

    /**
     * Set enabled
     *
     * @param integer $enabled
     * @return CurrenciesShop
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return integer 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}