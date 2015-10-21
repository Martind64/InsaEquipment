<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="equipment_type")
 */
class EquipmentType
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text", length=20)
     */
    protected $type;

    /**
     * @ORM\ManyToMany(targetEntity="EquipmentData", mappedBy="equipmentTypes")
     **/
    protected $equipmentData;

    public function __construct()
    {
        $this->equipmentData = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set type
     *
     * @param string $type
     *
     * @return Type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add equipmentDatum
     *
     * @param \AppBundle\Entity\EquipmentData $equipmentDatum
     *
     * @return Type
     */
    public function addEquipmentDatum(\AppBundle\Entity\EquipmentData $equipmentDatum)
    {
        $this->equipmentData[] = $equipmentDatum;

        return $this;
    }

    /**
     * Remove equipmentDatum
     *
     * @param \AppBundle\Entity\EquipmentData $equipmentDatum
     */
    public function removeEquipmentDatum(\AppBundle\Entity\EquipmentData $equipmentDatum)
    {
        $this->equipmentData->removeElement($equipmentDatum);
    }

    /**
     * Get equipmentData
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipmentData()
    {
        return $this->equipmentData;
    }
}
