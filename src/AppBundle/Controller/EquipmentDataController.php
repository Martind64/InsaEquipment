<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EquipmentData;
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

    public function addEquipmentAction()
    {
        $equipmentData = new EquipmentData();
        $equipmentData->setDescription('kalibrerer vand instrumenter');
        $equipmentData->setSerialNr('23153');
        $equipmentData->setCategory('decade Box');
        $equipmentData->setDoneBy('Leif Jensen');
        $equipmentData->setApprovedBy('Lars Christiansen');
        $equipmentData->setCategory('');
        $equipmentData->setEquipmentID('KEK31');
        $equipmentData->setLevel('high level');
        $equipmentData->setModel('something');
        $equipmentData->setPartner('n/a');
        $equipmentData->setPlacement('Jylland');


        $calibrationInfo = new CalibrationInfo();
        $calibrationInfo->setActualUncertainty(1);
        $calibrationInfo->setAdjustmentLimit(2);
        $calibrationInfo->setComment('ikke godt nok');
        $calibrationInfo->setDeviation(0.1);
        $calibrationInfo->setReferenceNr(123);
        $calibrationInfo->setUncertaintyRequests('n/a');
        $calibrationInfo->setUut('n/a');
        $calibrationInfo->setEquipmentData($equipmentData);

        $calibrationPoint = new CalibrationPoint();
        $calibrationPoint->setMeasurement(50);
        $calibrationPoint->setPrefix('Kilo');
        $calibrationPoint->setUnit('AAc');
        $calibrationPoint->setCalibrationInfo($calibrationInfo);

        $em =  $this->getEM();

        $em->persist($equipmentData);
        $em->persist($calibrationInfo);
        $em->persist($calibrationPoint);

        $em->flush();

        return new Response('The Data was submitted');



    }

}