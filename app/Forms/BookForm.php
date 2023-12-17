<?php 

declare(strict_types=1);

namespace App\Forms;

use Nette\Application\UI\Form;
use Nette\Forms\Controls\Button;

class BookForm extends Form
{
    public $onDataSubmitted;

    public function __construct(array $authors, $books)
    {
    parent::__construct();
    $booksFormatted [0]= "none";
    foreach($books as $book){
        $booksFormatted[$book['id']] = $book['book_name'] . ' ' . $book['year'] . ' ' . $book['author_name'] . ' ' . $book['surname'];
    }
    $this->addSelect('books', 'Update a book', $booksFormatted)->setHtmlAttribute('style', 'max-width: 160px;');
    $this->addText('name', 'Title')->setRequired('Please fill in name.');
    $this->addText('description', 'Description')->setRequired('Please fill in description.');
    $this->addInteger('year', 'Published in')->setRequired('Please fill in year.');
    $this->addInteger('pages', 'Amount of pages')->setRequired('Please fill in pages.');
    $this->addSelect('author', 'Select an author', $authors);
    $this->addSubmit('add', 'Add/Update');
    $this->onSuccess[] = [$this, 'processForm'];
    }
    
   

    public function processForm(Form $form, $data)
    {
        $this->onDataSubmitted($form, $data);
    }
}












?>