<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Calibration;
use AppBundle\Entity\Prefix;
use AppBundle\Entity\Unit;
use AppBundle\Form\Type\InfoType;
use AppBundle\Form\Type\CalibrationType;
use AppBundle\Entity\Info;
use AppBundle\Form\Type\PrefixType;
use AppBundle\Form\Type\UnitType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CalibrationController extends ControllerBase
{
    /**
     * @Route("/createCalibration", name="createCalibration")
     * @Template()
     */

    public function createCalibrationAction(Request $request)
    {
        $calibration = new Calibration();

        $Form = $this->createForm(new CalibrationType(), $calibration);
        $Form->handleRequest($request);

        if($Form->isValid())
        {
            $this->flushAction($calibration);
            return $this->redirectToRoute('addInfo', ['id' => $calibration->getId()]);
        }

        return[
            'Form' => $Form->createView()
        ];
    }
    /**
     * @Route("/createInfo/{id}", name="addInfo")
     * @Template()
     */

    public function addInfoAction(Request $request, $id)
    {
        $em = $this->getEM();
        $calibration = $em->getRepository('AppBundle:Calibration')->find($id);

        $info = new Info();
        $infoForm = $this->createForm(new InfoType(), $info);
        $infoForm->handleRequest($request);



        if(!$id)
        {
            throw $this->createNotFoundException('No calibration with that id exists');
        }

        if($infoForm->isValid())
        {
            $info->setCalibration($calibration);
            $this->flushAction($info);
        }


        return [
            'infoForm' => $infoForm->createView(),
        ];
    }

    /**
     * @Route("/calibration/{id}", name="showCalibration")
     * @Template()
     */
    public function showCalibrationAction($id)
    {
//        $em = $this->getEM()->getRepository('AppBundle:Calibration');
//        $calibration = $em->findByEquipment($id);

//        $emUnit = $this->getEM()->getRepository('AppBundle:Unit');
//        $unit = $emUnit->findByUnit();
//
//        $emPrefix = $this->getEM()->getRepository('AppBundle:Prefix');
//        $prefix = $emUnit->findByPrefix();


        $emcal = $this->getEM()->getRepository('AppBundle:Info');
        $info = $emcal->findByCalibration($id);

        return [
//            'calibration' => $calibration,
            'info'=> $info
        ];

    }

    /**
     * @Route("/createUnit", name="createUnit")
     * @Template
     */
    public function createUnitAction(Request $request)
    {
        $unit = new Unit();

        $form = $this->createForm(new UnitType(), $unit);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($unit);
        }

        return [
            'Form' => $form->createView()
        ];

    }

    /**
     * @Route("createPrefix", name="createPrefix")
     * @Template()
     */

    public function createPrefixAction(Request $request)
    {
        $prefix = new Prefix();

        $form = $this->createForm(new PrefixType(), $prefix);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($prefix);
        }


        return [
            'Form' => $form->createView()
        ];

    }





    public function flushAction($data)
    {
        $em = $this->getEM();

        $em->persist($data);
        $em->flush();

    }

    //    /**
//     * @Route("/createCalibration", name="addCalibration")
//     * @Template()
//     */
//    //THIS ACTION IS NOT DONE
//    //NEED TO VALIDATE BOTH FORMS
//    //THIS ACTION IS NOT DONE
//    public function addCalibrationAction(Request $request)
//    {
//        $calibration = new Calibration();
//        $calibrationInfo = new CalibrationInfo();
//
//        $calibrationInfoForm = $this->createForm(new CalibrationInfoType(), $calibrationInfo);
//        $calibrationInfoForm->handleRequest($request);
//
//        $calibrationForm = $this->createForm(new CalibrationType(), $calibration);
//        $calibrationForm->handleRequest($request);
//
//
//        if($calibrationInfoForm->isValid())
//        {
//            $this->flushAction($calibrationInfo);
//        }
//
//        return $this->render('AppBundle::addCalibration.html.twig', ['calibrationForm' => $calibrationForm->createView(),
//            'calibrationInfoForm' => $calibrationInfoForm->createView()]);
//    }

}