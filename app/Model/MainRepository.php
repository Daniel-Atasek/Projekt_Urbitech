<?php
namespace App\Model;

use Nette\Database\Explorer;

class MainRepository extends Explorer{

   
    public function findAuthorsWithBooks()
    {
        $findAuthorsWithBooks ='SELECT a.name AS author_name, a.surname, b.name AS book_name, b.description, b.year, b.pages FROM
         authors AS a JOIN books AS b ON b.id_author = a.id LIMIT 9;';

        return $records = $this->query($findAuthorsWithBooks)->fetchAll();
    }
    public function findAuthors(){
        $findAuthors='SELECT id, name, surname
        FROM authors WHERE (name, surname, id) IN (
            SELECT DISTINCT name, surname, MIN(id) AS id
            FROM authors
            GROUP BY name, surname
        )
        ORDER BY surname, name, id;';

        return $records = $this->query($findAuthors)->fetchAll();
        
    }
    public function findBooks()
    {
        $findBooks ='SELECT a.name AS author_name, a.surname, b.name AS book_name, b.description, b.id, b.year, b.pages FROM
         authors AS a JOIN books AS b ON b.id_author = a.id ORDER BY b.name;';
        $records = $this->query($findBooks)->fetchAll();
        return $records;
    }

    public function findBookById($bookId){
        $bookRecord = $this->query("SELECT  b.id_author, b.name, b.description, b.year, b.pages FROM
        authors AS a JOIN books AS b ON b.id_author = a.id WHERE b.id = $bookId ORDER BY b.name;")->fetch();

        return $bookRecord;
    }
    public function findAuthorById($authorId){
        return $this->query("SELECT name, surname FROM authors WHERE id = ?;", $authorId)->fetch();

         
    }

    public function saveBook($data){
        $maxID = $this->query("SELECT MAX(id) from books")->fetchField();
        $maxID += 1;
        //fill in values instead of ?
        $this->query('INSERT INTO books (id ,id_author, name, description, year, pages) VALUES (?, ?, ?, ?, ?, ?)',
        $maxID,
        $data['id_author'],
        $data['name'],
        $data['description'],
        $data['year'],
        $data['pages']);
    }
    public function updateBook($bookRecord, $bookId){

        $this->query("UPDATE books SET id_author = ?, name = ?, description = ?, year = ?, pages = ?  WHERE id = ?", 
        $bookRecord['id_author'],
        $bookRecord['name'], 
        $bookRecord['description'],
        $bookRecord['year'],
        $bookRecord['pages'],
        $bookId);
    }
    public function saveAuthor($data){
        $maxID = $this->query("SELECT MAX(id) from authors")->fetchField();
        $maxID += 1;

        $this->query('INSERT INTO authors (id, name, surname) VALUES (?,?,?)', $maxID, $data['name'],$data['surname'] );
            echo "Author inserted succefully";
    }
    public function updateAuthor($authorRecord, $authorId){
        $this->query("UPDATE authors SET  name = ?, surname = ?  WHERE id = ?", 
            $authorRecord['name'],
            $authorRecord['surname'], 
            $authorId);
    }
    
}
?>
