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

    public static function printFromFile(string $path, bool $newLines = true): void
    {
        self::print(json: file_get_contents($path), newLines: $newLines);
    }

    public static function print(string|array|object $json, bool $newLines = true): void
    {
        switch (gettype($json)) {
            case 'string':
                $json = json_decode($json);
                if (!$json) {
                    echo '';
                }
                break;
            case 'object':
                $json = (array) $json;
                break;
        }
        echo self::formatJson(json: $json, newLines: $newLines, delimiter: $newLines ? ",\r\n\t" : ", ");
    }

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
