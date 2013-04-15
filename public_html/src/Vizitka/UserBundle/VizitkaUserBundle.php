<?php

namespace Vizitka\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VizitkaUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
