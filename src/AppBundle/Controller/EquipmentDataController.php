<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Calibration;
use AppBundle\Entity\EquipmentData;
use AppBundle\Entity\EquipmentType;
use AppBundle\Form\Type\CalibrationInfoType;
use AppBundle\Form\Type\CalibrationType;
use AppBundle\Form\Type\EquipmentDataType;
use AppBundle\Entity\CalibrationInfo;
use AppBundle\Form\Type\EquipmentTypeType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class EquipmentDataController extends ControllerBase
{
    /**
     * @Route("/", name="addEquipmentData")
     */

    public function addEquipmentAction(Request $request)
    {
        $equipmentData = new EquipmentData();

        $equipmentDataForm = $this->createForm(new EquipmentDataType(), $equipmentData);
        $equipmentDataForm ->handleRequest($request);


        if($equipmentDataForm->isValid())
        {
            $this->flushAction($equipmentData);
        }

        return $this->render('AppBundle::equipmentData.html.twig', array('equipmentDataForm' => $equipmentDataForm->createView()));

    }

    /**
     * @Route("/addCalibrationInfo", name="addCalibrationInfo")
     */

    public function addCalibrationInfo(Request $request)
    {
        $calibrationInfo = new CalibrationInfo();
        $calibration = new Calibration();

        $calibrationInfoForm = $this->createForm(new CalibrationInfoType(), $calibrationInfo);
        $calibrationInfoForm->handleRequest($request);

        if($calibrationInfoForm->isValid())
        {

            $this->flushAction($calibrationInfo);
        }

        return $this->render('AppBundle::addCalibrationInfo.html.twig', array('calibrationInfoForm' => $calibrationInfoForm->createView()));

    }


    /**
     * @Route("/addEquipmentType", name="addEquipmentType")
     */

    public function addEquipmentTypeAction(Request $request)
    {
        $equipmentType = new EquipmentType();

        $equipmentTypeForm = $this->createForm(new EquipmentTypeType(), $equipmentType);
        $equipmentTypeForm->handleRequest($request);

        if($equipmentTypeForm->isValid())
        {
            $this->flushAction($equipmentType);
        }

        return $this->render('AppBundle::addType.html.twig', ['equipmentTypeForm' => $equipmentTypeForm->createView()]);
    }

    /**
     * @Route("/addCalibration", name="addCalibration")
     */

    public function addCalibrationAction(Request $request)
    {
        $calibration = new Calibration();

        $calibrationForm = $this->createForm(new CalibrationType(), $calibration);
        $calibrationForm->handleRequest($request);

        if($calibrationForm->isValid())
        {
            $this->flushAction($calibration);
        }

        return $this->render('AppBundle::addCalibration.html.twig', ['calibrationForm' => $calibrationForm->createView() ]);

    }

    /**
     * @Route("/flushData", name="flushData")
     */

    public function flushAction($data)
    {
        $em = $this->getEM();

        $em->persist($data);
        $em->flush();

    }

    /**
     * @Route("/base")
     */

    public function bootAction()
    {
        return $this->render('src:AppBundle:Resources:Base.html.twig');
    }





}