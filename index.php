<?php

require_once "libro.php";
require_once "funzioni.php";

$libro1 = new Libro("Il nome della rosa", "Umberto Eco", 1980, "978-884524720", 4);
$libro2 = new Libro("I Promessi Sposi", "Alessandro Manzoni", 1827, "978-880620803", 2);
$libro3 = new Libro("1984", "George Orwell", 1949, "978-880464293", 5);
$libro4 = new Libro("La solitudine dei numeri primi", "Paolo Giordano", 2008, "978-880457703", 3);
$libro5 = new Libro("Il piccolo principe", "Antoine de Saint-Exupéry", 1943, "978-880465839", 6);

$libri = [];
array_push($libri,$libro1,$libro2,$libro3,$libro4,$libro5);

//movimenti della giornata
echo $libro1->prendiInPrestito();
echo "stato libro " . $libro2->getTitolo() . ":".$libro2->disponibile() . "\n\n";
echo$libro2->prendiInPrestito();
echo $libro3->prendiInPrestito();
echo $libro2->restituisciLibro();
echo $libro5->prendiInPrestito();
echo $libro4->prendiInPrestito();
echo $libro1->restituisciLibro();
echo $libro2->prendiInPrestito();
echo $libro2->prendiInPrestito();
echo $libro2->prendiInPrestito();
//stampo il report finale
stampaReport($libri);
?>