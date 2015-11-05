<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Info
 *
 * @ORM\Table(name="document_classification")
 * @ORM\Entity
 */
class DocumentClassification
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
     * @ORM\Column(type="text", length=100)
     */

    protected $type;

    /**
     * @ORM\OneToMany(targetEntity="Document", mappedBy="documentClassification")
     */
    private $path;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->path = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set type
     *
     * @param string $type
     *
     * @return DocumentClassification
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add path
     *
     * @param \AppBundle\Entity\Bond $path
     *
     * @return DocumentClassification
     */
    public function addPath(\AppBundle\Entity\Bond $path)
    {
        $this->path[] = $path;

        return $this;
    }

    /**
     * Remove path
     *
     * @param \AppBundle\Entity\Bond $path
     */
    public function removePath(\AppBundle\Entity\Bond $path)
    {
        $this->path->removeElement($path);
    }

    /**
     * Get path
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPath()
    {
        return $this->path;
    }
}
