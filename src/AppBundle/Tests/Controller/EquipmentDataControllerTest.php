<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Entity\CalibrationInfo;
use AppBundle\Entity\CalibrationPoint;
use AppBundle\Entity\EquipmentData;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EquipmentDataControllerTest extends WebTestCase
{
    public function testAddAction()
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

        $calibrationPoint = new CalibrationPoint();
        $calibrationPoint->setMeasurement(50);
        $calibrationPoint->setPrefix('Kilo');
        $calibrationPoint->setUnit('AAc');

        $calibrationInfo = new CalibrationInfo();
        $calibrationInfo->setActualUncertainty(1);
        $calibrationInfo->setAdjustmentLimit(2);
        $calibrationInfo->setComment('ikke godt nok');
        $calibrationInfo->setDeviation(0.1);
        $calibrationInfo->setLabMeasurement(123);
        $calibrationInfo->setUncertaintyRequests('n/a');
        $calibrationInfo->setUut('n/a');
        $calibrationInfo->setEquipmentData($equipmentData);
        $calibrationInfo->setCalibrationPoint($calibrationPoint);


        $em =  $this->getEM();

        $em->persist($equipmentData);
        $em->persist($calibrationInfo);
        $em->persist($calibrationPoint);

        $em->flush();

        return new Response('The Data was submitted');
    }
}