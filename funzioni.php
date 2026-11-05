<?php

require_once "libro.php";

//stampa il report; essendo statico posso richiamarlo senza aver bisogno di creare un istanza di Libro
function stampaReport($libri){
    /*ciclo l'array contenente i libri della bibblioteca dato in input per capire quale
        sia il piu' vecchio,quello con piu copie e il numero totale di copie
        per i primi due casi creo due istanze di libri che vengono poi sostituite
    */
    $numeroTotaleCopie = 0;
    //creo degli oggetti temporanei
    $piucopie = $libri[0];
    $piuAntico = $libri[0];
    //trovo il libro piu' antico,quello con piu' copie e il numero totale di copie
    foreach($libri as $libro){
        if ($libro->getAnnoPubblicazione() < $piuAntico->getAnnoPubblicazione()){
            $piuAntico = $libro;
        }
        if($libro->getNumeroCopie() > $piucopie->getNumeroCopie()){
            $piucopie = $libro;
        }
        $numeroTotaleCopie += $libro->getNumeroCopie();
    }
    //stampo il report
    echo "report bibblioteca: \n" .
         "numero totale libri: " . Libro::getNumeroLibriTotali() . "\n" .
         "libro con piu' copie in assoluto: " . $piucopie->getTitolo() . "\n" .
         "libro piu' antico: " . $piuAntico->getTitolo() . "\n" . 
         "numero totale di copie di tutti i libri: " . $numeroTotaleCopie . "\n" . 
         "numero libri imprestati oggi: " . Libro::getNumeroLibriPrestati() . "\n" . 
         "elenco dettagliato libri: \n";
    foreach($libri as $libro){
        echo $libro->stampaInformazioniLibro();
    }
}
?>