<?php

//namespace CS\DesignBundle\Tests\Selenium;

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class CommanderTest extends PHPUnit_Extensions_SeleniumTestCase {
	protected function setUp() {
		$this->setBrowser("*firefox");
		$this->setBrowserUrl("http://localhost:8070/");
	}

  public function testCommander()
  {
    $this->open("/culturalstore/app_dev.php/");
    $this->click("css=img[alt=\"Logo CulturalStore\"]");
    $this->waitForPageToLoad("30000");
    /*$this->open("/culturalstore/app_dev.php/products/74");
    $this->click("link=Ajouter au panier");
    $this->waitForPageToLoad("30000");
    $this->click("link=Valider le panier");
    $this->waitForPageToLoad("30000");
    $this->type("name=cb", "1111111111111111");
    $this->type("name=date", "09/2020");
    $this->type("name=code", "987");
    $this->click("link=Valider le paiement");
    $this->waitForPageToLoad("30000");*/
  }
}
?>
