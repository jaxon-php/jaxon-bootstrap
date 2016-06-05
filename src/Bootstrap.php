<?php

namespace Jaxon\Bootstrap;

class Bootstrap extends \Jaxon\Plugin\Response
{
    use \Jaxon\Utils\ContainerTrait;

    public function __construct()
    {}

    public function getName()
    {
        return 'bootstrap';
    }

    public function generateHash()
    {
        // Use the version number as hash
        return '0.1.0';
    }

    public function getScript()
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

    public function modal($title, $content, $buttons, $width = 600)
    {
        $sContainer = 'modal-container';
        if($this->hasOption('bootstrap.dom.container'))
        {
            $sContainer = $this->getOption('bootstrap.dom.container');
        }

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
            array('content' => $modalHtml, 'container' => $sContainer, 'width' => $width));
    }

    public function hide()
    {
        $this->response()->script('$("#draggable").modal("hide")');
    }
}

?>