<?php
dump($typesList);
/*$output = iterator_to_array(new \RecursiveIteratorIterator(new \RecursiveArrayIterator($typesList)), false);
var_export($output);*/

foreach($typesList as $type => $inner) {
    echo "<h2><a href='/news/types/{$type}'>$type</a></h2>";
    foreach($inner  as  $inner_key => $value) {
        echo "<p>$value</p>";
    }

}







   /*
    * echo "<a href='<?=route('types', ['title_id' => $brand])?>'>$type</a><br>";
    */

