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
     * @Route("/createEquipment", name="createEquipment")
     * @Template()
     */

    public function addEquipmentAction(Request $request)
    {
        $equipment = new Equipment();

        $form = $this->createForm(new EquipmentType(), $equipment);
        $form->handleRequest($request);


        if($form->isValid())
        {
            $this->flushAction($equipment);
            unset($equipment);
            unset($equipmentForm);
            $equipment = new Equipment();
            $form = $this->createForm(new EquipmentType(), $equipment);
        }

        return [
            'Form' => $form->createView()
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
            throw $this->createNotFountException('There is no equipment with that id');
        }
        if($Form->isValid())
        {
            $em->flush($equipment);
            return $this->redirectToRoute('showEquipment', ['id' => $equipment->getId()]);
        }

        return[
            'Form' => $Form->createView(),
            'equipment' => $equipment
        ];
    }




    /**
     * @Route("/createType", name="createType")
     * @Template()
     */

    public function createClassificationAction(Request $request)
    {
        $classification = new Classification();

        $form = $this->createForm(new ClassificationType(), $classification);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($classification);
            unset($classification);
            unset($form);
            $classification = new Classification();
            $form = $this->createForm(new ClassificationType(), $classification);
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


    /**
     * @Route("/overview", name="overview")
     * @Template()
     */

    public function showAllEquipmentAction()
    {
        $equipment = $this->getEM()->getRepository('AppBundle:Equipment')
            ->findAllEquipment();


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
     * @Route("/equipment/{id}", name="showEquipment")
     * @Template()
     */

    public function showEquipmentAction($id)
    {
        $em = $this->getEM()->getRepository('AppBundle:Equipment');
        $emcal = $this->getEM()->getRepository('AppBundle:Calibration');

        $calibration = $emcal->findByEquipment($id);
        $equipment = $em->find($id);
        $type = $em->findEquipmentJoinedWithTypes($id);

        if(!$equipment)
        {
            throw $this->createNotFoundException('There is no equipment with that id');
        }

        return[
            'equipment' => $equipment,
            'calibration' => $calibration,
            'types' => $type
        ];
    }


    /**
     * @Route("/test", name="testPage")
     */

    public function testViews()
    {
        $em = $this->getEM()->getRepository('AppBundle:Equipment');
        $types = $em->findEquipmentJoinedWithTypes(5);



        return $this->render('AppBundle::testView.html.twig', ['types' => $types]);
    }


}