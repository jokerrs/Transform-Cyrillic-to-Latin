<?php
/**
 *********************************************
 * @author JokerCMS | Nemanja Jeremic        *
 * @license GNU                              *
 * @version 1                                *
 *********************************************
 * @param $string                            *
 * @param $type ShortLatin|url|email|null    *
 * @return mixed|string                      *
 *********************************************
 */

function CyrToLat($string, $type = NULL) {
    // By default we just transform Cry To Latin
    $search = array( 'љ', 'њ', 'е', 'р', 'т', 'з', 'у', 'и', 'о', 'п', 'ш', 'ђ', 'а', 'с', 'д', 'ф', 'г', 'х', 'ј', 'к', 'л', 'ч', 'ћ', 'ж', 'ѕ', 'џ', 'ц', 'в', 'б', 'н', 'м', 'Љ', 'Њ', 'Е', 'Р', 'Т', 'З', 'У', 'И', 'О', 'П', 'Ш', 'Ђ', 'А', 'С', 'Д', 'Ф', 'Г', 'Х', 'Ј', 'К', 'Л', 'Ч', 'Ћ', 'Ж', 'Ѕ', 'Џ', 'Ц', 'В', 'Б', 'Н', 'М' );
    $replace = array( 'lj', 'nj', 'e', 'r', 't', 'z', 'u', 'i', 'o', 'p', 'š', 'đ', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'č', 'ć', 'z', 'z', 'dž', 'c', 'v', 'b', 'n', 'm', 'Lj', 'Nj', 'E', 'R', 'T', 'Z', 'U', 'I', 'O', 'P', 'Š', 'Đ', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Č', 'Ć', 'Z', 'Z', 'Dž', 'C', 'V', 'B', 'N', 'M' );
    $string = str_replace($search, $replace, $string);
    // If we need short latin we will use type ShortLatin
    if ( $type == 'ShortLatin' || $type == 'url'  || $type == 'email' ) {
        $search = array( 'ž', 'š', 'đ', 'ć', 'č', 'dž', 'Ž', 'Š', 'Đ', 'Ć', 'Č', 'Dž' );
        $replace = array( 'z', 's', 'dj', 'c', 'c', 'dz', 'Z', 'S', 'Dj', 'C', 'C', 'Dz' );
        $string = str_replace($search, $replace, $string);
    }
    // But if is type == 'url' we change also few more caracters
    if ( $type == 'url' || $type == 'email') {

        if($type == 'url'){
            $search = array('.','@','_');
            $replace = array('-','at','-');
            $string = str_replace($search, $replace, $string);
        }
        $string = mb_strtolower($string, "UTF-8");
        $search = array( ' ', ',', '!', '?', '/', '"', "'", '=', '\\', '/', ';', ':', '(', ')', '$', '%', '&', '^', '*', '#', '<', '>', '+', '`' );
        $replace = array( '-', '', '', '', '', '', '', '-', '', '', '-', '-', '-', '-', 'dollar', 'percent', 'and', '-', 'star', 'hash-tag', '-', '-', 'plus', '' );
        $string = str_replace($search, $replace, $string);
        
        // Check for email
        if($type == 'email'){
            $search = array('.','@');
            $replace = array('(dot)','(at)');
            $string = str_replace($search, $replace, $string);
        }
        
        // remove duplicate -
        $string = preg_replace('~-+~', '-', $string);
        // removing last -
        $string = rtrim($string,"-");
        // removing first -
        $string = ltrim($string, "-");
        
        }
    return $string;
}
