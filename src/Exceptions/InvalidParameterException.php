<?php
namespace Zwen\SqlDsl\Exceptions;

/**
 * InvalidParameterException.php
 *
 * This file implements the InvalidParameterException class which is used within the
 * PHPSQLParser package.
 *
 */

/**
 * This exception will occur in the parser, if the given SQL statement
 * is not a String type.
 *
 * @author arothe
 * @author  zwen <291235020@qq.com>
 */
class InvalidParameterException extends \InvalidArgumentException {

    protected $argument;

    public function __construct($argument) {
        $this->argument = $argument;
        parent::__construct("no SQL string to parse: \n" . $argument, 10);
    }

    public function getArgument() {
        return $this->argument;
    }
}
