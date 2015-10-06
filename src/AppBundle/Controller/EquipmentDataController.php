<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EquipmentData;
use AppBundle\Entity\CalibrationInfo;
use AppBundle\Entity\CalibrationPoint;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class EquipmentDataController extends ControllerBase
{
    /**
     * @Route("/", name="AddRoute")
     */

    public function addEquipmentAction(Request $request)
    {
        $equipmentData = new EquipmentData();
        $calibrationInfo = new CalibrationInfo();
        $calibrationPoint = new CalibrationPoint();

        $form = $this->createForm(new equipmentData(), $equipmentData);
        $form->handleRequest($form);

        return $this->render('EquipmentData.html.twig', array('form' => $form->createView()));


    }

}