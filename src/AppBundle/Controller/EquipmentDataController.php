<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EquipmentData;
use AppBundle\Form\Type\CalibrationInfoType;
use AppBundle\Form\Type\CalibrationPointType;
use AppBundle\Form\Type\EquipmentDataType;
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

    public function addAction(Request $request)
    {
        $equipmentData = new EquipmentData();
        $calibrationInfo = new CalibrationInfo();
        $calibrationPoint = new CalibrationPoint();

        $calibrationPointForm = $this->createForm(new CalibrationPointType(), $calibrationPoint);
        $calibrationPointForm->handleRequest($request);

        $calibrationInfoForm = $this->createForm(new CalibrationInfoType(), $calibrationInfo);
        $calibrationInfoForm->handleRequest($request);

        $equipmentDataForm = $this->createForm(new EquipmentDataType(), $equipmentData);
        $equipmentDataForm ->handleRequest($request);


        if($equipmentDataForm->isValid())
        {
            return $this->forward('AppBundle:EquipmentData:addEquipment', array('equipment' => $equipmentData));
//
        }

        return $this->render('AppBundle::equipmentData.html.twig', array('equipmentDataForm' => $equipmentDataForm->createView(),
            'calibrationInfoForm' => $calibrationInfoForm->createView(),
            'calibrationPointForm' => $calibrationPointForm->createView()));

    }

    /**
     * @Route("/addRoute", name="addEquipmentAction")
     */

    public function addEquipmentAction($equipment)
    {
        $em = $this->getEM();

        $em->persist($equipment);
        $em->flush();

        return new Response('Equipment was added');

    }



}