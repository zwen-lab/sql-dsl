<?php
namespace Zwen\SqlDsl\Exceptions;

/**
 * This exception will occur, if the PositionCalculator can not find the token
 * defined by a base_expr field within the original SQL statement. Please create
 * an issue in such a case, it is an application error.
 *
 * @author arothe
 * @author  zwen <291235020@qq.com>
 *
 */
class UnableToCalculatePositionException extends \Exception {

    protected $needle;
    protected $haystack;

    public function __construct($needle, $haystack) {
        $this->needle = $needle;
        $this->haystack = $haystack;
        parent::__construct("cannot calculate position of " . $needle . " within " . $haystack, 5);
    }

    public function getNeedle() {
        return $this->needle;
    }

    public function getHaystack() {
        return $this->haystack;
    }
}
