<?php
namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="equipmentData")
 */
class EquipmentData
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $equipmentID;
    /**
     * @ORM\Column(type="text", length=200)
     */

    protected $description;
    /**
     * @ORM\Column(type="string", length=100)
     */

    protected $model;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $serialNr;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $placement;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $partner;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $category;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $level;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $owner;

    /**
     * @ORM\Column(type="text", length=100)
     */
    protected $comment;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $calibrationInstitute;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdDatetime;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $isoStandard;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $calibrationInterval;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $nextCalibration;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $boxStorage;



    /**
     * @ORM\OneToMany(targetEntity="CalibrationInfo", mappedBy="equipmentData")
     */
    protected $calibrationInfo;

    public function __construct()
    {
        $this->calibrationInfo = new ArrayCollection();
        $this->createdDatetime = new DateTime('now');
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
     * Set equipmentID
     *
     * @param string $equipmentID
     *
     * @return EquipmentData
     */
    public function setEquipmentID($equipmentID)
    {
        $this->equipmentID = $equipmentID;

        return $this;
    }

    /**
     * Get equipmentID
     *
     * @return string
     */
    public function getEquipmentID()
    {
        return $this->equipmentID;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return EquipmentData
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return EquipmentData
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set serialNr
     *
     * @param string $serialNr
     *
     * @return EquipmentData
     */
    public function setSerialNr($serialNr)
    {
        $this->serialNr = $serialNr;

        return $this;
    }

    /**
     * Get serialNr
     *
     * @return string
     */
    public function getSerialNr()
    {
        return $this->serialNr;
    }

    /**
     * Set placement
     *
     * @param string $placement
     *
     * @return EquipmentData
     */
    public function setPlacement($placement)
    {
        $this->placement = $placement;

        return $this;
    }

    /**
     * Get placement
     *
     * @return string
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Set partner
     *
     * @param string $partner
     *
     * @return EquipmentData
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * Get partner
     *
     * @return string
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return EquipmentData
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set level
     *
     * @param string $level
     *
     * @return EquipmentData
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }



    /**
     * Add calibrationInfo
     *
     * @param \AppBundle\Entity\CalibrationInfo $calibrationInfo
     *
     * @return EquipmentData
     */
    public function addCalibrationInfo(\AppBundle\Entity\CalibrationInfo $calibrationInfo)
    {
        $this->calibrationInfo[] = $calibrationInfo;

        return $this;
    }

    /**
     * Remove calibrationInfo
     *
     * @param \AppBundle\Entity\CalibrationInfo $calibrationInfo
     */
    public function removeCalibrationInfo(\AppBundle\Entity\CalibrationInfo $calibrationInfo)
    {
        $this->calibrationInfo->removeElement($calibrationInfo);
    }

    /**
     * Get calibrationInfo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCalibrationInfo()
    {
        return $this->calibrationInfo;
    }


    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return EquipmentData
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set calibrationInstitute
     *
     * @param string $calibrationInstitute
     *
     * @return EquipmentData
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
     * Set createdDatetime
     *
     * @param \DateTime $createdDatetime
     *
     * @return EquipmentData
     */
    public function setCreatedDatetime($createdDatetime)
    {
        $this->createdDatetime = $createdDatetime;

        return $this;
    }

    /**
     * Get createdDatetime
     *
     * @return \DateTime
     */
    public function getCreatedDatetime()
    {
        return $this->createdDatetime;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return EquipmentData
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
     * Set isoStandard
     *
     * @param string $isoStandard
     *
     * @return EquipmentData
     */
    public function setIsoStandard($isoStandard)
    {
        $this->isoStandard = $isoStandard;

        return $this;
    }

    /**
     * Get isoStandard
     *
     * @return string
     */
    public function getIsoStandard()
    {
        return $this->isoStandard;
    }

    /**
     * Set calibrationInterval
     *
     * @param string $calibrationInterval
     *
     * @return EquipmentData
     */
    public function setCalibrationInterval($calibrationInterval)
    {
        $this->calibrationInterval = $calibrationInterval;

        return $this;
    }

    /**
     * Get calibrationInterval
     *
     * @return string
     */
    public function getCalibrationInterval()
    {
        return $this->calibrationInterval;
    }

    /**
     * Set nextCalibration
     *
     * @param \DateTime $nextCalibration
     *
     * @return EquipmentData
     */
    public function setNextCalibration($nextCalibration)
    {
        $this->nextCalibration = $nextCalibration;

        return $this;
    }

    /**
     * Get nextCalibration
     *
     * @return \DateTime
     */
    public function getNextCalibration()
    {
        return $this->nextCalibration;
    }

    /**
     * Set boxStorage
     *
     * @param boolean $boxStorage
     *
     * @return EquipmentData
     */
    public function setBoxStorage($boxStorage)
    {
        $this->boxStorage = $boxStorage;

        return $this;
    }

    /**
     * Get boxStorage
     *
     * @return boolean
     */
    public function getBoxStorage()
    {
        return $this->boxStorage;
    }
}
