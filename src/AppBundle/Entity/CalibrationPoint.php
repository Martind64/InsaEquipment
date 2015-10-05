<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalibrationPoint
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CalibrationPoint
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
     * @ORM\OneToOne(targetEntity="CalibrationInfo", mappedBy="calibrationPoint")
     */
    protected $CalibrationInfo;

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
     * Set measurement
     *
     * @param string $measurement
     *
     * @return CalibrationPoint
     */
    public function setMeasurement($measurement)
    {
        $this->measurement = $measurement;

        return $this;
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
     * Set unit
     *
     * @param string $unit
     *
     * @return CalibrationPoint
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
     * @return CalibrationPoint
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
     * Set calibrationInfo
     *
     * @param \AppBundle\Entity\CalibrationInfo $calibrationInfo
     *
     * @return CalibrationPoint
     */
    public function setCalibrationInfo(\AppBundle\Entity\CalibrationInfo $calibrationInfo = null)
    {
        $this->CalibrationInfo = $calibrationInfo;

        return $this;
    }

    /**
     * Get calibrationInfo
     *
     * @return \AppBundle\Entity\CalibrationInfo
     */
    public function getCalibrationInfo()
    {
        return $this->CalibrationInfo;
    }
}
