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
     * @ORM\ManyToOne(targetEntity="EquipmentData", inversedBy="calibrationInfo")
     * @ORM\JoinColumn(name="equipmentData_id", referencedColumnName="id")
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
     * Set equipmentData
     *
     * @param \AppBundle\Entity\EquipmentData $equipmentData
     *
     * @return Calibration
     */
    public function setEquipmentData(\AppBundle\Entity\EquipmentData $equipmentData = null)
    {
        $this->EquipmentData = $equipmentData;

        return $this;
    }

    /**
     * Get equipmentData
     *
     * @return \AppBundle\Entity\EquipmentData
     */
    public function getEquipmentData()
    {
        return $this->EquipmentData;
    }
}
