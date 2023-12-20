<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Forms\AuthorForm;
use App\Forms\BookForm;
//use App\Model\MainRepository;
use App\Model\MainService;
use Nette;
use Nette\Application\UI\Form;


final class HomePresenter extends Nette\Application\UI\Presenter
{
   

   /** @var MainService @inject */
   public $mainService;

   public function renderDefault(){
      
      
      $databaseResult = $this->mainService->findAuthorsWithBooks();
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

   public function createComponentBookForm():BookForm
   {
      $form = new BookForm($this->mainService->findAuthors(), $this->mainService->findBooks());
      $form->onDataSubmitted[] = [$this, 'formSucceededBook']; 
      
      return $form;
   }
   public function formSucceededBook(Form $form, $data){
      $this->mainService->processBook($data);
   }
   public function handleBookButtonClick(BookForm $form): void
    {
        
        $form->yourFunctionInsideForm();
    }
   public function createComponentAuthorForm():AuthorForm
   {
      $form = new AuthorForm($this->mainService->findAuthors());
      $form->onDataSubmitted[] = [$this, 'formSucceededAuthor'];
      return $form;
   }
   public function formSucceededAuthor(Form $form, $data){
      $this->mainService->ProcessAuthor($data); 
   }

}
