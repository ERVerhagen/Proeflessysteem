<?php

namespace ProeflesBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ProeflesBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
