<?php
declare(strict_types=1);

namespace Exercises\Json;

/**
 * Print a json string.
 *
 */
final class Json
{
    const Depth_Limit = 5;

    /**
     * Prints the json field from a file
     * @param string $path The json file path
     * @param bool $newLines = true When true prints the output over multiple lines and when false prints the output on a single line
     * @return void
     */
    public static function printFromFile(string $path, bool $newLines = true): void
    {
        self::print(json: file_get_contents($path), newLines: $newLines);
    }

    /**
     * Prints the array/object/json string in a json format
     * @param string|array|object $json the variable to print in the json format
     * @param bool $newLines = true When true prints the output over multiple lines and when false prints the output on a single line
     * @return void
     */
    public static function print(string|array|object $json, bool $newLines = true): void
    {
        switch (gettype($json)) {
            case 'string':
                $json = json_decode($json);
                if (!$json) {
                    echo '';
                    return;
                }
                break;
            case 'object':
                $json = (array) $json;
                break;
        }
        echo self::formatJson(json: $json, newLines: $newLines, delimiter: $newLines ? ",\r\n\t" : ", ");
    }

    /**
     * Formats the json
     * @param array $json
     * @param string $delimiter
     * @param bool $newLines = false When true prints the output over multiple lines and when false prints the output on a single line
     * @param int $depth = 0
     * @return void
     */
    protected static function formatJson(array $json, string $delimiter , bool $newLines = false, int $depth = 0): string
    {
        if ($depth > self::Depth_Limit) {
            return 'Exceeded print depth limit of ' . self::Depth_Limit . '.';
        }

        $result = '';
        $surroundWithBrackets = true;
        foreach ($json as $jsonField => $jsonValue) {
            if (!empty($result)) {
                $result .= $delimiter;
            }
            if (gettype($jsonField) == 'string') {
                $surroundWithBrackets = false;
                $result .= "\"$jsonField\": ";
            }

            switch (gettype($jsonValue)) {
                case 'NULL':
                    $result .= 'null';
                    break;
                case 'boolean':
                    $result .= $jsonValue ? 'true' : 'false';
                    break;
                case 'integer':
                case 'double':
                    $result .= $jsonValue;
                    break;
                case 'string':
                    $result .= "\"$jsonValue\"";
                    break;
                case 'object':
                    $result .= self::formatJson(json: (array) $jsonValue, delimiter: ', ', depth: $depth + 1);
                    break;
                case 'array':
                    $result .= self::formatJson(json: $jsonValue, delimiter: ', ', depth: $depth + 1);
                    break;
            }
        }
        return ($surroundWithBrackets ? '[' : '{') . ($newLines ? "\r\n\t" : " ") . $result . ($newLines ? "\r\n" : " ") . ($surroundWithBrackets ? ']' : '}');
    }
}
