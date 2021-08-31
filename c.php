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
print("compression :\n");
print($output);
print("\n");


//Décompression

// L'idée est de remplacer les caracteres de output par les éléments de tables.
$bloc = "";
$decompresse = $output;

for($i = 0; $i < count($table); $i++)
{
    $bloc = substr('0'.$i,-2);
    $decompresse = str_replace($bloc, $table[$bloc], $decompresse);
}

print("DECOMPRESSION :\n");
print($decompresse);
print("\n");