<?php

namespace Ponponumi\HtmlAttributeCreate;

class Create
{
    public static function raw(string $input,$check=true): array
    {
        // rawデータを返す
        $input = preg_replace('/[^A-Za-z0-9\-\_\.#]/', '.', $input);
        $input = str_replace("#", ".#", $input);
        $cleaned = preg_replace('/\.{2,}/', '.', $input);
        $cleaned = trim($cleaned, '.');

        $result = [];

        return $result;
    }
}
