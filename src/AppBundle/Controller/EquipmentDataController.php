<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EquipmentData;
use AppBundle\Form\Type\EquipmentDataType;
use AppBundle\Entity\CalibrationInfo;
use AppBundle\Entity\CalibrationPoint;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class EquipmentDataController extends ControllerBase
{
    /**
     * @Route("/", name="AddRoute")
     */

    public function addEquipmentAction(Request $request)
    {
        $equipmentData = new EquipmentData();

        $form = $this->createForm(new EquipmentDataType(), $equipmentData);
        $form->handleRequest($request);


        if($form->isValid())
        {
            return new Response('the form was valid');

        }

        return $this->render('equipmentData.html.twig', array('form' => $form->createView()));




    }



}