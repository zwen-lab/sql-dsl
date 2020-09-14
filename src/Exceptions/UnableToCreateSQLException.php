<?php
namespace Zwen\SqlDsl\Exceptions;

/**
 * This exception will occur within the PHPSQLCreator, if the creator can not find a
 * method, which can handle the current expr_type field. It could be an error within the parser
 * output or a special case has not been modelled within the creator. Please create an issue
 * in such a case.
 *
 * @author arothe
 * @author  zwen <291235020@qq.com>
 */
class UnableToCreateSQLException extends \Exception {

    protected $part;
    protected $partkey;
    protected $entry;
    protected $entrykey;

    public function __construct($part, $partkey, $entry, $entrykey) {
        $this->part = $part;
        $this->partkey = $partkey;
        $this->entry = $entry;
        $this->entrykey = $entrykey;
        parent::__construct("unknown [" . $entrykey . "] = " .$entry[$entrykey] . " in \"" . $part . "\" [" . $partkey . "] ", 15);
    }

    public function getEntry() {
        return $this->entry;
    }

    public function getEntryKey() {
        return $this->entrykey;
    }

    public function getSQLPart() {
        return $this->part;
    }

    public function getSQLPartKey() {
        return $this->partkey;
    }
}
