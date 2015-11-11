<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calibration
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\CalibrationRepository")
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
     * @ORM\Column(type="string", length=100)
     */
    private $calibrationInstitute;

    /**
     * @ORM\Column(type="string", length=100)
     */

    private $approvedBy;

    /**
     * @ORM\OneToMany(targetEntity="Info", mappedBy="calibration")
     */
    private $info;


    /**
     * @ORM\ManyToOne(targetEntity="Equipment", inversedBy="calibrations")
     * @ORM\JoinColumn(name="equipment_id", referencedColumnName="id")
     */
    protected $equipment;


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
     * Set calibrationInstitute
     *
     * @param string $calibrationInstitute
     *
     * @return Calibration
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
     * @return Calibration
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
     * Set equipment
     *
     * @param \AppBundle\Entity\Equipment $equipment
     *
     * @return Calibration
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->info = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add info
     *
     * @param \AppBundle\Entity\Info $info
     *
     * @return Calibration
     */
    public function addInfo(\AppBundle\Entity\Info $info)
    {
        $this->info[] = $info;

        return $this;
    }

    /**
     * Remove info
     *
     * @param \AppBundle\Entity\Info $info
     */
    public function removeInfo(\AppBundle\Entity\Info $info)
    {
        $this->info->removeElement($info);
    }

    /**
     * Get info
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInfo()
    {
        return $this->info;
    }
}
