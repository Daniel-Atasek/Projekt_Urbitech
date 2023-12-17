<?php 

declare(strict_types=1);

namespace App\Forms;

use Nette\Application\UI\Form;

class SearchForm extends Form
{
    public $onDataSubmitted;

    public function __construct()
    {
        parent::__construct();

      $this->addText('searchParameters', 'What do you want to search?')->setRequired('Please input a value');
      $options = [
        'author' => 'author',
        'book' => 'book',
      ];
      $this->addRadioList('option', 'Option:', $options);
      $this->addSubmit('search', 'Search');
      $this->onSuccess[] = [$this, 'processForm'];
    }
    public function processForm(Form $form, $data)
    {
        $this->onDataSubmitted($form, $data);
     }
}












?>