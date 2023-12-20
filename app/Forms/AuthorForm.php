<?php 

declare(strict_types=1);

namespace App\Forms;

use Nette\Application\UI\Form;

class AuthorForm extends Form
{
    public $onDataSubmitted;

    public function __construct($authors)
    {
        parent::__construct();
        $authorsFormated[0] = "none";
        foreach($authors as $author){
            $authorsFormated[$author['id']] = $author['name'] . " " . $author['surname'];
        }
        $this->addSelect('authorsId', 'Update an author', $authorsFormated)->setHtmlAttribute('style', 'max-width: 160px;');
        $this->addText('name', 'Name');
        $this->addText('surname', 'Surname');
        $this->addSubmit('add', 'Add/Update');
        $this->onSuccess[] = [$this, 'processForm'];
    }
    
    public function processForm(Form $form, $data)
    {
        $this->onDataSubmitted($form, $data);
     }











}
?>