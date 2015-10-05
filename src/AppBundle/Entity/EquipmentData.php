<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

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
    protected $doneBy;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $approvedBy;



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
     * Set doneBy
     *
     * @param string $doneBy
     *
     * @return EquipmentData
     */
    public function setDoneBy($doneBy)
    {
        $this->doneBy = $doneBy;

        return $this;
    }

    /**
     * Get doneBy
     *
     * @return string
     */
    public function getDoneBy()
    {
        return $this->doneBy;
    }

    /**
     * Set approvedBy
     *
     * @param string $approvedBy
     *
     * @return EquipmentData
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
}
