

# Transform Cyrillic to Latin
Simply transform Cyrillic to latin. Also you can use it for making a link

## Usage
Just include "CyrToLat.php" file in you'r project and use it simply
 
 ##### Normal Cyrillic to Latin
   
    echo CyrToLat('Неки текст на ћирилици');
    //OUTPUT: Neki tekst na ćirilici

##### Cyrillic to Short Latin

    echo CyrToLat('Неки текст на ћирилици', 'ShortLatin');
    //OUTPUT: Neki tekst na cirilici
    
#####  Cyrillic to Latin url
    
    echo CyrToLat('Неки текст на ћирилици', 'url');
    //OUTPUT: neki-tekst-na-cirilici
