<?php

declare(strict_types=1);

namespace App\Presenters;

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
   public function handleIncreaseCount(){

   }










   protected function createComponentBookForm():Form
   {
    
      

      $form = new Form;
      
      $form->addText('name', 'Title');
      $form->addText('description', 'Description');
      $form->addInteger('year', 'Published in');
      $form->addInteger('pages', 'Amount of pages');
      $form->addSelect('author', 'Select an author', $this->mainRepository->findAuthors());
      $form->addSubmit('add', 'Add into database');
      $form->onSuccess[] = [$this, 'formSucceededBook'];
      return $form;
   }
   public function formSucceededBook(Form $form, $data){
      $this->flashMessage('User would have been added');
      $this->redirect('Home:');
   }
   protected function createComponentAuthorForm():Form
   {
      $form = new Form;
      $form->addText('name', 'Name');
      $form->addText('surname', 'Surname');
      $form->addSubmit('add', 'Add into database');
      $form->onSuccess[] = [$this, 'formSucceededAuthor'];
      return $form;
   }
   public function formSucceededAuthor(Form $form, $data){
      $this->flashMessage('User would have been added');
      $this->redirect('Home:');
   }

}
