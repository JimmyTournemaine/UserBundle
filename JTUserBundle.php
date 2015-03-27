<?php

namespace JT\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class JTUserBundle extends Bundle
{
	public function getParent()
	{
	    return 'FOSUserBundle';
	}
}
