<?php

namespace Tests\Unit;

use Exercises\Json\Json;
use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    /**
     * @outputBuffering disabled
     */
    public function test_that_print_from_json_file_is_outputted_as_expected(): void
    {
        $this->expectOutputString("[\r\n\t{ \"name\": \"Eryn Bryan\", \"age\": \"23\", \"company\": \"Fishnix\" },\r\n\t{ \"name\": \"Hasnain O'Ryan\", \"age\": \"32\", \"company\": \"Floataris\" },\r\n\t{ \"name\": \"Briony Mathews\", \"age\": \"40\", \"company\": \"Swishterix\" }\r\n]");
        Json::printFromFile(path: './storage/test_1.json');
    }

    /**
     * @outputBuffering disabled
     */
    public function test_that_json_string_with_int_outputs_as_expected(): void
    {
        $this->expectOutputString("{ \"count\": 12 }");
        Json::print(json: (object) ["count" => 12], newLines: false);
    }

    /**
     * @outputBuffering disabled
     */
    public function test_that_json_string_with_double_outputs_as_expected(): void
    {
        $this->expectOutputString("{ \"money\": 1.2 }");
        Json::print(json: (object) ["money" => 1.2], newLines: false);
    }

    /**
     * @outputBuffering disabled
     */
    public function test_that_json_string_with_null_outputs_as_expected(): void
    {
        $this->expectOutputString("{ \"love\": null }");
        Json::print(json: (object) ["love" => null], newLines: false);
    }

    /**
     * @outputBuffering disabled
     */
    public function test_that_json_string_with_bool_outputs_as_expected(): void
    {
        $this->expectOutputString("{ \"passed\": true }");
        Json::print(json: (object) ["passed" => true], newLines: false);
    }
}
