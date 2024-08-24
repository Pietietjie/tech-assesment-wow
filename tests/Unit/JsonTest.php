<?php

namespace Tests\Unit;

use Exercises\Json\Json;
use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    public function test_that_print_from_json_file_is_outputted_as_expected(): void
    {
        $this->assertEquals(
            expected: "[\r\n\t{ \"name\": \"Eryn Bryan\", \"age\": \"23\", \"company\": \"Fishnix\" },\r\n\t{ \"name\": \"Hasnain O'Ryan\", \"age\": \"32\", \"company\": \"Floataris\" },\r\n\t{ \"name\": \"Briony Mathews\", \"age\": \"40\", \"company\": \"Swishterix\" }\r\n]",
            actual: Json::printFromFile(path: './storage/test_1.json')
        );
    }

    public function test_that_json_string_with_int_outputs_as_expected(): void
    {
        $this->assertEquals(
            expected: "{ \"count\": 12 }",
            actual: Json::print(json: (object) ["count" => 12], newLines: false)
        );
    }

    public function test_that_json_string_with_double_outputs_as_expected(): void
    {
        $this->assertEquals(
            expected: "{ \"money\": 1.2 }",
            actual: Json::print(json: (object) ["money" => 1.2], newLines: false)
        );
    }

    public function test_that_json_string_with_null_outputs_as_expected(): void
    {
        $this->assertEquals(
            expected: "{ \"love\": null }",
            actual: Json::print(json: (object) ["love" => null], newLines: false)
        );
    }

    public function test_that_json_string_with_bool_outputs_as_expected(): void
    {
        $this->assertEquals(
            expected: "{ \"passed\": true }",
            actual: Json::print(json: (object) ["passed" => true], newLines: false)
        );
    }
}
