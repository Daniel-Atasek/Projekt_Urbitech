<?php

namespace App\Model;
use App\Model\MainRepository;

class MainService
{

   public function __construct(
    private MainRepository $mainRepository,
) {
}
    public function findBooks()
    {
        return $this->mainRepository->findBooks();
    }
    public function findAuthors(): array{
        return $this->mainRepository->findAuthors();

    }
    public function findAuthorsWithBooks(){
        return $this->mainRepository->findAuthorsWithBooks();
    }
    public function processBook($data){
        $bookId = $data['bookId'];
        if($bookId < 1){
        
            $this->mainRepository->saveBook($data);   
            echo "Book inserted succefully";
        }
        else
        {
            $bookSqlRecord = $this->mainRepository->findBookById($bookId);
            $bookRecord = $bookSqlRecord ? (array)$bookSqlRecord : [];
            $keys = ['id_author', 'name', 'description', 'year', 'pages'];

            foreach ($keys as $key) {
                $value = $data[$key];
                
                if ($value != $bookRecord[$key] && $value !== null) {
                   $bookRecord[$key] = $value;
                }
            }
           $this->mainRepository->updateBook($bookRecord, $bookId);
            echo "updated";
        }
    }

    public function ProcessAuthor($data){
        $authorId = $data['authorsId'];
        if($authorId < 1){
            $this->mainRepository->saveAuthor($data);
        }
        else{
            $authorToCheck = $this->mainRepository->findAuthorById($authorId);
            $authorRecord = $authorToCheck ? (array)$authorToCheck : [];
            $keys = ['name', 'surname'];
           
            foreach ($keys as $key) {
                $value = $data[$key];
                
                if ($value != $authorRecord[$key] && $value !== null) {
                   $authorRecord[$key] = $value;
                }
            }
            $this->mainRepository->updateAuthor($authorRecord, $authorId);
            echo "Author updated succefully";
        }
    }
}

?>