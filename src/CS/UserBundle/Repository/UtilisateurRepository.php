<?php // 
// namespace CS\UserBundle\Repository;
// use Doctrine\ORM\EntityRepository;
// use Symfony\Component\Security\Core\User\UserProviderInterface;
// use Symfony\Component\Security\Core\User\UserInterface;

// class UtilisateurRepository extends EntityRepository implements
// 		UserProviderInterface {
// 	public function loadUserByMail($email) {
// 		return $this->getEntityManager()
// 				->createQuery(
// 						'SELECT u FROM
// CSUserBundle:Utilisateur u
// WHERE u.email = :email')->setParameters(array('email' => $email))
// 				->getOneOrNullResult();
// 	}
// 	public function refreshUser(UserInterface $user) {
// 		return $this->loadUserByMail($user->getEmail());
// 	}
// 	public function supportsClass($class) {
// 		return $class === 'CS\UserBundle\Entity\Utilisateur';
// 	}
// 	public function loadUserByUsername($username) {
// 		return $this->loadUserByMail($username);

// 	}
// }
