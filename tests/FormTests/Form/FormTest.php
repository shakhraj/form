<?php

  namespace FormTests\Form;

  use Fiv\Form\Form;

  /**
   * @package FormTests\Form
   */
  class FormTest extends \FormTests\Main {

    public function testUid() {
      $form = new Form();

      $this->assertEquals(32, strlen($form->getUid()));

      $form->setName('test');
      $this->assertEquals('test', $form->getUid());
    }

    public function testGetElements() {
      $form = new Form();
      $this->assertEmpty($form->getElements());
    }

    public function testFormMethods() {
      $form = new Form();
      $this->assertEquals('get', $form->getMethod());

      $form->setMethod('post');
      $this->assertEquals('post', $form->getMethod());

      $form->setMethod('t');
      $this->assertEquals('get', $form->getMethod());
    }

    public function testIsSubmitted() {
      $form = new Form();
      $this->assertEquals(false, $form->isSubmitted());
    }

  }