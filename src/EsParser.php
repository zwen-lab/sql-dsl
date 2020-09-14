<?php
/**
 * sql-dsl 是一个把sql语句转成es dsl的库
 *
 * @package  sql-dsl
 * @author   zwen <291235020@qq.com>
 */

namespace Zwen\SqlDsl;

use Zwen\SqlDsl\Grammar\EsGrammar;

class EsParser {
    public $version = '5.x';

    public function __construct($version  = '')
    {
        if($version != ''){
            $this->version = $version;
        }
    }

    public static function __callStatic($method, $parameters)
    {
        return (new static)->$method(...$parameters);
    }

    public function __call($method, $parameters)
    {
        return call_user_func_array([new EsGrammar($this->version), $method], $parameters);
    }

    public function setVersion($version){
        $this->version = $version;
    }
}
