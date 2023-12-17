<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /opt/lampp/htdocs/Projekt/app/Presenters/templates/Home/authormodal.latte */
final class Templatece47f651c0 extends Latte\Runtime\Template
{
	public const Source = '/opt/lampp/htdocs/Projekt/app/Presenters/templates/Home/authormodal.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<div class="modal" id="authorForms" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Add or change author...</h2>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="mb-1">';
		$ʟ_tmp = $this->global->uiControl->getComponent('authorForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 9 */;

		echo '</div>
        </form>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
';
	}
}
