<?php
/**
 * @author Jeremic Nemanja nemanja@joker.rs
 * @license MIT
 * @version 0.0.8
 */


/**
 * @param string $string
 * @param string|NULL $type
 * @return string
 */
function cyrToLat(string $string, ?string $type = null):string
{
    // By default we just transform Cry To Latin
    $CyrToLat =  array(
        'љ' => 'lj', 'њ' => 'nj', 'е' => 'e', 'р' => 'r', 'т' => 't', 'з' => 'z', 'у' => 'u', 'и' => 'i', 'о' => 'o', 'п' => 'p',
        'ш' => 'š', 'ђ' => 'đ', 'а' => 'a', 'с' => 's', 'д' => 'd', 'ф' => 'f', 'г' => 'g', 'х' => 'h', 'ј' => 'j', 'к' => 'k',
        'л' => 'l', 'ч' => 'č', 'ћ' => 'ć', 'ж' => 'ž', 'ѕ' => 's', 'џ' => 'dž', 'ц' => 'c', 'в' => 'v', 'б' => 'b', 'н' => 'n',
        'м' => 'm', 'Љ' => 'Lj', 'Њ' => 'Nj', 'Е' => 'E', 'Р' => 'R', 'Т' => 'T', 'З' => 'Z', 'У' => 'U', 'И' => 'I', 'О' => 'O',
        'П' => 'P', 'Ш' => 'Š', 'Ђ' => 'Đ', 'А' => 'A', 'С' => 'S', 'Д' => 'D', 'Ф' => 'F', 'Г' => 'G', 'Х' => 'H', 'Ј' => 'J',
        'К' => 'K', 'Л' => 'L', 'Ч' => 'Č', 'Ћ' => 'Ć', 'Ж' => 'Ž', 'Ѕ' => 'S', 'Џ' => 'Dž', 'Ц' => 'C', 'В' => 'V', 'Б' => 'B',
        'Н' => 'N', 'М' => 'M');
    $string = strtr($string, $CyrToLat);
    // If we need short latin we will use type ShortLatin
    if ( $type === 'ShortLatin' || $type === 'url' || $type === 'email' ) {
        $ShortLatin = array(
            'ž' => 'z', 'š' => 's', 'đ' => 'dj', 'ć' => 'c', 'č' => 'c', 'dž' => 'dz',
            'Ž' => 'Z', 'Š' => 'S', 'Đ' => 'Dj', 'Ć' => 'C', 'Č' => 'C', 'Dž' => 'Dz');
        $string = strtr($string, $ShortLatin);
    }
    // Check for email
    if ( $type === 'email' ) {
        $email = array('.' => '(dot)', '@' => '(at)');
        $string = strtr($string, $email);
    }
    // Check for url
    if ( $type === 'url' ) {
        $url = array('.' => '-','@' => '-at-', '_' => '-', '('  => '-', ')'  => '-',);
        $string = strtr($string, $url);
    }
    // But if is type == 'url' we change also few more characters
    if ( $type === 'url' || $type === 'email' ) {
        $CyrToLat = array(
            ' ' => '-', ','  => '', '!'  => '', '?'  => '', '/'  => '',
            '"'  => '', "'"  => '', '='  => '-', '\\'  => '', '~'  => '-',
            ';'  => '-', ':'  => '-',  '$'  => '-dollar-', '%'  => '-percent-',
            '&'  => '-and-', '^'  => '-', '*'  => 'star', '#'  => '-hash-tag-',
            '<'  => '-', '>'  => '-', '+'  => '-plus-', '`'  => '');
        $string = strtr($string, $CyrToLat);

        // remove duplicate -
        $string = preg_replace('~-+~', '-', $string);
        // removing last -
        $string = rtrim($string, '-');
        // removing first -
        $string = ltrim($string, '-');
    }

    return $string;
}
