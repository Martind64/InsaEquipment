<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calibration
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Calibration
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
     * @ORM\Column(type="date")
     */
    protected $calibrationDate;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $status;


    /**
     * @ORM\ManyToOne(targetEntity="Equipment", inversedBy="Info")
     * @ORM\JoinColumn(name="equipment_id", referencedColumnName="id")
     */
    protected $EquipmentData;


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
     * Set calibrationDate
     *
     * @param \DateTime $calibrationDate
     *
     * @return Calibration
     */
    public function setCalibrationDate($calibrationDate)
    {
        $this->calibrationDate = $calibrationDate;

        return $this;
    }

    /**
     * Get calibrationDate
     *
     * @return \DateTime
     */
    public function getCalibrationDate()
    {
        return $this->calibrationDate;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Calibration
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set equipmentData
     *
     * @param \AppBundle\Entity\Equipment $equipmentData
     *
     * @return Calibration
     */
    public function setEquipmentData(\AppBundle\Entity\Equipment $equipmentData = null)
    {
        $this->EquipmentData = $equipmentData;

        return $this;
    }

    /**
     * Get equipmentData
     *
     * @return \AppBundle\Entity\Equipment
     */
    public function getEquipmentData()
    {
        return $this->EquipmentData;
    }
}
