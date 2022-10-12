<?php

namespace PlaneLogixAPI\HttpClient\Util;

use PlaneLogixAPI\Exception\RuntimeException;
use stdClass;

final class JsonObject
{
    /**
     * Create an empty stdClass object.
     *
     * @return stdClass
     */
    public static function empty(): stdClass
    {
        return new stdClass();
    }

    /**
     * Decode a JSON string into a PHP object.
     *
     * @param string $json
     *
     * @return stdClass|stdClass[]
     * @throws RuntimeException
     */
    public static function decode(string $json)
    {
        $data = json_decode($json);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException(sprintf('json_decode error: %s', json_last_error_msg()));
        }

        if (!$data instanceof stdClass && !is_array($data)) {
            throw new RuntimeException(
                sprintf('json_decode error: Expected JSON of type object, %s given.', get_debug_type($data))
            );
        }

        return $data;
    }

    /**
     * Encode a PHP array into a JSON string.
     *
     * @param array $value
     *
     * @return string
     * @throws RuntimeException
     *
     */
    public static function encode(array $value): string
    {
        $json = json_encode($value);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException(\sprintf('json_encode error: %s', json_last_error_msg()));
        }

        return $json;
    }
}
