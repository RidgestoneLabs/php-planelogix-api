<?php

namespace PlaneLogixAPI\HttpClient\Util;

final class QueryStringBuilder
{
    /**
     * Encodes values into a query string.
     *
     * @param array $query
     *
     * @return string
     */
    public static function build(array $query): string
    {
        if (count($query) === 0) {
            return '';
        }

        return sprintf('?%s', http_build_query($query, '', '&', PHP_QUERY_RFC3986));
    }
}
