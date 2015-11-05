<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Info
 *
 * @ORM\Table(name="document")
 * @ORM\Entity
 */
class Document
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

    protected $path;


    /**
     * @ORM\ManyToOne(targetEntity="DocumentClassification", inversedBy="path")
     * @ORM\JoinColumn(name="documentClassification_id", referencedColumnName="id")
     */
    private $documentClassification;

    /**
     * @ORM\ManyToOne(targetEntity="Equipment", inversedBy="document")
     * @ORM\JoinColumn(name="equipment_id", referencedColumnName="id")
     */
    private $equipment;




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
     * Set path
     *
     * @param string $path
     *
     * @return Document
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set documentClassification
     *
     * @param \AppBundle\Entity\DocumentClassification $documentClassification
     *
     * @return Document
     */
    public function setDocumentClassification(\AppBundle\Entity\DocumentClassification $documentClassification = null)
    {
        $this->documentClassification = $documentClassification;

        return $this;
    }

    /**
     * Get documentClassification
     *
     * @return \AppBundle\Entity\DocumentClassification
     */
    public function getDocumentClassification()
    {
        return $this->documentClassification;
    }

    /**
     * Set equipment
     *
     * @param \AppBundle\Entity\Equipment $equipment
     *
     * @return Document
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
}
