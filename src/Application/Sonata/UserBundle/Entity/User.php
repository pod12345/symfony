<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;

/**
 * This file has been generated by the Sonata EasyExtends bundle ( http://sonata-project.org/bundles/easy-extends )
 *
 * References :
 *   working with object : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 *
 * @author <yourname> <youremail>
 */
class User extends BaseUser
{
    /**
     * @var integer $id
     */
    protected $id;

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
     * Sets the email.
     *
     * @param string $email
     * @return User
    */
    public function setEmail($email)
    {
        $this->setUsername($email);

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
        $this->setUsernameCanonical($emailCanonical);

        return parent::setEmailCanonical($emailCanonical);
    }
}
