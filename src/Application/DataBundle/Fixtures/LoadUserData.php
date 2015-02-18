<?php

namespace Application\DataBundle\Fixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    const MAX_ENTITIES_IN_MEMORY = 100;
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var ContainerInterface
     */
    private $container;

    private function addUser($id, $email, $username, $loginCount, $firstname, $lastname, $patronymic, $phone)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();

        $user->setId($id)
            ->setPlainPassword('password')
            ->setEmail($email)
            ->setUsername($username)
            ->setLoginCount($loginCount)
            ->setFirstname($firstname)
            ->setLastname($lastname)
            ->setPatronymic($patronymic)
            ->setPhone($phone)
            ->setEnabled(true);

        $userManager->updateUser($user, false);
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        require_once __DIR__ . '/../Resources/data/users.php';

        $this->manager = $manager;

        $n = 0;
        foreach ($d3_users as $user) {
            $n++;
            $this->addUser(
                $user['id'],
                $user['email'],
                $user['username'],
                $user['logins'],
                $user['first_name'],
                $user['second_name'],
                $user['father_name'],
                $user['mob_number']
            );
            if ($n === static::MAX_ENTITIES_IN_MEMORY) {
                $this->manager->flush();
                $this->manager->clear();
                break;
            }
        }
        $this->manager->flush();
    }
}
