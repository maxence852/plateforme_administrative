<?php

namespace Tfe\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TfeAdminBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
