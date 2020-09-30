## SQL-DSL  

是一个专业的把sql查询语句转化成Elasticsearch的DSL查询语句的PHP类库。在使用Elasticsearch 的时候，使用者可以不再学习复杂的DSL语法，自需要会写SQL语句就就可以了，SQL-DSL类库会帮我们转化成复杂的DSL语句。

### 安装

```
composer require sql-dsl v0.0.3
```

### 使用方法

```php
     $sql = 'SELECT sum(a) from testindex-20200914/testtype where a="xxxxx" and create_time>=1600048800 and create_time <1600056000 group by create_time,b'

    $dslBody = \Zwen\SqlDsl\EsParser::sql2dsl($sql);
    
    var_dump(json_encode($dslBody));
```

SQL-DSL 类库能够帮我们转成如下DSL语句:

```
{
	"index": "testindex-20200914",
	"type": "testtype",
	"body": {
		"query": {
			"bool": {
				"filter": [{
					"bool": {
						"must": [{
							"match_phrase": {
								"a": {
									"query": "xxxxx"
								}
							}
						}]
					}
				}, {
					"range": {
						"create_time": {
							"gte": "1600048800",
							"lt": "1600056000"
						}
					}
				}]
			}
		},
		"aggs": {
			"create_time": {
				"terms": {
					"field": "create_time",
					"size": 1000000
				},
				"aggs": {
					"b": {
						"terms": {
							"field": "b",
							"size": 1000000
						},
						"aggs": {
							"suma": {
								"sum": {
									"field": "a"
								}
							},
							"top": {
								"top_hits": {
									"size": 1
								}
							}
						}
					}
				}
			}
		}
	}
}
```

### 支持的常用语句示例

说明：未全部列出所有支持的SQL语句。不支持跨表或者JOIN相关的SQL语句，常用单表查询的SQL语句基本上支持。

```sql
select a, c, b from index-20200914/type where host = 'www.baidu.com'
select * from index-20200914/type where host = 'www.baidu.com' e>1 and e<=10 limit 0,10
select sum(a) as a,sum(b),sum(c) from index-20200914/type where host = 'www.baidu.com' e>1 and e<=10 group by host,e
```

