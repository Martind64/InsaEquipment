<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Calibration;
use AppBundle\Form\Type\InfoType;
use AppBundle\Form\Type\CalibrationType;
use AppBundle\Entity\Info;
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
            return $this->render('createInfo/'.$calibration->getId());
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


        $info = new Info();

        $infoForm = $this->createForm(new InfoType(), $info);
        $infoForm->handleRequest($request);

        if($infoForm->isValid())
        {
            $this->flushAction($info);
        }


        return [
            'infoForm' => $infoForm->createView(),
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