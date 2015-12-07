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
     * @ORM\Column(type="decimal", precision=12, scale=8 )
     */
    private $uncertaintyRequests;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=8 )
     */
    private $actualUncertainty;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=8 )
     */
    private $labReference;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=8 )
     */
    private $uut;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=8 )
     */
    private $deviation;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=8 )
     */
    private $adjustmentLimit;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=8 )
     */
    private $comment;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=8 )
     */
    private $measuredAt;


    /**
     * @ORM\ManyToOne(targetEntity="Unit")
     * @ORM\JoinColumn(name="unit_id", referencedColumnName="id")
     */
    protected $unit;


    /**
     * @ORM\ManyToOne(targetEntity="Prefix")
     * @ORM\JoinColumn(name="prefix_id", referencedColumnName="id")
     */
    protected $prefix;


    /**
     * @ORM\ManyToOne(targetEntity="Calibration", inversedBy="info")
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
     * @param \AppBundle\Entity\Unit $unit
     *
     * @return Info
     */
    public function setUnit(\AppBundle\Entity\Unit $unit = null)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \AppBundle\Entity\Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set prefix
     *
     * @param \AppBundle\Entity\Prefix $prefix
     *
     * @return Info
     */
    public function setPrefix(\AppBundle\Entity\Prefix $prefix = null)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get prefix
     *
     * @return \AppBundle\Entity\Prefix
     */
    public function getPrefix()
    {
        return $this->prefix;
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
