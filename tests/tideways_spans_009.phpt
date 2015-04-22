--TEST--
Tideways: curl_exec spans
--FILE--
<?php

require_once __DIR__ . '/common.php';

tideways_enable();

$ch = curl_init("http://localhost");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);

$ch = curl_init("http://localhost");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);

print_spans(tideways_get_spans());
tideways_disable();
--EXPECTF--
http: 2 timers - title=http://localhost/