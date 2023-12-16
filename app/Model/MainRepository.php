<?php
namespace App\Model;

use Nette\Database\Explorer;

class MainRepository extends Explorer{

    public function findAuthorsWithBooks()
    {
        $findAuthorsWithBooks ='Select a.name AS author_name, a.surname, b.name AS book_name, b.description, b.year, b.pages FROM
         authors AS a JOIN books AS b ON b.id_author = a.id LIMIT 9;';

        return $records = $this->query($findAuthorsWithBooks)->fetchAll();
    }
    public function saveAuthor(){

    }
    public function saveBook(){
        
    }
    public function findAuthors(): array{
        $findAuthors='SELECT DISTINCT name, surname FROM authors ORDER BY surname;';

        $records = $this->query($findAuthors)->fetchAll();
        $authorsInOneRow = [];
        foreach($records as $record){
            $authorsInOneRow[] = $record['name']. ' ' . $record['surname'];
        }
        return $authorsInOneRow;
    }
    
}
?>