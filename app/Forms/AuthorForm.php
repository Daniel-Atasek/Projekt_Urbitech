<?php 

declare(strict_types=1);

namespace App\Forms;

use Nette\Application\UI\Form;

class AuthorForm extends Form
{
    public $onDataSubmitted;

    public function __construct()
    {
        parent::__construct();

        $this->addText('name', 'Name');
        $this->addText('surname', 'Surname');
        $this->addSubmit('add', 'Add into database');
        $this->onSuccess[] = [$this, 'processForm'];
    }
    
    public function processForm(Form $form, $data)
    {
        $this->onDataSubmitted($form, $data);
     }











}
?>