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
                if($check){
                    // 命名基準を確認する場合
                    $className = self::nameCheck($item);

                    if($className !== ""){
                        $classes[] = $className;
                    }
                }else{
                    // 命名基準を確認しない場合
                    $classes[] = $item;
                }
            }
        }

        $result = [
            "id" => $id,
            "classes" => $classes,
        ];

        return $result;
    }

    public static function htmlData(string $input,$check=true): array
    {
        // HTMLのデータを取得する
        $rawData = self::raw($input,$check);

        $result = [
            "id" => "",
            "classes" => "",
        ];

        if($rawData["id"] !== ""){
            $result["id"] = 'id="' . $rawData["id"] . '"';
        }

        if($rawData["classes"] !== []){
            $result["classes"] = 'class="' . implode(" ", $rawData["classes"]) . '"';
        }

        return $result;
    }

    public static function htmlAttribute(string $input,int $spaceMode=0,int $getMode=3,$check=true): string
    {
        // HTMLの属性を取得する
        // spaceModeについて、0はスペースなし、1は前に追加、2は後ろに追加、3は前と後ろに追加、その他は0とみなす
        // getModeについて、1はIDのみ取得、2はクラスのみ取得、3はIDとクラスを取得、その他は3とみなす
        $htmlData = self::htmlData($input,$check);
        $result = "";

        if($getMode === 1){
            $result = $htmlData["id"];
        }elseif($getMode === 2){
            $result = $htmlData["classes"];
        }else{
            $htmlData = array_filter($htmlData, function($value) {
                return $value !== "";
            });

            $result = implode(" ",$htmlData);
        }

        if($result !== ""){
            if($spaceMode === 1 || $spaceMode === 3){
                $result = " " . $result;
            }

            if($spaceMode === 2 || $spaceMode === 3){
                $result .= " ";
            }
        }

        return $result;
    }
}
