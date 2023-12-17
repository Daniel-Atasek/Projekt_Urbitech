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
   
';
		$this->createTemplate('bookmodal.latte', $this->params, 'include')->renderToContentType('html') /* line 18 */;
		echo '
    <!--- end of Book modal ---->
     <!--- Author modal ---->

';
		$this->createTemplate('authormodal.latte', $this->params, 'include')->renderToContentType('html') /* line 23 */;
		echo '
    <!--- end of Author modal ---->

 
  <main>
    
    <ul class="list-inline text-center bg-secondary">
      <li class="list-inline-item btn btn-info" data-toggle="modal" data-target="#booksForms">Add/Update book</li>    
      <li class="list-inline-item btn btn-info" data-toggle="modal" data-target="#authorForms">Add/Update author</li> 
      
    </ul>
  <div class="container text-center">
    <div class="row align-items-start">
';
		foreach ($records as $record) /* line 37 */ {
			echo '      <div class="col">';
			$this->createTemplate('card.latte', ['record' => $record] + $this->params, 'include')->renderToContentType('html') /* line 38 */;
			echo '</div>
';

		}

		echo '    </div>
  </div>
    
   
  </main>

<footer class="d-flex justify-content-center">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link text-dark" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
    <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
    <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
    <li class="page-item"><a class="page-link text-dark" href="#">Next</a></li>
  </ul>
</nav>
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
			foreach (array_intersect_key(['record' => '37'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
