<?php

/**
 * This file is part of the Podzamenu project.
 *
 * (c) Mark Tertishniy mtertishniy@gmail.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;

class User extends BaseUser
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var integer $loginCount
     */
    protected $loginCount = 0;

    /**
     * @var string $patronymic
     */
    protected $patronymic;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Sets the email.
     *
     * @param string $email
     * @return User
    */
    public function setEmail($email)
    {
        if (empty($this->getUsername())) {
            $this->setUsername($email);
        }

        return parent::setEmail($email);
    }

    /**
     * Set the canonical email.
     *
     * @param string $emailCanonical
     * @return User
     */
    public function setEmailCanonical($emailCanonical)
    {
        if (empty($this->getUsername())) {
            $this->setUsernameCanonical($emailCanonical);
        }

        return parent::setEmailCanonical($emailCanonical);
    }

    /**
     * Sets the number of times the user logged in.
     *
     * @param integer $loginCount
     * @return User
    */
    public function setLoginCount($loginCount)
    {
        $this->loginCount = $loginCount;

        return $this;
    }

    /**
     * Get the number of times the user logged in.
     *
     * @return integer
     */
    public function getLoginCount()
    {
        return $this->loginCount;
    }

    /**
     * @return string
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * @param string $patronymic
     * @return User
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        parent::setFirstname($firstname);

        return $this;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        parent::setLastname($lastname);

        return $this;
    }

    /**
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        parent::setPhone($phone);

        return $this;
    }
}
