<?php 

$redis = new Redis();                  // Initializing Redis
$redis -> connect('localhost', 6379); 

if($redis){ 
    $redis -> set('mykey', 234); 
    $redis -> set('mynewkey', 'myvalue'); 

    echo $redis -> get('mynewkey');   // After Successful Connection, we get the key value
}
// phpinfo();
?>