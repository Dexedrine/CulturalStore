<?php

namespace CS\UserBundle\Handler;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
	
	protected $router;
	protected $security;
	protected $session;
	
	public function __construct(Router $router, SecurityContext $security, Session $session)
	{
		$this->router = $router;
		$this->security = $security;
		$this->session = $session;
	}
	
	public function onAuthenticationSuccess(Request $request, TokenInterface $token)
	{
		
		if ($this->security->isGranted('ROLE_CLIENT')){
			// redirect the user to where they were before the login process begun.
			$referer_url = $request->headers->get('referer');
			
			if( ! $this->session->has('satus') || $this->session->get('status') == 'nonconnecte' ){
				$this->session->set('satus', 'connecte');
			}
			
			$response = new RedirectResponse($referer_url);		
		}
		elseif ($this->security->isGranted('ROLE_ADMIN'))
		{
			// redirection vers la page admin.
			$response = new RedirectResponse($this->router->generate('cs_admin_homepage'));
		} 
		elseif ($this->security->isGranted('ROLE_FOURNISSEUR'))
		{
			// redirection vers la page fournisseur 
			$response = new RedirectResponse($this->router->generate('cs_fournisseur_homepage'));

		}
			
		return $response;
	}
	
}