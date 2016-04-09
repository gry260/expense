<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ExpenseType
 *
 * @ORM\Table(name="expense_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExpenseTypeRepository")
 */
class ExpenseType
{
    private $expenseSubCatgories;

    public function __construct()
    {
        $this->expenseSubCatgories = new ArrayCollection();
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, unique=true)
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ExpenseType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Get
     *
     * @return array
     */
    public function addExpenseSubCategory(\AppBundle\Entity\ExpenseSubCategory $sub)
    {
        $this->expenseSubCatgories[] = $sub;
        return $this;
    }


    public function removeExpenseSubCategory(\AppBundle\Entity\ExpenseSubCategory $sub)
    {
        $this->expenseSubCatgories->removeElement($sub);
    }

    public function getExpenseSubCategory()
    {
        return $this->expenseSubCatgories;
    }
}

