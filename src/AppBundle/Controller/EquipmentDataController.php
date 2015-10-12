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

    public function addEquipmentAction(Request $request)
    {
        $equipmentData = new EquipmentData();

        $equipmentDataForm = $this->createForm(new EquipmentDataType(), $equipmentData);
        $equipmentDataForm ->handleRequest($request);


        if($equipmentDataForm->isValid())
        {
            return $this->forward('AppBundle:EquipmentData:flushEquipment', array('equipment' => $equipmentData));
//
        }

        return $this->render('AppBundle::equipmentData.html.twig', array('equipmentDataForm' => $equipmentDataForm->createView()));

    }

    /**
     * @Route("/addRoute", name="addEquipmentAction")
     */

    public function flushEquipmentAction($equipment)
    {
        $em = $this->getEM();

        $em->persist($equipment);
        $em->flush();

        return new Response('Equipment was added');
    }


    /**
     * @Route("/calibration" name="CalibrationRoute")
     */

    public function addCalibrationAction()
    {
        $calibrationInfo = new CalibrationInfo();
        $calibrationPoint = new CalibrationPoint();


    }



    public function flushCalibrationAction($calibration)
    {
        $em = $this->getEM();

        $em->persist($calibration);
        $em->flush();
    }



}