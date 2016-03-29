## xajax-bootstrap

Twitter Bootstrap modal dialog for Xajax

#### Installation

Run `composer require lagdo/xajax-bootstrap`, or add `"lagdo/xajax-bootstrap": : "dev-master"` in your composer.json.

Add JQuery in the HTML header.

#### Usage

The plugin can be called with the `twbs` attribute in the Xajax response object.
```
function myFunction()
{
	$xResponse = new \Xajax\Response\Response();
	// Process the request
	// ...
	// Show a modal dialog
	$buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
	$width = 300;
	$xResponse->twbs->show("Modal Dialog", "This modal dialog is powered by Twitter Bootstrap!!", $buttons, $width);
	return $xResponse;
}
```
