<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping as ORM;



class ControllerBase extends Controller
    {
    /**
    * @return EntityManager
    */
    public function getEm()
    {
        return $this->get('doctrine.orm.default_entity_manager');
    }
}