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
     * @Route("/createEquipmentData", name="addEquipmentData")
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
     * @Route("/createCalibrationInfo", name="addCalibrationInfo")
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
     * @Route("/createEquipmentType", name="addEquipmentType")
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
     * @Route("/createCalibration", name="addCalibration")
     */

    public function addCalibrationAction(Request $request)
    {
        $calibration = new Calibration();
        $calibrationInfo = new CalibrationInfo();

        $calibrationInfoForm = $this->createForm(new CalibrationInfoType(), $calibrationInfo);
        $calibrationInfoForm->handleRequest($request);

        $calibrationForm = $this->createForm(new CalibrationType(), $calibration);
        $calibrationForm->handleRequest($request);

        $calibrationInfo->setCalibration($calibration);

        if($calibrationForm->isValid())
        {
            $this->flushAction($calibrationInfo);
            $this->flushAction($calibration);
        }

        return $this->render('AppBundle::addCalibration.html.twig', ['calibrationForm' => $calibrationForm->createView(),
                                                                    'calibrationInfoForm' => $calibrationInfoForm->createView()]);
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
     * @Route("/overview", name="overview")
     */

    public function getEquipmentAction()
    {
        $equipmentData = $this->getEM()->getRepository('AppBundle:EquipmentData')
            ->findall();

        return $this->render('AppBundle::overview.html.twig', ['equipmentData' => $equipmentData]);

    }


    /**
     * @Route("/homepage", name="homepage")
     */

    public function homePageAction()
    {
        return $this->render('AppBundle::homepage.html.twig');
    }

    /**
     * @Route("/equipment/{id}", name="ShowEquipment")
     */

    public function showIndividualEquipment($id)
    {
        $em = $this->getEM()->getRepository('AppBundle:EquipmentData');

        $equipment = $em->find($id);
        if(!$equipment)
        {
            throw $this->createNotFoundException('There is no equipment with that id');
        }

//        return new Response($equipment->getEquipmentId());

        return $this->render('AppBundle::showEquipment.html.twig', array('equipment' => $equipment));

    }


}