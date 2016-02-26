# Numeralstool

Simple arabic-roman numerals format convert handler.

### Installation

Create empty composer.json and place the following in it.

```
{
    "require": {
        "php": ">=5.5",
        "ibrahimmomani/numeralstool": "dev-master"
    }
}	
```

Create your index.php

```
<?php

require 'vendor/autoload.php';
use Numerals\Numeral;

echo Numeral::factory('arabic', 3333).PHP_EOL; // will output MMMCCCXXXIII 
echo Numeral::factory('roman', 'LXVIII').PHP_EOL; // will output 68

```
