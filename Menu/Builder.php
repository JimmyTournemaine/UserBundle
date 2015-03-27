<?php

namespace JT\UserBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{   
    public function userMenu(FactoryInterface $factory, array $options)
    {
    	$security = $this->container->get('security.context');
    	
    	$menu = $factory->createItem('root', array(
            'navbar' => true,
        	'pull-right' => true
        ));
    
    	if($security->isGranted('IS_AUTHENTICATED_REMEMBERED')){
    		
    		$user = $menu->addChild('user', array(
    				'label' => $security->getToken()->getUser()->getUsername(),
    				'dropdown' => true,
    				'caret' => true
    		));
    		
	    		$user->addChild('menu.profile.header', array(
	    				'dropdown-header' => true));
	    		
	    		$user->addChild('menu.profile.show', array(
	    				'route' => 'fos_user_profile_show',
	    				'icon'	=> 'user'
	    		));
	    		
	    		$user->addChild('menu.profile.edit', array(
	    				'route' => 'fos_user_profile_edit',
	    				'icon'	=> 'edit'
	    		));
    		
    		$menu->addChild('menu.logout', array(
    				'route' => 'fos_user_security_logout',
    				'icon'	=> 'log-out'
    		));
    	} else {

    		$menu->addChild('menu.login', array(
    				'route' => 'fos_user_security_login',
    				'icon' => 'log-in'
    		));
    	}
		
    	return $menu;
    }
}