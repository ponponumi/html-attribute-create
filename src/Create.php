<?php

namespace Ponponumi\HtmlAttributeCreate;

class Create
{
    public static function nameCheck(string $name): string
    {
        // 名前の命名基準を確認する
        $check = preg_match('/^[a-zA-Z]/', $name) === 1;

        if($check){
            return $name;
        }else{
            return "";
        }
    }

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
                    $idName = str_replace("#", "", $item);

                    if($check){
                        // 命名基準を確認する場合
                        $idName = self::nameCheck($idName);

                        if($idName !== ""){
                            $id = $idName;
                        }
                    }else{
                        // 命名基準を確認しない場合
                        $id = $idName;
                    }
                }
            }else{
                // クラスの場合
                $classes[] = $item;
            }
        }

        $result = [
            "id" => $id,
            "classes" => $classes,
        ];

        return $result;
    }
}
