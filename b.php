<?php

// Original

$txt = "L'amour est toujours passion et désintéressé.
Il n'est jamais jaloux.
L'amour n'est ni prétentieux, ni orgueilleux.
Il n'est jamais grossier, ni égoïste.
Il n'est pas colérique.
Et il n'est pas rancunier.
L'amour ne se réjouit pas de tous les péchés d'autrui.
Mais trouve sa joie dans l'infinité.
Il excuse tout.
Il croit tout.
Il espère tout.
Et endure tout.
Voilà ce qu'est l'amour.";

print("texte : ".$txt);
print("\n");

//Compression


// on remplace les caractères
$input = str_replace("\n", ' ',$txt);
$input = str_replace("'", ' ', $input);
$input = str_replace(",", ' ', $input);
$input = str_replace(".", ' ', $input);


//on transforme la chaîne de caractères en tableau avec explode()
$mots = explode(' ', $input);

$table = array();

print_r("variable mots : ".$mots[5]);
print("\n");

$ii = 0;
for($i = 0; $i < count($mots); $i++)
{
    $found = false;
    //on contrôle si les valeurs trouvées dans $item, donc $table sont égales à celles de $mots.

    //on affecte une valeur à chaques mots, si déjà affecté on passe au prochain  
    //sinon on affecte dans $table.
    foreach($table as $item)
    {
        if($mots[$i] == $item)
        {
            $found = true;
        }
    }
    if($found == false)
    {
        $c = substr('0'.$ii,-2);
        $table[$c] = $mots[$i];
        $ii++;
    }
}

print_r($table);
print("\n");

//on convertit $output par les index de $table
$output = $txt;
for($i = 0; $i< count($table); $i++)
{
    $c = substr('0'.$i,-2);

    $output = str_replace($table[$c], $c, $output);
}

print($output);
print("\n");


//Décompression

// on remplace les caractères dans la chaîne $output
$input2 = str_replace("\n", ' ',$output);
$input2 = str_replace("'", ' ', $input2);
$input2 = str_replace(",", ' ', $input2);
$input2 = str_replace(".", ' ', $input2);

$compress = str_replace(" ",'',$input2);

print($compress);
print("\n");

//test 

$index = substr($compress, 4, 2); // substr fonctionnement : dans compress, apres le 4eme caractere sur 2 caracteres
print("test index : ".$index);
print("\n");
print("longueur compress : ".strlen($compress));
print("\n");

// convertir $input2 depuis $table

$output2 = $output;

for($i = 0; $i < (strlen($compress)); $i+=2)
{

    $index = substr($compress, $i, 2);

    $output2 = str_replace($index, $table[$index], $output2);
}

print("test output2 : ".$output2);
print("\n");

