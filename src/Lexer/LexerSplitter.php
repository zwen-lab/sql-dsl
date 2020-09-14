<?php
namespace Zwen\SqlDsl\Lexer;

/**
 * This class holds a sorted array of characters, which are used as stop token.
 * On every part of the array the given SQL string will be split into single tokens.
 * The array must be sorted by element size, longest first (3 chars -> 2 chars -> 1 char).
 *
 * @author  zwen <291235020@qq.com>
 * @author  André Rothe <andre.rothe@phosco.info>
 * @license http://www.debian.org/misc/bsd.license  BSD License (3 Clause)
 *
 */
class LexerSplitter {

    protected static $splitters = array("<=>", "\r\n", "!=", ">=", "<=", "<>", "<<", ">>", ":=", "\\", "&&", "||", ":=",
                                       "/*", "*/", "--", ">", "<", "|", "=", "^", "(", ")", "\t", "\n", "'", "\"", "`",
                                       ",", "@", " ", "+", "-", "*", "/", ";");
    protected $tokenSize;

    protected $hashSet;

    /**
     * Constructor.
     *
     * It initializes some fields.
     */
    public function __construct() {
        $this->tokenSize = strlen(self::$splitters[0]); // should be the largest one
        $this->hashSet = array_flip(self::$splitters);
    }

    /**
     * Get the maximum length of a split token.
     *
     * The largest element must be on position 0 of the internal $_splitters array,
     * so the function returns the length of that token. It must be > 0.
     *
     * @return int The number of characters for the largest split token.
     */
    public function getMaxLengthOfSplitter() {
        return $this->tokenSize;
    }

    /**
     * Looks into the internal split token array and compares the given token with
     * the array content. It returns true, if the token will be found, false otherwise.
     *
     * @param String $token a string, which could be a split token.
     *
     * @return boolean true, if the given string will be a split token, false otherwise
     */
    public function isSplitter($token) {
        return isset($this->hashSet[$token]);
    }
}
