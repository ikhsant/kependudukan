<?php

function hash_password($postdata, $primary, $xcrud){
    $postdata->set('password', sha1( $postdata->get('password') ));
}

// after insert
function redirect($postdata, $primary, $xcrud){
    echo "<script>window.location = 'index.php'</script>";
}