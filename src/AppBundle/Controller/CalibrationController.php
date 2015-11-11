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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
        //Checks if the user has admin rights
        $this->checkForAdminAction();

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
        //Checks if the user has admin rights
        $this->checkForAdminAction();

        $em = $this->getEM();
        $calibration = $em->getRepository('AppBundle:Calibration')->find($id);

        $info = new Info();
        $form = $this->createForm(new InfoType(), $info);
        $form->handleRequest($request);

        if(!$id)
        {
            throw $this->createNotFoundException('No calibration with that id exists');
        }

        if($form->isValid())
        {
            $info->setCalibration($calibration);
            $this->flushAction($info);
            unset($info);
            unset($infoForm);
            $info = new Info();
            $form = $this->createForm(new InfoType(), $info);
        }

        return [
            'Form' => $form->createView(),
            'calibration' => $calibration
        ];
    }

    /**
     * @Route("/updateInfo/{id}", name="updateInfo")
     * @Template()
     */
    public function updateInfoAction(Request $request, $id)
    {
        //Checks if the user has admin rights
        $this->checkForAdminAction();

        $em = $this->getEM();
        $info = $em->getRepository('AppBundle:Info')->find($id);

        $form = $this->createForm(new InfoType(), $info);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($info);
            return $this->redirectToRoute('showCalibration', ['id' => $info->getCalibration()->getId()]);
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
        //Checks if the user has admin rights
        $this->checkForAdminAction();

        $em = $this->getEM();
        $calibration = $em->getRepository('AppBundle:Calibration')->find($id);

        $form = $this->createForm(new CalibrationType(), $calibration);
        $form->handleRequest($request);

        if(!$id)
        {
            throw $this->createNotFountException('There is no Calibration with that id');
        }
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
     * @Template()
     */
    public function createUnitAction(Request $request)
    {
        //Checks if the user has admin rights
        $this->checkForAdminAction();

        $unit = new Unit();

        $form = $this->createForm(new UnitType(), $unit);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($unit);
            unset($unit);
            unset($form);
            $unit = new Unit();
            $form = $this->createForm(New UnitType(), $unit);
        }

        return [
            'Form' => $form->createView(),
        ];

    }

    /**
     * @Route("createPrefix", name="createPrefix")
     * @Template()
     */

    public function createPrefixAction(Request $request)
    {
        //Checks if the user has admin rights
        $this->checkForAdminAction();

        $prefix = new Prefix();
        $form = $this->createForm(new PrefixType(), $prefix);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($prefix);
            unset($prefix);
            unset($form);
            $prefix = new Prefix();
            $form = $this->createForm(new PrefixType(), $prefix);
        }

        return [
            'Form' => $form->createView()
        ];

    }

    /**
     * @Route("/updatePrefix/{id}", name="updatePrefix")
     * @Template()
     */
    public function updatePrefixAction(Request $request, $id)
    {
        //Checks if the user has admin rights
        $this->checkForAdminAction();

        $em = $this->getEM()->getRepository('AppBundle:Prefix');
        $prefix = $em->find($id);

        $form = $this->createForm(new PrefixType(), $prefix);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($prefix);
            return $this->redirectToRoute('showAllPrefix');
        }

        return[
            'Form' => $form->createView()
        ];

    }

    /**
     * @Route("/showAllPrefix", name="showAllPrefix")
     * @Template()
     */

    public function showAllPrefixAction()
    {
        $em = $this->getEM()->getRepository('AppBundle:Prefix');
        $prefix = $em->findAll();


        return[
            'prefix' => $prefix
        ];
    }



    /**
     * @Route("/updateUnit/{id}", name="updateUnit")
     * @Template()
     */

    public function updateUnitAction(Request $request, $id)
    {
        //Checks if the user has admin rights
        $this->checkForAdminAction();

        $em = $this->getEM()->getRepository('AppBundle:Unit');
        $unit = $em->find($id);

        $form = $this->createForm(new UnitType(), $unit);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($unit);
            return $this->redirectToRoute('showAllUnits');
        }

        return [
            'Form' => $form->createView()
        ];

    }

    /**
     * @Route("/showAllUnits", name="showAllUnits")
     * @Template()
     */
    public function showAllUnitsAction()
    {
        $em = $this->getEM()->getRepository('AppBundle:Unit');
        $unit = $em->findAll();


        return [
          'units' => $unit
        ];

    }

    /**
     * @Route("/upcomingCalibrations", name="showUpcomingCalibrations")
     * @Template()
     */

    public function upcomingCalibrationsAction()
    {
        $em = $this->getEM()->getRepository('AppBundle:Equipment');
        $calibrations = $em->getUpcomingCalibrations();

        return [
            'equipment' => $calibrations
        ];

    }

    // Checks if the user has admin rights
    public function checkForAdminAction()
    {
        $user = $this->getUser();

        //Queries the database to check if the user has the role: ROLE_ADMIN
        if(!$user->hasRole('ROLE_ADMIN'))
        {
            throw new NotFoundHttpException('You have to be an admin to access this page');
        }

        return $user;
    }

    public function flushAction($data)
    {
        $em = $this->getEM();

        $em->persist($data);
        $em->flush();

    }

}