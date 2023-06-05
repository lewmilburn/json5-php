<?php

/**
 * JSON5-PHP
 * Converts JSON5 (https://json5.org/) files into PHP JSON objects.
 *
 * @version 0.2
 * @license Apache 2.0 International License
 * @author Lewis Milburn (github.com/lewmilburn)
 */
class JSON5
{
    /**
     * Constructor
     * @throws Exception
     */
    function __construct()
    {
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
        // Comments
        $JSON5 = $this->RemoveComment($JSON5);

        // Leading / trailing decimal points
        $JSON5 = $this->RemoveTrailingDecimal($JSON5);
        $JSON5 = $this->RemoveLeadingDecimal($JSON5);

        // Infinity
        $JSON5 = $this->RemoveInfinity($JSON5);

        // NaN
        $JSON5 = $this->RemoveNaN($JSON5);

        // Explicit +
        $JSON5 = $this->RemoveExplicitPlus($JSON5);

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
        return preg_replace("!//.*!", "", $JSON5);
    }

    /**
     * Removes trailing decimal points from the JSON5 string.
     * @param string $JSON5 The JSON5 Object to be parsed.
     * @return string The JSON5 Object without trailing decimal points.
     */
    private function RemoveTrailingDecimal(string $JSON5): string
    {
        $pattern = '/(\d+)\./';
        $replacement = '$1';
        return preg_replace($pattern, $replacement, $JSON5);
    }

    /**
     * Removes leading decimal points from the JSON5 string.
     * @param string $JSON5 The JSON5 Object to be parsed.
     * @return string The JSON5 Object without leading decimal points.
     */
    private function RemoveLeadingDecimal(string $JSON5): string
    {
        $pattern = '/(\D)\.(\d+)/';
        $replacement = '${1}0.$2';
        return preg_replace($pattern, $replacement, $JSON5);
    }

    /**
     * Removes Infinity values from the JSON5 string.
     * @param string $JSON5 The JSON5 Object to be parsed.
     * @return string The JSON5 Object without Infinity values.
     */
    private function RemoveInfinity(string $JSON5): string
    {
        $JSON5 = str_replace("Infinity", "1e9999", $JSON5);
        return str_replace("-Infinity", "-1e9999", $JSON5);
    }

    /**
     * Removes NaN values from the JSON5 string.
     * @param string $JSON5 The JSON5 Object to be parsed.
     * @return string The JSON5 Object without NaN values.
     */
    private function RemoveNaN(string $JSON5): string
    {
        return str_replace("NaN", "null", $JSON5);
    }

    /**
     * Removes explicit plus signs values from the JSON5 string.
     * @param string $JSON5 The JSON5 Object to be parsed.
     * @return string The JSON5 Object without explicit plus signs.
     */
    private function RemoveExplicitPlus(string $JSON5): string
    {
        $pattern = '/(\D)\+(\d+)/';
        $replacement = '${1}0.$2';
        return preg_replace($pattern, $replacement, $JSON5);
    }
}