<?php
namespace CS\UserBundle\Repository;

	
	use Doctrine\ORM\EntityRepository;
	use Symfony\Component\Security\Core\User\UserProviderInterface;
	use Symfony\Component\Security\Core\User\UserInterface;
	
	class UtilisateurRepository extends EntityRepository
	implements UserProviderInterface
	{
		public function loadUserByUsername($email) {
			return $this->getEntityManager()
			->createQuery('SELECT u FROM
CS/UserBundle:Utilisateur u
WHERE u.email = :email
OR u.email = :username')
	->setParameters(array(
			'email' => $email
	))
	->getOneOrNullResult();
		}
		public function refreshUser(UserInterface $user) {
			return $this->loadUserByUsername($user->getEmail());
		}
		public function supportsClass($class) {
			return $class === 'CS\UserBundle\Entity\Utilisateur';
		}
	}