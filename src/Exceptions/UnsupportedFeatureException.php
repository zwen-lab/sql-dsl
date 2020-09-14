<?php
namespace Zwen\SqlDsl\Exceptions;

/**
 * This exception will occur in the PHPSQLCreator, if the creator finds
 * a field name, which is unknown. The developers have created some
 * additional output of the parser, but the creator class has not been
 * enhanced. Please open an issue in such a case.
 *
 * @author arothe
 * @author  zwen <291235020@qq.com>
 */
class UnsupportedFeatureException extends \Exception {

    protected $key;

    public function __construct($key) {
        $this->key = $key;
        parent::__construct($key . " not implemented.", 20);
    }

    public function getKey() {
        return $this->key;
    }
}
