<?php

namespace Xajax\Bootstrap;

class Bootstrap extends \Xajax\Plugin\Response
{
	protected $sContainer;

	public function __construct()
	{
		$this->sContainer = 'modal-container';
	}

	public function getName()
	{
		return 'twbs';
	}

	public function generateHash()
	{
		// Use the version number as hash
		return '0.1.0';
	}

	public function setContainer($sContainer)
	{
		$this->sContainer = $sContainer;
	}

	public function getClientScript()
	{
		return '
xajax.command.handler.register("twbsModal", function(args) {
	if(!$("#" + args.data.container).length)
	{
		$("body").append("<div id=\"" + args.data.container + "\"></div>");
	}
	// xajax.dom.assign(args.data.container, "innerHTML", args.data.content);
	$("#" + args.data.container).html(args.data.content);
	$(".modal-dialog", args.data.container).css("width", args.data.width + "px");
	$("#draggable").modal("show");
});';
	}

	public function show($title, $content, $buttons, $width = 600)
	{
		// Code HTML des boutons
		$modalButtons = '
';
		foreach($buttons as $button)
		{
			if($button['click'] == 'close')
			{
				$modalButtons .= '
					<button type="button" class="' . $button['class'] .
					'" data-dismiss="modal">' . $button['title'] . '</button>';
			}
			else
			{
				$modalButtons .= '
					<button type="button" class="' . $button['class'] . '" onclick="' .
					$button['click'] . '">' . $button['title'] . '</button>';
			}
		}
		// Code HTML de la fenêtre
		$modalHtml = '
	<!-- /.modal -->
	<div class="modal fade draggable-modal" id="draggable" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">' . $title . '</h4>
				</div>
				<div class="modal-body">
' . $content . '
				</div>
				<div class="modal-footer">' . $modalButtons . '
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
';
		// Show the modal dialog
		$this->addCommand(array('cmd' => 'twbsModal'),
			array('content' => $modalHtml, 'container' => $this->sContainer, 'width' => $width));
	}

	public function hide()
	{
		$this->response()->script('$("#draggable").modal("hide")');
	}
}

?>