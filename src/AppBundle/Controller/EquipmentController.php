<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipment;
use AppBundle\Entity\Classification;
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

//        return $this->render('AppBundle::equipmentData.html.twig', array('equipmentDataForm' => $equipmentDataForm->createView()));
        return [
            'equipmentForm' => $equipmentForm->createView()
        ];

    }




    /**
     * @Route("/createClassification", name="addClassification")
     */

    public function addEquipmentTypeAction(Request $request)
    {
        $Classification = new Classification();

        $ClassificationForm = $this->createForm(new ClassificationType(), $Classification);
        $ClassificationForm->handleRequest($request);

        if($ClassificationForm->isValid())
        {
            $this->flushAction($Classification);
        }

        return $this->render('AppBundle::addType.html.twig', ['classificationTypeForm' => $ClassificationForm->createView()]);
    }




    public function flushAction($data)
    {
        $em = $this->getEM();

        $em->persist($data);
        $em->flush();

    }

    /**
     * @Route("/updateEquipment/{id}", name="updateEquipment")
     */

    public function updateEquipmentAction(Request $request, $id)
    {

        $em = $this->getEM();
        $equipment = $em->getRepository('AppBundle:EquipmentData')->find($id);

        $equipmentDataForm = $this->createForm(new EquipmentDataType(), $equipment);
        $equipmentDataForm->handleRequest($request);


        if(!$id)
        {
            throw $this->createNotFountException('There is no product with that id');
        }
        if($equipmentDataForm->isValid())
        {
            $em->flush($equipment);
        }

        return $this->render('AppBundle::updateEquipment.html.twig', ['equipmentDataForm' =>  $equipmentDataForm->createView(), 'equipment' => $equipment]);
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




    /**
     * @Route("/test", name="testPage")
     */

    public function testViews()
    {
        $em = $this->getEM()->getRepository('AppBundle:EquipmentData');
        $equipment = $em->findAll();


        return $this->render('AppBundle::testView.html.twig', ['equipment' => $equipment]);
    }


}