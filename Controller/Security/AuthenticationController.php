<?php

namespace Fsb\Bundle\ProxyBundle\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthenticationController extends Controller
{
	public function loginAction()
	{
		$authenticationUtils = $this->get('security.authentication_utils');

		return $this->render('FsbProxyBundle:Security:login.html.twig', array(
			'last_username' => $authenticationUtils->getLastUsername(),
			'error'         => $authenticationUtils->getLastAuthenticationError(),
		));
	}
}
