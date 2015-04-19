$keys = array_keys($_POST);
   foreach($keys as $key) {
    echo $key." ".($_POST[$key]);
   echo "<br>";