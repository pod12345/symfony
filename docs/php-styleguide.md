# PHP Style Guide

This is a style guide for PHP, which should be used when contributing this project.

You should follow the standards defined in the [PSR-0][], [PSR-1][] and [PSR-2][] documents.

## Structure

* Add a single space after each comma delimiter;
* Add a comma after each array item in a multi-line array, even after the last one;
* Add a single space around operators (`==, &&,` etc.). For instance, an assignment would be formatted as `$lorem = $ipsum` rather than `$lorem=$ipsum`;
* Unary operators (`++, --`) should not have a space between the operator and the variable or number they are operating on;
* Add a blank line before return statements, unless the return is alone inside a statement-group (like an if statement);
* Use braces to indicate control structure body regardless of the number of statements it contains;
* Define one class per file - this does not apply to private helper classes that are not intended to be instantiated from the outside and thus are not concerned by the [PSR-0][] standard;
* Declare class properties before methods;
* Declare public methods first, then protected ones and finally private ones. The exceptions to this rule are the class constructor and the setUp and tearDown methods of PHPUnit tests, which should always be the first methods to increase readability;
* Use parentheses when instantiating classes regardless of the number of arguments the constructor has;
* Exception message strings should be concatenated using [sprintf][].

## Naming Conventions

* Use [camelCase][], not underscores, for variable, function and method names, arguments;
* Use underscores for option names and parameter names;
* Use namespaces for all classes;
* Prefix abstract classes with Abstract. Please note some early Symfony classes do not follow this convention and have not been renamed for backward compatibility reasons. However all new abstract classes must follow this naming convention;
* Suffix interfaces with Interface;
* Suffix traits with Trait;
* Suffix exceptions with Exception;
* Use alphanumeric characters and underscores for file names;
* For type-hinting in PHPDocs and casting, use bool (instead of boolean or Boolean), int (instead of integer), float (instead of double or real);
* Don't forget to look at the more verbose [Conventions][] document for more subjective naming considerations.

## Service Naming Conventions

* A service name contains groups, separated by dots;
* The DI alias of the bundle is the first group (e.g. `fos_user`);
* Use lowercase letters for service and parameter names;
* A group name uses the underscore notation;
* Each service has a corresponding parameter containing the class name, following the SERVICE NAME.class convention.

## Example Implementation

Here's a short example containing most features described above:

```php
<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Acme;

/**
 * Coding standards demonstration.
 */
class FooBar
{
    const SOME_CONST = 42;

    private $fooBar;

    /**
     * @param string $dummy Some argument description
     */
    public function __construct($dummy)
    {
        $this->fooBar = $this->transformText($dummy);
    }

    /**
     * @param string $dummy Some argument description
     * @param array  $options
     *
     * @return string|null Transformed input
     *
     * @throws \RuntimeException
     */
    private function transformText($dummy, array $options = array())
    {
        $mergedOptions = array_merge(
            array(
                'some_default' => 'values',
                'another_default' => 'more values',
            ),
            $options
        );

        if (true === $dummy) {
            return;
        }

        if ('string' === $dummy) {
            if ('values' === $mergedOptions['some_default']) {
                return substr($dummy, 0, 5);
            }

            return ucwords($dummy);
        }

        throw new \RuntimeException(sprintf('Unrecognized dummy option "%s"', $dummy));
    }
}
```

## Documentation

* Add PHPDoc blocks for all classes, methods, and functions;
* Omit the @return tag if the method does not return anything;
* The @package and @subpackage annotations are not used.

[psr-0]: http://www.php-fig.org/psr/psr-0/
[psr-1]: http://www.php-fig.org/psr/psr-1/
[psr-2]: http://www.php-fig.org/psr/psr-2/
[sprintf]: http://php.net/manual/ru/function.sprintf.php
[camelCase]: http://en.wikipedia.org/wiki/CamelCase
[conventions]: http://symfony.com/doc/current/contributing/code/conventions.html
