<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Info
 *
 * @ORM\Table(name="info")
 * @ORM\Entity
 */
class Info
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
    private $measuredAt;


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
     * @ORM\Column(type="string", length=100)
     */
    private $calibrationInstitute;

    /**
     * @ORM\Column(type="string", length=100)
     */

    private $approvedBy;

    /**
     * @ORM\ManyToOne(targetEntity="Calibration", inversedBy="Info")
     * @ORM\JoinColumn(name="calibration_id", referencedColumnName="id")
     */
    protected $calibration;



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
     * @return Info
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
     * @return Info
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
     * Set labReference
     *
     * @param string $labReference
     *
     * @return Info
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
     * Set uut
     *
     * @param string $uut
     *
     * @return Info
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
     * @return Info
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
     * @return Info
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
     * @return Info
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
     * Set measuredAt
     *
     * @param string $measuredAt
     *
     * @return Info
     */
    public function setMeasuredAt($measuredAt)
    {
        $this->measuredAt = $measuredAt;

        return $this;
    }

    /**
     * Get measuredAt
     *
     * @return string
     */
    public function getMeasuredAt()
    {
        return $this->measuredAt;
    }

    /**
     * Set unit
     *
     * @param string $unit
     *
     * @return Info
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
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
     * Set prefix
     *
     * @param string $prefix
     *
     * @return Info
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
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
     * Set calibrationInstitute
     *
     * @param string $calibrationInstitute
     *
     * @return Info
     */
    public function setCalibrationInstitute($calibrationInstitute)
    {
        $this->calibrationInstitute = $calibrationInstitute;

        return $this;
    }

    /**
     * Get calibrationInstitute
     *
     * @return string
     */
    public function getCalibrationInstitute()
    {
        return $this->calibrationInstitute;
    }

    /**
     * Set approvedBy
     *
     * @param string $approvedBy
     *
     * @return Info
     */
    public function setApprovedBy($approvedBy)
    {
        $this->approvedBy = $approvedBy;

        return $this;
    }

    /**
     * Get approvedBy
     *
     * @return string
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    /**
     * Set calibration
     *
     * @param \AppBundle\Entity\Calibration $calibration
     *
     * @return Info
     */
    public function setCalibration(\AppBundle\Entity\Calibration $calibration = null)
    {
        $this->calibration = $calibration;

        return $this;
    }

    /**
     * Get calibration
     *
     * @return \AppBundle\Entity\Calibration
     */
    public function getCalibration()
    {
        return $this->calibration;
    }
}
