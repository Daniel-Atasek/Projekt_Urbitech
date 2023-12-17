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
    public function findAuthors(): array{
        $findAuthors='SELECT id, name, surname
        FROM authors WHERE (name, surname, id) IN (
            SELECT DISTINCT name, surname, MIN(id) AS id
            FROM authors
            GROUP BY name, surname
        )
        ORDER BY surname, name, id;';

        $records = $this->query($findAuthors)->fetchAll();
        $options = [];
        foreach($records as $record){
            $fullName = $record['name']. ' ' . $record['surname'];
            $options [$record->id] = $fullName;
        }
        return $options;
    }
    public function findBooks()
    {
        $findBooks ='Select a.name AS author_name, a.surname, b.name AS book_name, b.description, b.id, b.year, b.pages FROM
         authors AS a JOIN books AS b ON b.id_author = a.id ORDER BY b.name;';
        
        $records = $this->query($findBooks)->fetchAll();
        /*$books = [];
        foreach($records as $record){
            $bookInfo = $record['book_name'] . ' ' . $record['b.year'] . ' ' . $record['author_name']. ' ' . $record['surname'];
            $books [$record->id] = $bookInfo;
        }*/
        return $records;
    }

    public function saveAuthor($data){
        $randomId = $this->query("SELECT count(*) from authors")->fetchField();

        $randomId += 1;

        $this->query('INSERT INTO authors (id, name, surname) VALUES (?,?,?)', $randomId, $data['name'],$data['surname'] );
        
        echo "Author inserted succefully";
    }
    public function saveBook($data){
        $randomId = $this->query("SELECT count(*) from books")->fetchField();
        $randomId += 1;

        $bookId = $data['books'];
        echo "book id: " . $bookId;
        if($bookId < 1){
            $this->query('INSERT INTO books (id ,id_author, name, description, year, pages) VALUES (?, ?, ?, ?, ?, ?)',
            $randomId,
            $data['author'],
            $data['name'],
            $data['description'],
            $data['year'],
            $data['pages']
                );
            echo "Book inserted succefully";
        }
        else
        {
            echo "to update";
        }
        
    }

  /*  public function search($option, $query)
    {
        echo"option is" . " " . $option;
        echo"query is" . " " . $query;
        switch($option){
           
            case "book":
                $results = $this->query('Select a.name AS author_name, a.surname, b.name AS book_name, b.description, b.year, b.pages FROM
                authors AS a JOIN books AS b ON b.id_author = a.id WHERE b.name LIKE ? LIMIT 9;', "%$query%")->fetchAll();
                echo "returning book";
                return $results;
            
                
            case "author":
                $results = $this->query('Select a.name AS author_name, a.surname, b.name AS book_name, b.description, b.year, b.pages FROM
                authors AS a JOIN books AS b ON b.id_author = a.id WHERE a.name LIKE ? or a.surname LIKE ? LIMIT 9;', "%$query%", "%$query%")->fetchAll();
                echo "returning author";
                return $results;
                
        }
       
        
    }
   */
    
}
?>