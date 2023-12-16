<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /opt/lampp/htdocs/Projekt/app/Presenters/templates/Home/card.latte */
final class Templatecab3cd5c11 extends Latte\Runtime\Template
{
	public const Source = '/opt/lampp/htdocs/Projekt/app/Presenters/templates/Home/card.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '
  <div class="card m-2" style="width: 20rem; height: 33rem; ">
  <div class="card-body">
    <h2 class="card-title font-weight-bold">';
		echo LR\Filters::escapeHtmlText($record->book_name) /* line 4 */;
		echo '</h2>
    <h4 class="card-subtitle p-2 text-secondary"><a href="/';
		echo LR\Filters::escapeHtmlAttr($record->author_name) /* line 5 */;
		echo '_';
		echo LR\Filters::escapeHtmlAttr($record->surname) /* line 5 */;
		echo '">';
		echo LR\Filters::escapeHtmlText($record->author_name) /* line 5 */;
		echo ' ';
		echo LR\Filters::escapeHtmlText($record->surname) /* line 5 */;
		echo '</a></h4>
    <p class="card-text text-left" style="height: 8rem;">';
		echo LR\Filters::escapeHtmlText($record->description) /* line 6 */;
		echo '</p>
    <ul class="list-group list-group-flush">
    <li class="list-group-item">Published: ';
		echo LR\Filters::escapeHtmlText($record->year) /* line 8 */;
		echo '</li>
     <li class="list-group-item">Pages: ';
		echo LR\Filters::escapeHtmlText($record->pages) /* line 9 */;
		echo '</li>
    </ul>
    <a href="#" class="btn btn-outline-info">Go to book info</a>
  </div>
</div>

 ';
	}
}
