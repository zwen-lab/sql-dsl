<?php
namespace Zwen\SqlDsl\Utils;
/**
 * ExpressionType.php
 *
 * Defines all values, which are possible for the [expr_type] field
 * within the parser output.
 *
 */

/**
 * This class defines all values, which are possible for the [expr_type] field
 * within the parser output.
 *
 * @author  zwen <291235020@qq.com>
 * @author  André Rothe <andre.rothe@phosco.info>
 * @license http://www.debian.org/misc/bsd.license  BSD License (3 Clause)
 *
 */
class ExpressionType {

    const USER_VARIABLE = "user_variable";
    const SESSION_VARIABLE = "session_variable";
    const GLOBAL_VARIABLE = "global_variable";
    const LOCAL_VARIABLE = "local_variable";

    const COLDEF = "column-def";
    const COLREF = "colref";
    const RESERVED = "reserved";
    const CONSTANT = "const";

    const AGGREGATE_FUNCTION = "aggregate_function";
    const SIMPLE_FUNCTION = "function";

    const EXPRESSION = "expression";
    const BRACKET_EXPRESSION = "bracket_expression";
    const TABLE_EXPRESSION = "table_expression";

    const SUBQUERY = "subquery";
    const IN_LIST = "in-list";
    const OPERATOR = "operator";
    const SIGN = "sign";
    const RECORD = "record";

    const MATCH_ARGUMENTS = "match-arguments";
    const MATCH_MODE = "match-mode";

    const ALIAS = "alias";
    const POSITION = "pos";

    const TEMPORARY_TABLE = "temporary-table";
    const TABLE = "table";
    const VIEW = "view";
    const DATABASE = "database";
    const SCHEMA = "schema";

    const PROCEDURE = "procedure";
    const ENGINE = "engine";
    const USER = "user";
    const DIRECTORY = "directory";
    const UNION = "union";
    const CHARSET = "character-set";
    const COLLATE = "collation";

    const LIKE = "like";
    const CONSTRAINT = "constraint";
    const PRIMARY_KEY = "primary-key";
    const FOREIGN_KEY = "foreign-key";
    const UNIQUE_IDX = "unique-index";
    const INDEX = "index";
    const FULLTEXT_IDX = "fulltext-index";
    const SPATIAL_IDX = "spatial-index";
    const INDEX_TYPE = "index-type";
    const CHECK = "check";
    const COLUMN_LIST = "column-list";
    const INDEX_COLUMN = "index-column";
    const INDEX_SIZE = "index-size";
    const INDEX_PARSER = "index-parser";
    const REFERENCE = "foreign-ref";

    const DATA_TYPE = "data-type";
    const COLUMN_TYPE = "column-type";
    const DEF_VALUE = "default-value";
}
