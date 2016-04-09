<?php

namespace AppBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ExpenseSubCategory
 *
 * @ORM\Table(name="expense_sub_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExpenseSubCategoryRepository")
 */
class ExpenseSubCategory
{

    private $expenseType;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="expense_id", type="integer", unique=true)
     */
    private $expenseId;

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
     * Set expenseId
     *
     * @param integer $expenseId
     *
     * @return ExpenseSubCategory
     */
    public function setExpenseId($expenseId)
    {
        $this->expenseId = $expenseId;

        return $this;
    }

    /**
     * Get expenseId
     *
     * @return int
     */
    public function getExpenseId()
    {
        return $this->expenseId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ExpenseSubCategory
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
     * set expenseTypeID
     *
     * @return null
     */
    public function setExpenseType(\AppBundle\Entity\ExpenseType $e)
    {
        $this->expenseType = $e;
    }

    public function getExpenseTypes(\AppBundle\Entity\ExpenseType $e)
    {
        return $this->expenseType;
    }
}

