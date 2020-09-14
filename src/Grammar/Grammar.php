<?php
namespace Zwen\SqlDsl\Grammar;

interface Grammar{
    /**
     * sql 转 dsl
     *
     * @param $sql
     * @return mixed
     */
    public function sql2dsl($sql);
}