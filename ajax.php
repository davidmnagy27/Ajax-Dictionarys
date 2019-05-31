<?php

require '/home/dnagygre/config2.php';
$dbh = new PDO( DB_DSN, DB_USERNAME,DB_PASSWORD);

$choice = $_POST['choice'];

$dictionary = array('jquery'=>'A JavaScript library that allows web developers to add extra functionality to 
    their websites.', 'javascript'=>'an object-oriented computer programming language commonly used to create 
    interactive effects within web browsers.', 'java'=>'coffee.', 'html'=>'Hypertext Markup Language, a standardized 
    system for tagging text files to achieve font, color, graphic, and hyperlink effects on World Wide Web pages.',
    'php'=>'an HTML-embedded Web scripting language. ');

$sql = 'SELECT * FROM dictionary WHERE word = :word';

$statement = $dbh->prepare($sql);

$statement->bindParam(':word', $choice, PDO::PARAM_STR);

$statement->execute();

//echo $dictionary[$choice];

$row = $statement->fetch(PDO::FETCH_ASSOC);
echo $row['definition'];

