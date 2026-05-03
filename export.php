<?php
$products = json_decode(file_get_contents(__DIR__ . '/products.json'), true);

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><termekek/>');

foreach ($products as $product) {
    if ($product['stock'] <= 0) {
        continue;
    }
    $item = $xml->addChild('termek');
    $item->addChild('nev', htmlspecialchars($product['name']));
    $item->addChild('ar', $product['price']);
    $item->addChild('keszlet', $product['stock']);
}

header('Content-Type: application/xml; charset=utf-8');
header('Content-Disposition: attachment; filename="termekek_export.xml"');
echo $xml->asXML();
