<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Info
 *
 * @ORM\Table(name="bond")
 * @ORM\Entity
 */
class Bond
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
     * @ORM\Column(type="text", length=200)
     */

    protected $link;


    /**
     * @ORM\ManyToOne(targetEntity="BondClassification", inversedBy="link")
     * @ORM\JoinColumn(name="bondClassification_id", referencedColumnName="id")
     */
    private $bondClassification;

    /**
     * @ORM\ManyToOne(targetEntity="Equipment", inversedBy="link")
     * @ORM\JoinColumn(name="equipment_id", referencedColumnName="id")
     */
    private $equipment;



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
     * Set link
     *
     * @param string $link
     *
     * @return Bond
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set bondClassification
     *
     * @param \AppBundle\Entity\bondClassification $bondClassification
     *
     * @return Bond
     */
    public function setBondClassification(\AppBundle\Entity\bondClassification $bondClassification = null)
    {
        $this->bondClassification = $bondClassification;

        return $this;
    }

    /**
     * Get bondClassification
     *
     * @return \AppBundle\Entity\bondClassification
     */
    public function getBondClassification()
    {
        return $this->bondClassification;
    }

    /**
     * Set equipment
     *
     * @param \AppBundle\Entity\Equipment $equipment
     *
     * @return Bond
     */
    public function setEquipment(\AppBundle\Entity\Equipment $equipment = null)
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * Get equipment
     *
     * @return \AppBundle\Entity\Equipment
     */
    public function getEquipment()
    {
        return $this->equipment;
    }
}
