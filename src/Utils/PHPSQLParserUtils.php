<?php
namespace Zwen\SqlDsl\Utils;

/**
 * This class implements some helper functions.
 *
 * @author  zwen <291235020@qq.com>
 * @author arothe
 * @deprecated
 */
class PHPSQLParserUtils {

    /**
     * Prints an array only if debug mode is on.
     *
     * @param array $s
     * @param boolean $return, if true, the formatted array is returned via return parameter
     */
    protected function preprint($arr, $return = false) {
        $x = "<pre>";
        $x .= print_r($arr, 1);
        $x .= "</pre>";
        if ($return) {
            return $x;
        } else {
            if (isset($_ENV['DEBUG'])) {
                print $x . "\n";
            }
        }
    }

    /**
     * Ends the given string $haystack with the string $needle?
     *
     * @param string $haystack
     * @param string $needle
     */
    protected function endsWith($haystack, $needle) {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
        return (substr($haystack, -$length) === $needle);
    }

    /**
     * Revokes the quoting characters from an expression
     */
    protected function revokeQuotation($sql) {
        $result = trim($sql);
        if (($result[0] === '`') && ($result[strlen($result) - 1] === '`')) {
            $result = substr($result, 1, -1);
            return trim(str_replace('``', '`', $result));
        }
        return $sql;
    }

    /**
     * This method removes parenthesis from start of the given string.
     * It removes also the associated closing parenthesis.
     */
    protected function removeParenthesisFromStart($token) {

        $parenthesisRemoved = 0;

        $trim = trim($token);
        if ($trim !== "" && $trim[0] === "(") { // remove only one parenthesis pair now!
            $parenthesisRemoved++;
            $trim[0] = " ";
            $trim = trim($trim);
        }

        $parenthesis = $parenthesisRemoved;
        $i = 0;
        $string = 0;
        while ($i < strlen($trim)) {

            if ($trim[$i] === "\\") {
                $i += 2; # an escape character, the next character is irrelevant
                continue;
            }

            if ($trim[$i] === "'" || $trim[$i] === '"') {
                $string++;
            }

            if (($string % 2 === 0) && ($trim[$i] === "(")) {
                $parenthesis++;
            }

            if (($string % 2 === 0) && ($trim[$i] === ")")) {
                if ($parenthesis == $parenthesisRemoved) {
                    $trim[$i] = " ";
                    $parenthesisRemoved--;
                }
                $parenthesis--;
            }
            $i++;
        }
        return trim($trim);
    }

    public function getLastOf($array) {
        // $array is a copy of the original array, so we can change it without sideeffects
        if (!is_array($array)) {
            return false;
        }
        return array_pop($array);
    }

    /**
     * translates an array of objects into an associative array
     */
    public function toArray($tokenList) {
        $expr = array();
        foreach ($tokenList as $token) {
            $expr[] = $token->toArray();
        }
        return (empty($expr) ? false : $expr);
    }
}
