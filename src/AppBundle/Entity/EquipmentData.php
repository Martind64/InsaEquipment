<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="equipmentData)
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
     * @ORM\Column(type="integer", length=100)
     */
    protected $equipmentID;

    /**
     * @ORM\Column(type="string", length=100)
     */

//    protected $model;
//    protected $serialNr;
//    protected $placement;
//    protected $partner;
//    protected $category;
//    protected $level;
//    protected $doneBy;
//    protected $approvedBy;


}