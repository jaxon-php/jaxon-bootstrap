Modal Dialog for Xajax with Twitter Bootstrap
=============================================

This package implements responsive modal dialog in Xajax applications using Twitter Bootstrap.

Features
--------

- Enrich the Xajax response with functions to show and hide dialogs.

The Twitter Bootstrap Js and CSS files shall be loaded into the page prior to using this package.

Installation
------------

Add the following line in the `composer.json` file.
```json
"require": {
    "lagdo/xajax-bootstrap": "dev-master"
}
```

Or run the command
```bash
composer require lagdo/xajax-bootstrap
```

Configuration
------------

By default the plugin adds Bootstrap code into a div element with id `modal-container`, which should be already present in the page.

The element id can be changed by setting the `bootstrap.dom.container` option to another value.

Usage
-----

This example shows how to display a modal dialog.
```
function myFunction()
{
    $response = new \Xajax\Response\Response();

    // Process the request
    // ...

    // Show a modal dialog
    $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
    $width = 400;
    $response->bootstrap->modal("Modal Dialog", "This modal dialog is powered by Twitter Bootstrap!!", $buttons, $width);

    return $response;
}
```

The `bootstrap` attribute of Xajax response provides the following functions.
```
public function modal($title, $content, $buttons, $width = 600);    // Show a modal dialog
public function hide();                                             // Hide the modal dialog
```

Contribute
----------

- Issue Tracker: github.com/lagdo/xajax-bootstrap/issues
- Source Code: github.com/lagdo/xajax-bootstrap

License
-------

The project is licensed under the BSD license.
