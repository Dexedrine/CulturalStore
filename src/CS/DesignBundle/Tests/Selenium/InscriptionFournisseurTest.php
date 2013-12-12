<?php

//namespace CS\DesignBundle\Tests\Selenium;

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class InscriptionFournisseurTest extends PHPUnit_Extensions_SeleniumTestCase {
	protected function setUp() {
		$this->setBrowser("*firefox");
		$this->setBrowserUrl("http://localhost:8070/");
	}

	public function testInscriptionFournisseur() {
		$this->open("/culturalstore/app_dev.php/");
		$this->click("css=img[alt=\"Logo CulturalStore\"]");
		$this->waitForPageToLoad("30000");
		$this->click("link=maintenant !");
		$this->waitForPageToLoad("30000");
		$this->open("/culturalstore/app_dev.php/register/fournisseur");
		$this->type("id=cs_fournisseur_registration_form_email", "fournisseur");
		$this
				->type("id=cs_fournisseur_registration_form_email",
						"fournisseur@gmail.com");
		$this
				->type(
						"id=cs_fournisseur_registration_form_plainPassword_first",
						"fournisseur");
		$this
				->type(
						"id=cs_fournisseur_registration_form_plainPassword_second",
						"fournisseur");
		$this->type("id=cs_fournisseur_registration_form_nom", "Super");
		$this
				->type("id=cs_fournisseur_registration_form_adresse",
						"Rue Saint pierre");
		$this->type("id=cs_fournisseur_registration_form_codepostal", "59000");
		$this->type("id=cs_fournisseur_registration_form_ville", "Lille");
		$this->type("id=cs_fournisseur_registration_form_SIRET", "1111111111");
		$this->click("id=registration_submit");
		$this->waitForPageToLoad("30000");
		$this->open("/culturalstore/app_dev.php/user/delete");
	}
}
?>
