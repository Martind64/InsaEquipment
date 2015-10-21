<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Calibration;
use AppBundle\Form\Type\InfoType;
use AppBundle\Entity\Info;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CalibrationController extends ControllerBase
{
    /**
     * @Route("/createInfo", name="addInfo")
     * @Template()
     */

    public function addInfoAction(Request $request)
    {
        $info = new Info();

        $infoForm = $this->createForm(new InfoType(), $info);
        $infoForm->handleRequest($request);

        if($infoForm->isValid())
        {
            $this->flushAction($info);
        }


        return [
            'infoForm' => $infoForm->createView()
        ];
    }
    /**
     * @Route("/createCalibration", name="addCalibration")
     */
    //THIS ACTION IS NOT DONE
    //NEED TO VALIDATE BOTH FORMS
    //THIS ACTION IS NOT DONE
    public function addCalibrationAction(Request $request)
    {
        $calibration = new Calibration();
        $calibrationInfo = new CalibrationInfo();

        $calibrationInfoForm = $this->createForm(new CalibrationInfoType(), $calibrationInfo);
        $calibrationInfoForm->handleRequest($request);

        $calibrationForm = $this->createForm(new CalibrationType(), $calibration);
        $calibrationForm->handleRequest($request);


        if($calibrationInfoForm->isValid())
        {
            $this->flushAction($calibrationInfo);
        }

        return $this->render('AppBundle::addCalibration.html.twig', ['calibrationForm' => $calibrationForm->createView(),
            'calibrationInfoForm' => $calibrationInfoForm->createView()]);
    }


    public function flushAction($data)
    {
        $em = $this->getEM();

        $em->persist($data);
        $em->flush();

    }
}