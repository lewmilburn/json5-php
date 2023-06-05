<?php
class JSON5 {
    /**
     * Constructor
     * @throws Exception
     */
    function __construct() {
        if (PHP_VERSION_ID < 80000) {
            throw new Exception("JSON5-PHP requires PHP 8.0 or higher.");
        }
    }

    /**
     * Parse a JSON5 string into a PHP object
     * @param string $JSON5 The JSON5 Object to be parsed.
     */
    public function Parse(string $JSON5): object|null
    {
        $JSON5 = $this->RemoveComment($JSON5);

        return json_decode($JSON5);
    }

    /**
     * Removes comments from the JSON5 string.
     * @param string $JSON5 The JSON5 Object to be parsed.
     * @return string The JSON5 Object without comments.
     */
    private function RemoveComment(string $JSON5): string
    {
        $JSON5 = preg_replace("#/\*.*?\*/#s", "", $JSON5);
        return preg_replace('!//.*!', '', $JSON5);
    }
}