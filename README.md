Modal Dialog for Jaxon with Twitter Bootstrap
=============================================

This package implements responsive modal dialog in Jaxon applications using Twitter Bootstrap.

Features
--------

- Enrich the Jaxon response with functions to show and hide dialogs.

The Twitter Bootstrap Js and CSS files shall be loaded into the page prior to using this package.

Installation
------------

Add the following line in the `composer.json` file.
```json
"require": {
    "jaxon-php/jaxon-bootstrap": "dev-master"
}
```

Or run the command
```bash
composer require jaxon-php/jaxon-bootstrap
```

Configuration
------------

By default the plugin adds Bootstrap code into a div element with id `modal-container`, which should be already present in the page.

The element id can be changed by setting the `bootstrap.dom.container` option to another value.

Usage
-----

This example shows how to display a modal dialog.
```php
function myFunction()
{
    $response = new \Jaxon\Response\Response();

    // Process the request
    // ...

    // Show a modal dialog
    $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
    $width = 400;
    $response->bootstrap->modal("Modal Dialog", "This modal dialog is powered by Twitter Bootstrap!!", $buttons, $width);

    return $response;
}
```

The `bootstrap` attribute of Jaxon response provides the following functions.
```php
public function modal($title, $content, $buttons, $width = 600);    // Show a modal dialog
public function hide();                                             // Hide the modal dialog
```

Contribute
----------

- Issue Tracker: github.com/jaxon-php/jaxon-bootstrap/issues
- Source Code: github.com/jaxon-php/jaxon-bootstrap

License
-------

The project is licensed under the BSD license.
