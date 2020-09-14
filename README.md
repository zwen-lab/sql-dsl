# sql-dsl
#### sql-dsl 项目是一个把sql 转为Elasticsearch 的dsl库 

#### 例如 sql语句 SELECT sum(a) from testindex-20200914/testtype where a="xxxxx" and create_time>=1600048800 and create_time <1600056000 group by create_time,b
会转换成:
#### {"query":{"bool":{"filter":[{"bool":{"must":[{"match_phrase":{"a":{"query":"xxxxx"}}}]}},{"range":{"create_time":{"gte":"1600048800","lt":"1600056000"}}}]}},"aggs":{"create_time":{"terms":{"field":"create_time","size":1000000},"aggs":{"b":{"terms":{"field":"b","size":1000000},"aggs":{"suma":{"sum":{"field":"a"}},"top":{"top_hits":{"size":1}}}}}}}}

#### 使用方法
``` php

  $sql = 'SELECT sum(a) from testindex-20200914/testtype where a="xxxxx" and create_time>=1600048800 and create_time <1600056000 group by create_time,b';
  $dslBody = \Zwen\SqlDsl\EsParser::sql2dsl($sql);
  var_dump(json_encode($dslBody));

```
