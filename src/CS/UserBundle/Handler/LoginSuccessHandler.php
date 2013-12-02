<?php

namespace CS\UserBundle\Handler;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
	
	protected $router;
	protected $security;
	
	public function __construct(Router $router, SecurityContext $security)
	{
		$this->router = $router;
		$this->security = $security;
	}
	
	public function onAuthenticationSuccess(Request $request, TokenInterface $token)
	{
		
		if ($this->security->isGranted('ROLE_CLIENT') || $this->security->isGranted('ROLE_USER') ){
			// redirect the user to where they were before the login process begun.
			$referer_url = $request->headers->get('referer');
						
			$response = new RedirectResponse($referer_url);		
		}
		elseif ($this->security->isGranted('ROLE_ADMIN'))
		{
			// redirection vers la page admin.
			$response = new RedirectResponse($this->router->generate('/admin'));
		} 
		elseif ($this->security->isGranted('ROLE_FOURNISSEUR'))
		{
			// redirection vers la page fournisseur 
			$response = new RedirectResponse($this->router->generate('fournisseur'));

		}
			
		return $response;
	}
	
}