<?php 

namespace fwrw\TextHelper;

class TextHelper {

    
    public static function normalizeSpaces (string $text): string
    {
        return preg_replace('/\s+/', ' ', $text);
    }

    public static function cut (string $text = "", int $limit = 0, string $end = "", bool $lastSpace = false): string 
    {

        if($lastSpace) {
            for($i = 0; $i < $limit; $i++)
            {
                if($text[$i] === " "){
                    $lastWhitespace = $i;
                };
            }

            $newText = substr($text, 0, $lastWhitespace);
            return $newText . $end;
        };

        $newText = substr($text, 0, $limit);
        return $newText . $end;
    }
    
    public static function stripAccents (string $text): string
    {
        return iconv('UTF-8', 'ASCII//TRANSLIT', $text);
    }

    public static function clear (string $text, bool $numbers = false, bool $accents = false): string 
    {
        if($numbers && $accents){
            $specialChars = "!@#$%^&*()_+-=[]{}|;':,.<>?\/`´~¨¬§1234567890";
            $text = str_replace(str_split($specialChars), "", $text);  
            $text = TextHelper::stripAccents($text);
            return $text;            
        }

        if($numbers) {
            $specialChars = "!@#$%^&*()_+-=[]{}|;':,.<>?\/`´~¨¬§1234567890";
            $text = str_replace(str_split($specialChars), "", $text);
            return $text;
        }

        if($accents){
            $text = TextHelper::stripAccents($text);
            return $text;
        }

        $specialChars = "!@#$%^&*()_+-=[]{}|;':,.<>?\/`´~¨¬§";

        $text = str_replace(str_split($specialChars), "", $text);
        return $text;
    }

    public static function reverse(string $text): string 
    {
        $newText = "";
        for ($i = strlen($text) - 1 ; $i >= 0; $i--) { 
            $newText .= str_split($text)[$i];
        }
        return $newText;
    }

    public static function palindrome(string $text): bool 
    {
        $text = strtoupper($text);
        $reversed = strtoupper(TextHelper::reverse($text));
        if($text === $reversed){
            return true;
        }
        
        return false;
    }
    public static function capitalize (string $text) {
        $text = str_split($text);
        for($i = 0; $i < count($text); $i++){
            if($i == 0) {
                $text[$i] = strtoupper($text[$i]);
            }
            if($text[$i] == " "){
                $text[$i + 1] = strtoupper($text[$i + 1]);
            }
        }
        return implode($text);
    }
}

echo PHP_VERSION;

echo TextHelper::clear("Bom dia, você está linda hoje!!1", true, true);
?>