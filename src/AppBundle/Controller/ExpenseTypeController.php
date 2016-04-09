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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ExpenseTypeController extends Controller
{
  /**
   * @Route("/expense/")
   * @Template("default/index.html.twig")
   */
  public function indexAction()
  {
    $em = $this->getDoctrine()->getManager();
    $entities = $em->getRepository('AppBundle:ExpenseType')->findAll();
    return array("entity"=>$entities);

  }


  /**
   * @Route("/expense/create")
   * @Template("default/index.html.twig")
   */
  public function createAction(Request $request)
  {
    $category = new ExpenseUser();
    $form = $this->createFormBuilder($category)
      ->add('expenseId', IntegerType::class)
      ->add('user_id', IntegerType::class)
      ->add('name', TextType::class)
      ->getForm();

    echo '<pre>';
    print_r($request);
    echo '</pre>';

    exit;

    $form->handleRequest($request);
    if(!$form->isValid()){
      $em = $this->getDoctrine()->getManager();
      $em->persist($category);
      $em->flush();
    }
    return $this->redirect('./');

  }
}

?>