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
     * @Route("/updateInfo/{id}", name="updateInfo")
     * @Template()
     */
    public function updateInfoAction(Request $request, $id)
    {
        $em = $this->getEM();
        $info = $em->getRepository('AppBundle:Info')->find($id);

        $form = $this->createForm(new InfoType(), $info);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($info);
        }

        return [
            'Form' => $form->createView()
        ];

    }

    /**
     * @Route("/updateCalibration/{id}", name="updateCalibration")
     * @Template()
     */
    public function updateCalibrationAction(Request $request, $id)
    {
        $em = $this->getEM();
        $calibration = $em->getRepository('AppBundle:Calibration')->find($id);

        $form = $this->createForm(new CalibrationType(), $calibration);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($calibration);
            return $this->redirectToRoute('showCalibration', ['id' => $calibration->getId()]);
        }

        return [
            'Form' => $form->createView()
        ];
    }




    /**
     * @Route("/calibration/{id}", name="showCalibration")
     * @Template()
     */
    public function showCalibrationAction($id)
    {
        $em = $this->getEM()->getRepository('AppBundle:Calibration');
        $info = $em->findCalibrationInfo($id);
        $calibration = $em->find($id);

        return [
            'info'=> $info,
            'calibration' => $calibration
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

}