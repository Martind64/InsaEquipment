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
    //Action for saving a calibration to the database
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/createCalibration", name="createCalibration")
     * @Template()
     */
    public function createCalibrationAction(Request $request)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //Makes an instance of the Calibration entity
        $calibration = new Calibration();

        //Creates the form and passes the empty $calibration variable
        $Form = $this->createForm(new CalibrationType(), $calibration);

        //Handles the form request
        $Form->handleRequest($request);

        // Checks to see if the form is valid if it is, saves the data to the database
        if($Form->isValid())
        {
            // Calls the flushAction which (Look in the bottom of the code)
            $this->flushAction($calibration);
            //Redirects to the Action addInfo to be able to add calibration info to the Calibration
            return $this->redirectToRoute('addInfo', ['id' => $calibration->getId()]);
        }

        //Creates the view and sends the form variable to the template
        return[
            'Form' => $Form->createView()
        ];
    }
    //------------------------------------------------------------------------------------------



    //Action for saving the calibration info to the database
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/createInfo/{id}", name="addInfo")
     * @Template()
     */
    public function addInfoAction(Request $request, $id)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //Gets the Info Entity and queries the database for all calibrations where id=$id
        //getEM() is a method in ControllerBase.php which calls getDoctrine->getEntityManager()
        $em = $this->getEM();
        $calibration = $em->getRepository('AppBundle:Calibration')->find($id);

        //Makes an instance of the Calibration entity
        $info = new Info();

        //Creates the form and passes the empty $calibration variable
        $form = $this->createForm(new InfoType(), $info);

        //Handles the form request
        $form->handleRequest($request);

        // Checks to see if the calibration exist, if not it throws and exception
        if(!$id)
        {
            throw $this->createNotFoundException('No calibration with that id exists');
        }

        //Checks to see if the form is valid if it is, saves the data to the database and prepares
        //for the user to save more info on the same calibration
        if($form->isValid())
        {
            //Sets the calibration field in Info to $calibration so the Info is saved on the foreign key
            $info->setCalibration($calibration);
            // Calls the flushAction which (Look in the bottom of the code)
            $this->flushAction($info);
            //empties the $info and form variable
            unset($info);
            unset($infoForm);
            //Creates a new instance of equipment and a new form
            $info = new Info();
            $form = $this->createForm(new InfoType(), $info);
        }

        //Creates the view and sends the form variable to the template
        //Also passes the calibration variable so a button can be made in the view directing the user back to the
        //Show calibration view
        return [
            'Form' => $form->createView(),
            'calibration' => $calibration
        ];
    }
    //------------------------------------------------------------------------------------------



    //Action for updating calibration info
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/updateInfo/{id}", name="updateInfo")
     * @Template()
     */
    public function updateInfoAction(Request $request, $id)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //Calls getEM which is a method in ControllerBase.php which calls getDoctrine->getEntityManager()
        $em = $this->getEM();
        //gets the Info Entity and find all Info with where info.id = $id
        $info = $em->getRepository('AppBundle:Info')->find($id);

        //Creates the form and passes the $info variable containing all the fields that was just retrieved
        $form = $this->createForm(new InfoType(), $info);

        //Handles the form request
        $form->handleRequest($request);

        //Checks if the id exists. If not, throws and exception
        if(!$id)
        {
            throw $this->createNotFountException('There is no equipment with that id');
        }

        //Checks to see if the form is valid and if it is, it saves the data to the database.
        if($form->isValid())
        {
            // Calls the flushAction which (Look in the bottom of the code)
            $this->flushAction($info);
            //Redirects to the showCalibrationAction which renders
            //the view for the calibration where the info was just updated
            return $this->redirectToRoute('showCalibration', ['id' => $info->getCalibration()->getId()]);
        }

        // Creates the view and sends the form variable to the template
        return [
            'Form' => $form->createView()
        ];
    }
    //------------------------------------------------------------------------------------------



    //Action for updating a calibration
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/updateCalibration/{id}", name="updateCalibration")
     * @Template()
     */
    public function updateCalibrationAction(Request $request, $id)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //Calls getEM which is a method in ControllerBase.php which calls getDoctrine->getEntityManager()
        $em = $this->getEM();

        //gets the Info Entity and find all Info with where info.id = $id
        $calibration = $em->getRepository('AppBundle:Calibration')->find($id);

        //Creates the form and passes the $calibration variable containing all the fields that was just retrieved
        $form = $this->createForm(new CalibrationType(), $calibration);
        $form->handleRequest($request);

        //Checks if the id exists. If not, throws and exception
        if(!$id)
        {
            throw $this->createNotFountException('There is no Calibration with that id');
        }

        //Checks to see if the form is valid and if it is, it saves the data to the database.
        if($form->isValid())
        {
            // Calls the flushAction which (Look in the bottom of the code)
            $this->flushAction($calibration);
            //Redirects to the showCalibrationAction which renders
            //the view for the calibration that was just updated
            return $this->redirectToRoute('showCalibration', ['id' => $calibration->getId()]);
        }

        // Creates the view and sends the form variable to the template
        return [
            'Form' => $form->createView()
        ];
    }
    //------------------------------------------------------------------------------------------



    //Action for showing a calibration
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/calibration/{id}", name="showCalibration")
     * @Template()
     */
    public function showCalibrationAction($id)
    {
        //Gets the Calibration Entity and finds
        //all the info related to the calibration where calibration id=$id
        //The finCalibrationInfo method resides in /Entity/Repository/CalibrationRepository folder
        $em = $this->getEM()->getRepository('AppBundle:Calibration');
        $info = $em->findCalibrationInfo($id);

        //Finds all calibrations where the calibration id=$id
        $calibration = $em->find($id);


        // sends the variables to the view so the data can be accessed and shown
        return [
            'info'=> $info,
            'calibration' => $calibration
        ];
    }
    //------------------------------------------------------------------------------------------



    //Action for creating a unit
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/createUnit", name="createUnit")
     * @Template()
     */
    public function createUnitAction(Request $request)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //Makes an instance of the Unit entity
        $unit = new Unit();

        //Creates the form and passes the empty $unit variable
        $form = $this->createForm(new UnitType(), $unit);

        //Handles the form request
        $form->handleRequest($request);

        //Checks to see if the form is valid if it is, saves the data to the database
        if($form->isValid())
        {
            // Calls the flushAction which (Look in the bottom of the code)
            $this->flushAction($unit);
            //empties the $unit and form variable
            unset($unit);
            unset($form);
            //Creates a new instance of Unit and a new form
            $unit = new Unit();
            $form = $this->createForm(New UnitType(), $unit);
        }

        return [
            'Form' => $form->createView(),
        ];
    }
    //------------------------------------------------------------------------------------------



    //Action for updating a unit
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/updateUnit/{id}", name="updateUnit")
     * @Template()
     */
    public function updateUnitAction(Request $request, $id)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //gets the Unit Entity and find all the units where id=$id
        //Calls getEM which is a method in ControllerBase.php which calls getDoctrine->getEntityManager()
        $em = $this->getEM()->getRepository('AppBundle:Unit');
        $unit = $em->find($id);

        //Creates the form and passes the $unit variable containing all the fields that was just retrieved
        $form = $this->createForm(new UnitType(), $unit);

        //Handles the form request
        $form->handleRequest($request);

        //Checks if the id exists. If not, throws and exception
        if(!$id)
        {
            throw $this->createNotFountException('There is no equipment with that id');
        }

        //Checks to see if the form is valid and if it is, it saves the data to the database and redirects.
        if($form->isValid())
        {
            $this->flushAction($unit);
            return $this->redirectToRoute('showAllUnits');
        }

        // Creates the view and sends the form variable to the template
        return [
            'Form' => $form->createView()
        ];
    }
    //------------------------------------------------------------------------------------------



    //Action for creating a prefix
    //------------------------------------------------------------------------------------------
    /**
     * @Route("createPrefix", name="createPrefix")
     * @Template()
     */
    public function createPrefixAction(Request $request)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //Makes an instance of the Prefix entity
        $prefix = new Prefix();

        //Creates the form and passes the empty $prefix variable
        $form = $this->createForm(new PrefixType(), $prefix);

        //Handles the form request
        $form->handleRequest($request);

        //Checks to see if the form is valid if it is, saves the data to the database
        if($form->isValid())
        {
            // Calls the flushAction which (Look in the bottom of the code)
            $this->flushAction($prefix);
            //empties the $prefix and form variable
            unset($prefix);
            unset($form);
            //Creates a new instance of equipment and a new form
            $prefix = new Prefix();
            $form = $this->createForm(new PrefixType(), $prefix);
        }

        // Creates the view and sends the form variable to the template
        return [
            'Form' => $form->createView()
        ];
    }
    //------------------------------------------------------------------------------------------

    //Action for updating a prefix
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/updatePrefix/{id}", name="updatePrefix")
     * @Template()
     */
    public function updatePrefixAction(Request $request, $id)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //gets the Equipment Entity and find all equipment where id=$id
        //Calls getEM which is a method in ControllerBase.php which calls getDoctrine->getEntityManager()
        $em = $this->getEM()->getRepository('AppBundle:Prefix');
        $prefix = $em->find($id);

        //Creates the form and passes the $prefix variable containing all the fields that was just retrieved
        $form = $this->createForm(new PrefixType(), $prefix);
        $form->handleRequest($request);


        //Checks if the id exists. If not, throws and exception
        if(!$id)
        {
            throw $this->createNotFountException('There is no equipment with that id');
        }

        //Checks to see if the form is valid and if it is, it saves the data to the database and redirects.
        if($form->isValid())
        {
            // Calls the flushAction which (Look in the bottom of the code)
            $this->flushAction($prefix);
            //Redirects to the showAllPrefix which renders
            //the view that shows all the Prefix
            return $this->redirectToRoute('showAllPrefix');
        }

        return[
            'Form' => $form->createView()
        ];
    }
    //------------------------------------------------------------------------------------------

    //Action for showing all prefixes
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/showAllPrefix", name="showAllPrefix")
     * @Template()
     */
    public function showAllPrefixAction()
    {
        //Gets the Prefix entity and queries for all equipment
        $em = $this->getEM()->getRepository('AppBundle:Prefix');
        $prefix = $em->findAll();

        //Sends a prefix variable to the view containing all rows in the Equipment Table
        return[
            'prefix' => $prefix
        ];
    }
    //------------------------------------------------------------------------------------------

    //Action for showing all units
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/showAllUnits", name="showAllUnits")
     * @Template()
     */
    public function showAllUnitsAction()
    {
        //Gets the Unit entity and queries for all equipment
        $em = $this->getEM()->getRepository('AppBundle:Unit');
        $unit = $em->findAll();

        //Sends an equipment variable to the view containing all rows in the Equipment Table
        return [
          'units' => $unit
        ];
    }
    //------------------------------------------------------------------------------------------

    //Action for showing all upcoming callibrations
    //------------------------------------------------------------------------------------------
    /**
     * @Route("/upcomingCalibrations", name="showUpcomingCalibrations")
     * @Template()
     */
    public function upcomingCalibrationsAction()
    {
        //Gets the Equipment Entity to access the EquipmentRepository where
        // getUpcomingCalibrations method resides
        $em = $this->getEM()->getRepository('AppBundle:Equipment');
        //Gets all calibrations within the next 60 days
        $calibrations = $em->getUpcomingCalibrations();

        //Returns the variable to the view so it can be shown in the browser
        return [
            'equipment' => $calibrations
        ];
    }
    //------------------------------------------------------------------------------------------


    //Shows exceeded calibrations
    //------------------------------------------------------------------------------------------

    /**
     * @Route("/exceededCalibrations", name="showExceededCalibrations")
     * Template()
     */
    public function exceededCalibrationsAction()
    {
        //Gets the Equipment Entity to access the EquipmentRepository where
        // getUpcomingCalibrations method resides
        $em = $this->getEM()->getRepository('AppBundle:Equipment');

        //Gets all equipment where the calibration has exceeded it's duedate
        $calibrations = $em->getExceededCalibrations();

        //Returns the variable to the view so it can be shown in the browser
        return [
            'equipment' => $calibrations
        ];
    }

    // Methods used in my route actions
    //------------------------------------------------------------------------------------------
    public function flushAction($data)
    {
        //Calls getEM which is a method in ControllerBase.php which calls getDoctrine->getEntityManager()
        $em = $this->getEM();

        //Persists the data and flush it to the database
        $em->persist($data);
        $em->flush();

    }

    // Checks if the user has admin rights
    public function checkForAdminAction()
    {
        //Get's the current user from the database
        $user = $this->getUser();

        //Queries the database to check if the user has the role: ROLE_ADMIN if not then throws and exception
        if(!$user->hasRole('ROLE_ADMIN'))
        {
            throw new NotFoundHttpException('You have to be an admin to access this page');
        }

        return $user;
    }
    //------------------------------------------------------------------------------------------

}