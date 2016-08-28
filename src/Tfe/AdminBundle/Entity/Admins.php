<?php

namespace Tfe\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Admins
 *
 * @ORM\Table(name="admins")
 * @ORM\Entity(repositoryClass="Tfe\AdminBundle\Repository\AdminsRepository")
 */
class Admins extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

}
