<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\ExpenseType;
use AppBundle\Entity\ExpenseSubCategory;
use AppBundle\Entity\ExpenseUser;
use AppBundle\Entity\ExpenseUsers;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ExpenseTypeController extends Controller
{
  /**
   * @Route("/expense/")
   * @Template("default/index.html.twig")
   */
  public function indexAction()
  {
    $ex = new ExpenseUsers();
    $form = $this->createFormBuilder($ex)
      ->add('user_id', HiddenType::class, array("attr"=>array("value"=>"5")))
      ->add('name', TextType::class, array('label'=>"New Category Name", 'required'=>true, 'attr'=>array('class'=>'form-control')))
      ->add('submit', SubmitType::class, array('label'=>'Add a New Category', 'attr'=>array('class'=>'btn btn-sm btn-primary')))
      ->getForm();

    $em = $this->getDoctrine()->getManager();
    $entities = $em->getRepository('AppBundle:ExpenseUsers')->findByUser_Id(5);
    return array("entity"=>$entities, 'form'=>$form->createView());
  }


  /**
   * @Route("/expense/create")
   * @Template("default/index.html.twig")
   */
  public function createAction(Request $request)
  {
    $ex = new ExpenseUsers();
    $form = $this->createFormBuilder($ex)
      ->add('user_id', HiddenType::class)
      ->add('name', TextType::class, array('label'=>"New Category Name", 'required'=>true, 'attr'=>array('class'=>'form-control')))
      ->add('submit', SubmitType::class, array('label'=>'Add a New Category', 'attr'=>array('class'=>'btn btn-sm btn-primary')))
      ->getForm();

    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($ex);
      $em->flush();
    }
    else{
      echo "asdf";
    }

    exit;
    return $this->redirect('./');

  }


  private function checkConstraints()
  {

  }
}

?>