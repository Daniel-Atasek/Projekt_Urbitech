<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Forms\AuthorForm;
use App\Forms\BookForm;
use App\Forms\SearchForm;
use App\Model\MainRepository;
use Nette;
use Nette\Application\UI\Form;
use Nette\ComponentModel\IComponent;

final class HomePresenter extends Nette\Application\UI\Presenter
{
   /** @var MainRepository @inject */
   public $mainRepository;

   public function renderDefault(){
      
      
      $databaseResult = $this->mainRepository->findAuthorsWithBooks();
      $records = $databaseResult;
      
      foreach($records as &$record){
         $record['description'] = mb_strimwidth($record['description'], 0, 100) . '...';
      }
      $this->template->records = $records;
   }
   







   //search function, not working yet
   /*protected function createComponentSearchForm():SearchForm
   {
      $form = new SearchForm();
      $form->onDataSubmitted[] = [$this, 'formSucceededSearch']; 
      return $form;
   }
   public function formSucceededSearch(Form $form, $data){
      $databaseResult = $this->mainRepository->search($data['option'], $data['searchParameters']);
      $records = $databaseResult;
      
      foreach($records as &$record){
         $record['description'] = mb_strimwidth($record['description'], 0, 100) . '...';
      }
      $this->template->records = $records;
   }*/

   protected function createComponentBookForm():BookForm
   {
      $form = new BookForm($this->mainRepository->findAuthors(), $this->mainRepository->findBooks());
      $form->onDataSubmitted[] = [$this, 'formSucceededBook']; 
      
      return $form;
   }
   public function formSucceededBook(Form $form, $data){
      $this->mainRepository->saveBook($data);
   }
   public function handleBookButtonClick(BookForm $form): void
    {
        
        $form->yourFunctionInsideForm();
    }
   protected function createComponentAuthorForm():AuthorForm
   {
      $form = new AuthorForm();
      $form->onDataSubmitted[] = [$this, 'formSucceededAuthor'];
      return $form;
   }
   public function formSucceededAuthor(Form $form, $data){
      $this->mainRepository->saveAuthor($data); 
   }

}
