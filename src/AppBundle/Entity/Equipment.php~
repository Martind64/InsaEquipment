<?php
namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="equipment")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\EquipmentRepository")
 */
class Equipment
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
     * @ORM\Column(type="date")
     */
    protected $nextCalibration;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $boxStorage;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $status;

    /**
     * @ORM\OneToMany(targetEntity="Calibration", mappedBy="equipment")
     */
    protected $calibrations;

    /**
     * @ORM\OneToMany(targetEntity="Document", mappedBy="equipment")
     */
    private $document;

    /**
     * @ORM\ManyToMany(targetEntity="Classification", inversedBy="equipment")
     * @ORM\JoinTable(name="equipment_classification")
     **/
    protected $types;




    public function __construct()
    {
        $this->createdDatetime = new DateTime('now');
        $this->types = new ArrayCollection();
        $this->document = new ArrayCollection();
        $this->callibrations = new ArrayCollection();
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
     * Set description
     *
     * @param string $description
     *
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
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
     * Set owner
     *
     * @param string $owner
     *
     * @return Equipment
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Equipment
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
     * Set calibrationInstitute
     *
     * @param string $calibrationInstitute
     *
     * @return Equipment
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
     * @return Equipment
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
     * Set isoStandard
     *
     * @param string $isoStandard
     *
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
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

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Equipment
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
     * Add type
     *
     * @param \AppBundle\Entity\Classification $type
     *
     * @return Equipment
     */
    public function addType(\AppBundle\Entity\Classification $type)
    {
        $this->types[] = $type;

        return $this;
    }

    /**
     * Remove type
     *
     * @param \AppBundle\Entity\Classification $type
     */
    public function removeType(\AppBundle\Entity\Classification $type)
    {
        $this->types->removeElement($type);
    }

    /**
     * Get types
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Add calibration
     *
     * @param \AppBundle\Entity\Calibration $calibration
     *
     * @return Equipment
     */
    public function addCalibration(\AppBundle\Entity\Calibration $calibration)
    {
        $this->calibrations[] = $calibration;

        return $this;
    }

    /**
     * Remove calibration
     *
     * @param \AppBundle\Entity\Calibration $calibration
     */
    public function removeCalibration(\AppBundle\Entity\Calibration $calibration)
    {
        $this->calibrations->removeElement($calibration);
    }

    /**
     * Get calibrations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCalibrations()
    {
        return $this->calibrations;
    }


    /**
     * Add document
     *
     * @param \AppBundle\Entity\Document $document
     *
     * @return Equipment
     */
    public function addDocument(\AppBundle\Entity\Document $document)
    {
        $this->document[] = $document;

        return $this;
    }

    /**
     * Remove document
     *
     * @param \AppBundle\Entity\Document $document
     */
    public function removeDocument(\AppBundle\Entity\Document $document)
    {
        $this->document->removeElement($document);
    }

    /**
     * Get document
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set equipmentID
     *
     * @param string $equipmentID
     *
     * @return Equipment
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
}
