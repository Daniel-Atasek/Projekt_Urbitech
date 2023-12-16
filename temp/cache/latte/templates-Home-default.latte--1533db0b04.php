<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /opt/lampp/htdocs/Projekt/app/Presenters/templates/Home/default.latte */
final class Template1533db0b04 extends Latte\Runtime\Template
{
	public const Source = '/opt/lampp/htdocs/Projekt/app/Presenters/templates/Home/default.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projekt - Knihy</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  </head>
  <body>
    <header>
    <div class="container-fluid bg-primary">
    <h1 class=" m-0">Projekt</h1>
      </div>
 

    </header>
   <!--- Book modal ---->

    <div class="modal" id="booksForms" tabindex="-1">
      <div class="modal-dialog"> 
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title">Add a new book...</h2>
          </div>
          <div class="modal-body">
            <form>
            <div class="mb-1">
';
		$ʟ_tmp = $this->global->uiControl->getComponent('bookForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 27 */;

		echo '            </div>
            
          
            </form>
          </div>
          <div class="modal-footer">
          <button>Add</button>
          <button>Clear</button>
          </div>
        </div>
      </div>
    </div>

    <!--- end of Book modal ---->
     <!--- Author modal ---->

    <div class="modal" id="authorForms" tabindex="-1">
      <div class="modal-dialog"> 
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title">Add or change author...</h2>
          </div>
          <div class="modal-body">
            <form>
            <div class="mb-1">
';
		$ʟ_tmp = $this->global->uiControl->getComponent('authorForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 53 */;

		echo '            </div>
            </form>
          </div>
          <div class="modal-footer">
          <button>Add</button>
          <button>Clear</button>
          </div>
        </div>
      </div>
    </div>

    <!--- end of Author modal ---->
  <main>
    
    <ul class="list-inline text-center bg-secondary">
      <li class="list-inline-item btn btn-info" data-toggle="modal" data-target="#booksForms">Add/Update book</li>    
      <li class="list-inline-item btn btn-info" data-toggle="modal" data-target="#authorForms">Add/Update author</li>   
    </ul>
  <div class="container text-center">
    <div class="row align-items-start">
';
		foreach ($records as $record) /* line 74 */ {
			echo '      <div class="col">';
			$this->createTemplate('card.latte', ['record' => $record] + $this->params, 'include')->renderToContentType('html') /* line 75 */;
			echo '</div>
';

		}

		echo '    </div>
  </div>
    
   
  </main>

<footer class="d-flex justify-content-center">
<button>1</button>
<button>2</button>
<button>-></button>
</footer>
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['record' => '74'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
