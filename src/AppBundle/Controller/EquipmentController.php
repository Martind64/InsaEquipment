<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Document;
use AppBundle\Entity\Equipment;
use AppBundle\Entity\Classification;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Repository\CalibrationRepository;
use AppBundle\Form\Type\EquipmentType;
use AppBundle\Form\Type\ClassificationType;
use AppBundle\Form\Type\DocumentType;
use AppBundle\Form\Type\SearchType;
use DateInterval;
use DatePeriod;
use DateTime;
use Symfony\Component\DomCrawler\Link;
use Symfony\Component\Finder\Finder;
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
    //Action for adding equipment to the database
    public function addEquipmentAction(Request $request)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //Makes an instance of the Equipment entity
        $equipment = new Equipment();

        //Creates the form and passes the empty $equipment variable
        $form = $this->createForm(new EquipmentType(), $equipment);

        //Handles the form request
        $form->handleRequest($request);

        // Checks to see if the form is valid
        if($form->isValid())
        {
            // Calls the flushAction which (Look in the bottom of the code)
            $this->flushAction($equipment);
            //empties the $equipment and form variable
            unset($equipment);
            unset($form);
            //Creates a new instance of equipment and a new form
            $equipment = new Equipment();
            $form = $this->createForm(new EquipmentType(), $equipment);
        }

        // Creates the view and sends the form variable to the template
        return [
            'Form' => $form->createView()
        ];

    }

    /**
     * @Route("/updateEquipment/{id}", name="updateEquipment")
     * @Template()
     */
    //Action for updating equipment in the database
    public function updateEquipmentAction(Request $request, $id)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //Calls getEM which is a method in ControllerBase.php which calls getDoctrine->getEntityManager()
        $em = $this->getEM();
        //gets the Equipment Entity and query for the ID
        $equipment = $em->getRepository('AppBundle:Equipment')->find($id);

        //Creates the form and passes the equipment variable containing all the fields that was just retrieved
        $Form = $this->createForm(new EquipmentType(), $equipment);

        //Handles the form request
        $Form->handleRequest($request);

        //Checks if the id exists. If not, throws and exception
        if(!$id)
        {
            throw $this->createNotFountException('There is no equipment with that id');
        }

        //Checks to see if the form is valid and if it is, it saves the data to the database.
        if($Form->isValid())
        {
            $em->flush($equipment);
            //Redirects to the Route showEquipmentAction which renders
            //the view for the equipment with the id that was just updated
            return $this->redirectToRoute('showEquipment', ['id' => $equipment->getId()]);
        }

        // Creates the view and sends the form variable to the template
        // Aso passes equipment to show in the view what equipment is being updated
        return[
            'Form' => $Form->createView(),
            'equipment' => $equipment
        ];
    }



    /**
     * @Route("/createType", name="createType")
     * @Template()
     */
    //Action for adding a Classification to the database
    public function createClassificationAction(Request $request)
    {
        //Checks if the user has admin rights (Check bottom code)
        $this->checkForAdminAction();

        //Makes an instance of the Classification entity
        $classification = new Classification();

        //Creates the form and passes the empty $classification variable
        $form = $this->createForm(new ClassificationType(), $classification);

        //Handles the form request
        $form->handleRequest($request);

        // Checks to see if the form is valid
        if($form->isValid())
        {
            // Calls the flushAction which (Look in the bottom of the code)
            $this->flushAction($classification);

            //empties the $classification and $form variable
            unset($classification);
            unset($form);

            //Creates a new instance of equipment and a new form
            $classification = new Classification();
            $form = $this->createForm(new ClassificationType(), $classification);
        }

        // Creates the view and sends the form variable to the template
        return [
            'Form' => $form->createView()
        ];

    }

    /**
     * @Route("/overview", name="overview")
     * @Template()
     */
    //Action for showing all the equipment in the database
    public function showAllEquipmentAction()
    {
        //Gets the Equipment entity and queries for all equipment
        $equipment = $this->getEM()->getRepository('AppBundle:Equipment')
            ->findAllEquipment();

        //Sends an equipment variable to the template containing all rows in the Equipment Table
        return[
            'equipment' => $equipment
        ];
    }


    /**
     * @Route("/", name="homepage")
     */
    //Action for showing the homepage
    public function homePageAction()
    {
        return $this->render('AppBundle::homepage.html.twig');
    }

    /**
     * @Route("/equipment/{id}", name="showEquipment")
     * @Template()
     */
    //Action for showing the information on specific equipment
    public function showEquipmentAction($id)
    {
        //gets the Equipment and AppBundle Entity
        //getEM() is a method in ControllerBase.php which calls getDoctrine->getEntityManager()
        $em = $this->getEM()->getRepository('AppBundle:Equipment');
        $emcal = $this->getEM()->getRepository('AppBundle:Calibration');

        //Queries
        $calibration = $emcal->findAllCalibrations($id);
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
     * @Route("/showAllTypes", name="showAllTypes")
     * @Template()
     */
    public function showAllTypesAction()
    {
        $em = $this->getEM()->getRepository('AppBundle:Classification');
        $types = $em->findAll();

        return [
            'types' => $types
        ];

    }

    /**
     * @Route("/updateType/{id}", name="updateType")
     * @Template()
     */
    public function updateTypeAction(Request $request, $id)
    {
        $this->checkForAdminAction();

        $em = $this->getEM()->getRepository('AppBundle:Classification');
        $type = $em->find($id);

        $form = $this->createForm(new ClassificationType(), $type);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $this->flushAction($type);
            return $this->redirectToRoute('showAllTypes');
        }

        return [
            'Form' => $form->createView()
        ];

    }

    /**
     * @Route("/createPath", name="createPath")
     * @Template()
     */
    public function createPathAction(Request $request)
    {
        //Checks if the user has admin rights
        $this->checkForAdminAction();

        $path = new Document();

        $form = $this->createForm(new DocumentType(), $path);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $file = $this->getFilePathAction($path);
            $this->flushAction($file);
        }

        return [
            'Form' => $form->createView()
        ];
    }

    // Methods used in my route actions

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

    /**
     * @Route("/test/", name="testPage")
     */
    //Used this function to try and test new things
    public function testViewsAction()
    {
        $finder = new Finder();
        $finder->files()->in('C:/Users/Martin/Documents/Dbz');

        foreach($finder as $file)
        {
            // Dump the absolute path
            var_dump($file->getRealpath());

            // Dump the relative path to the file, omitting the filename
            var_dump($file->getRelativePath());

            // Dump the relative path to the file
            var_dump($file->getRelativePathname());
        }
        return new Response($file);

    }





}