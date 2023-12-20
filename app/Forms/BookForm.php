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
    $options = [];
        foreach($authors as $author){
            $fullName = $author['name']. ' ' . $author['surname'];
            $options [$author->id] = $fullName;
        }
    
    $this->addSelect('bookId', 'Update a book', $booksFormatted)->setHtmlAttribute('style', 'max-width: 160px;');
    $this->addText('name', 'Title');
    $this->addText('description', 'Description');
    $this->addInteger('year', 'Published in');
    $this->addInteger('pages', 'Amount of pages');
    $this->addSelect('id_author', 'Select an author', $options);
    $this->addSubmit('add', 'Add/Update');
    $this->onSuccess[] = [$this, 'processForm'];
    }
    
   

    public function processForm(Form $form, $data)
    {
        $this->onDataSubmitted($form, $data);
    }
}












?>
