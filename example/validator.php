<?php


  include __DIR__ . '/../../Autoloader.php';
  spl_autoload_register(array(\Fiv\Autoloader::N, 'autoload'));

  /**
   * Class RegistrationForm
   */
  class RegistrationForm extends \Fiv\Form\Form {

    /**
     * @var \Fiv\Form\Text
     */
    public $text;

    /**
     * @var \Fiv\Form\Submit
     */
    public $submit;

    /**
     *
     */
    public function init() {
      $this->setMethod('post');

      $input = $this->input('login')->setText('Login');

      $validator = new \Fiv\Form\Validator\Len();
      $validator->min(4, 'Minimum login len %s');

      $input->addValidator($validator);
      $input->addValidator(\Fiv\Form\Validator\Required::i());

      $this->submit('register')->setValue('go');
    }

  }

  $form = new RegistrationForm();
  $form->init();


  if (!$form->isValid()) {
    echo '<ul>';
    foreach ($form->getElements() as $element) {
      foreach ($element->getValidatorsErrors() as $error) {
        echo '<li style="color:red">' . $error . '</li>';
      }
    }
  } elseif ($form->isSubmitted()) {
    echo "Form is valid<br>";
    $data = $form->getData();
    echo "\n***" . __LINE__ . "***\n<pre>" . print_r($data, true) . "</pre>\n";
  }
  echo '<ul>';
  echo "<br>";

  echo $form;
?>
