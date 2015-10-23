<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipment;
use AppBundle\Entity\Classification;
use AppBundle\Entity\Repository\CalibrationRepository;
use AppBundle\Form\Type\EquipmentType;
use AppBundle\Form\Type\ClassificationType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class EquipmentController extends ControllerBase
{
    /**
     * @Route("/createEquipment", name="addEquipmentData")
     * @Template()
     */

    public function addEquipmentAction(Request $request)
    {
        $equipment = new Equipment();

        $equipmentForm = $this->createForm(new EquipmentType(), $equipment);
        $equipmentForm->handleRequest($request);


        if($equipmentForm->isValid())
        {
            $this->flushAction($equipment);
        }

        return [
            'equipmentForm' => $equipmentForm->createView()
        ];

    }

    /**
     * @Route("/updateEquipment/{id}", name="updateEquipment")
     * @Template()
     */

    public function updateEquipmentAction(Request $request, $id)
    {

        $em = $this->getEM();
        $equipment = $em->getRepository('AppBundle:Equipment')->find($id);

        $Form = $this->createForm(new EquipmentType(), $equipment);
        $Form->handleRequest($request);


        if(!$id)
        {
            throw $this->createNotFountException('There is no product with that id');
        }
        if($Form->isValid())
        {
            $em->flush($equipment);
        }

        return[
            'Form' => $Form->createView(),
            'equipment' => $equipment
        ];
    }




    /**
     * @Route("/createType", name="addClassification")
     * @Template()
     */

    public function createClassificationAction(Request $request)
    {
        $Classification = new Classification();

        $Form = $this->createForm(new ClassificationType(), $Classification);
        $Form->handleRequest($request);

        if($Form->isValid())
        {
            $this->flushAction($Classification);
        }

        return [
            'Form' => $Form->createView()
        ];

    }




    public function flushAction($data)
    {
        $em = $this->getEM();

        $em->persist($data);
        $em->flush();

    }


    /**
     * @Route("/overview", name="overview")
     * @Template()
     */

    public function showAllEquipmentAction()
    {
        $equipment = $this->getEM()->getRepository('AppBundle:Equipment')
            ->findall();


        return[
            'equipment' => $equipment
        ];
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
     * @Template()
     */

    public function showEquipmentAction($id)
    {
        $em = $this->getEM()->getRepository('AppBundle:Equipment');
        $emcal = $this->getEM()->getRepository('AppBundle:Calibration');

        $calibration = $emcal->findByEquipment($id);
        $equipment = $em->find($id);


        if(!$equipment)
        {
            throw $this->createNotFoundException('There is no equipment with that id');
        }

        return[
            'equipment' => $equipment,
            'calibration' => $calibration
        ];



    }


    /**
     * @Route("/test/{id}", name="testPage")
     */

    public function testViews($id)
    {
        $em = $this->getEM()->getRepository('AppBundle:Calibration');
        $calibration = $em->findCalibrationJoinedWithInfoUnitPrefix($id);



        return $this->render('AppBundle::testView.html.twig', ['id' => $calibration]);
    }


}