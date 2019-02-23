<?php

$textPattern = '/^[0-9a-zéùîâêàäëïüöûç\'\s-,.!?;:()"@=€$&#*£]+$/i'; //regex pour le contenu du message et le sujet
$namePattern = '#^[a-zA-Zéùîâêäëïüöûçæ\'\s-]+$#'; // regex pour le nom, la ville 
$phonePattern = '/^[0][1-9]([\/\- .]?[\d]{2}){4}$/'; //regex pour le numéro de téléphone
//Déclaration des régex
    $lastnameRegex = '/^[a-z _\'\-àâäéèêëîïôöûüùçæ]*$/i';
    $firstnameRegex = '/^[a-z _\'\-àâäéèêëîïôöûüùçæ]*$/i';
    $nameRegex = '/^[a-z _\'\-àâäéèêëîïôöûüùçæ]*$/i';
    $dateRegex = '/./';
    $phoneRegex = '/^[0][1-9]([\/\- .]?[\d]{2}){4}$/';
    $mailRegex = '/^[\w]*[.]?[\w]*[@][\w]*[.](fr|org|net|com)$/';
    $hourRegex = '/./';
    
    $loginRegex = '/^[0-9a-zéùîâêàäëïüöûç\'\s-,.!?;:()"@=€$&#*£]+$/i';
    $dateRegex = '/([1][\d]?|[2][\d]|[3][0-1])[\/\-._ ]?([1-9]|(10|11|12))[\/\-._ ]?[\d]{4}/';
    $mailRegex = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';
    $genderRegex = '[1|2]';
    $passwordRegex = '/^[0-9a-zéùîâêàäëïüöûç\'\s-,.!?;:()"@=€$&#*£]+$/i';
    $textRegex = '/^[\w\'\-\sàâäéèêëîïôöûüùç,.!\/;()"\n:$€£%µ?&#<>=+\-*@^_`\[\]{}~°²¤]*$/i';
    $typesRegex = '/(manga|manhua|manhwa|manfra)/i';
    $categorysRegex = '/(shonen|shojo|seinen|josei|doujinshi|amateur)/i';
    $statusRegex = '/(En cours|terminé|One shot|En pause|abandonné)/i';
    $countrysRegex = '';