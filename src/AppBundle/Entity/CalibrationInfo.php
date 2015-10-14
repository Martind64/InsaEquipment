<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalibrationInfo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CalibrationInfo
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
    private $uncertaintyRequests;

    /**
     * @ORM\Column(type="string", length=100)
     */

    private $actualUncertainty;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $labReference;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $uut;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $deviation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adjustmentLimit;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $measurement;


    /**
     * @ORM\Column(type="text", length=20)
     */
    private $unit;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $prefix;

    /**
     * Get id
     *
     * @return integer
     */

    /**
     * @ORM\ManyToOne(targetEntity="EquipmentData", inversedBy="calibrationInfo")
     * @ORM\JoinColumn(name="equipmentData_id", referencedColumnName="id")
     */
    protected $equipmentData;



//    private $date;

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
     * Set uncertaintyRequests
     *
     * @param string $uncertaintyRequests
     *
     * @return CalibrationInfo
     */
    public function setUncertaintyRequests($uncertaintyRequests)
    {
        $this->uncertaintyRequests = $uncertaintyRequests;

        return $this;
    }

    /**
     * Get uncertaintyRequests
     *
     * @return string
     */
    public function getUncertaintyRequests()
    {
        return $this->uncertaintyRequests;
    }

    /**
     * Set actualUncertainty
     *
     * @param string $actualUncertainty
     *
     * @return CalibrationInfo
     */
    public function setActualUncertainty($actualUncertainty)
    {
        $this->actualUncertainty = $actualUncertainty;

        return $this;
    }

    /**
     * Get actualUncertainty
     *
     * @return string
     */
    public function getActualUncertainty()
    {
        return $this->actualUncertainty;
    }

    /**
     * Set uut
     *
     * @param string $uut
     *
     * @return CalibrationInfo
     */
    public function setUut($uut)
    {
        $this->uut = $uut;

        return $this;
    }

    /**
     * Get uut
     *
     * @return string
     */
    public function getUut()
    {
        return $this->uut;
    }

    /**
     * Set deviation
     *
     * @param string $deviation
     *
     * @return CalibrationInfo
     */
    public function setDeviation($deviation)
    {
        $this->deviation = $deviation;

        return $this;
    }

    /**
     * Get deviation
     *
     * @return string
     */
    public function getDeviation()
    {
        return $this->deviation;
    }

    /**
     * Set adjustmentLimit
     *
     * @param string $adjustmentLimit
     *
     * @return CalibrationInfo
     */
    public function setAdjustmentLimit($adjustmentLimit)
    {
        $this->adjustmentLimit = $adjustmentLimit;

        return $this;
    }

    /**
     * Get adjustmentLimit
     *
     * @return string
     */
    public function getAdjustmentLimit()
    {
        return $this->adjustmentLimit;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return CalibrationInfo
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set equipmentData
     *
     * @param \AppBundle\Entity\EquipmentData $equipmentData
     *
     * @return CalibrationInfo
     */
    public function setEquipmentData(\AppBundle\Entity\EquipmentData $equipmentData = null)
    {
        $this->equipmentData = $equipmentData;

        return $this;
    }

    /**
     * Get equipmentData
     *
     * @return \AppBundle\Entity\EquipmentData
     */
    public function getEquipmentData()
    {
        return $this->equipmentData;
    }




    /**
     * Set labReference
     *
     * @param string $labReference
     *
     * @return CalibrationInfo
     */
    public function setLabReference($labReference)
    {
        $this->labReference = $labReference;

        return $this;
    }

    /**
     * Get labReference
     *
     * @return string
     */
    public function getLabReference()
    {
        return $this->labReference;
    }


    /**
     * Get measurement
     *
     * @return string
     */
    public function getMeasurement()
    {
        return $this->measurement;
    }


    /**
     * Get unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }


    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }


    /**
     * Set measurement
     *
     * @param string $measurement
     *
     * @return CalibrationInfo
     */
    public function setMeasurement($measurement)
    {
        $this->measurement = $measurement;

        return $this;
    }

    /**
     * Set unit
     *
     * @param string $unit
     *
     * @return CalibrationInfo
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Set prefix
     *
     * @param string $prefix
     *
     * @return CalibrationInfo
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }
}
