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

        $inputList = explode(".", $cleaned);

        $classes = [];
        $id = "";

        foreach($inputList as $item){
            if(str_contains($item,"#")){
                // IDの場合
                if($id === ""){
                    $id = str_replace("#", "", $item);
                }
            }else{
                // クラスの場合
            }
        }

        $result = [];

        return $result;
    }
}
