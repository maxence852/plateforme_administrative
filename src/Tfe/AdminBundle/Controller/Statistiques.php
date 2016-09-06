<?php
/**
 * Created by PhpStorm.
 * User: maxence
 * Date: 05/09/2016
 * Time: 23:12
 */

namespace Tfe\AdminBundle\Controller;


class Statistiques
{
 private $nbUsers;

    /**
     * @return mixed
     */
    public function getNbUsers()
    {
        return $this->nbUsers;
    }

    /**
     * @param mixed $nbUsers
     */
    public function setNbUsers($nbUsers)
    {
        $this->nbUsers = $nbUsers;
    }
}