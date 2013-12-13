<?php

//namespace CS\DesignBundle\Tests\Selenium;

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class InscriptionTest extends PHPUnit_Extensions_SeleniumTestCase {
	protected function setUp() {
		$this->setBrowser("*firefox");
		$this->setBrowserUrl("http://localhost:8070/");
	}

	public function testInscription() {
		$this->open("/culturalstore/app_dev.php/");
		$this->click("css=img[alt=\"Logo CulturalStore\"]");
		$this->waitForPageToLoad("30000");
		$this->open("culturalstore/app_dev.php/register/utilisateur");
		$this
				->type("id=cs_utilisateur_registration_form_email",
						"lucie@gmail.fr");
		$this
				->type(
						"id=cs_utilisateur_registration_form_plainPassword_first",
						"lucie");
		$this
				->type(
						"id=cs_utilisateur_registration_form_plainPassword_second",
						"lucie");
		$this->type("id=cs_utilisateur_registration_form_nom", "Meresse");
		$this->type("id=cs_utilisateur_registration_form_prenom", "Lucie");
		$this->click("id=cs_utilisateur_registration_form_optin_newsletter");
		$this->click("id=registration_submit");
		$this->waitForPageToLoad("30000");
		$this->open("culturalstore/app_dev.php/");

		$this->open("culturalstore/app_dev.php/user/delete");

	}
}
?>
