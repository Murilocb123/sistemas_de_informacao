<?php

echo '<h1>$_REQUEST</h1>';

foreach ($_REQUEST as $key => $value) {
    echo $key . ' = ' . $value . '<br>';
}

echo '<br>';

echo '<h1>$_SERVER</h1>';
foreach ($_SERVER as $key => $value) {
    echo $key . ' = ' . $value . '<br>';
}

echo '<br>';

echo '<h1>apache_request_headers()</h1>';

foreach (apache_request_headers() as $key => $value) {
    echo $key . ' = ' . $value . '<br>';
}
