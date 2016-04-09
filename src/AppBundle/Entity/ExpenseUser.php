<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExpenseUser
 *
 * @ORM\Table(name="expense_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExpenseUserRepository")
 */
class ExpenseUser
{
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
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="expenseId", type="integer")
     */
    private $expenseId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
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
     * Set userId
     *
     * @param integer $userId
     *
     * @return ExpenseUser
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set expenseId
     *
     * @param integer $expenseId
     *
     * @return ExpenseUser
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
     * @return ExpenseUser
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
}

