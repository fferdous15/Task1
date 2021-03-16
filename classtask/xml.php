<?php
$simplexml = new SimpleXMLElement('<?xml version= "1.0"?><books/>');
$book1= $simplexml->addChild('book');
$book1->addChild("Book title", "The wandering Oz");
$book1->addChild("Publication Date", 2007);

$book2= $simplexml->addChild('book');
$book2->addChild("Book title", "The Roaming Fox");
$book2->addChild("Publication Date", 2009);

file_put_contents('books.xml', $simplexml->asXML());
?>