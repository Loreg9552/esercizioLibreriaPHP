<?php

class Libro{
    private $titolo;
    private $autore;
    private $annoPubblicazione;
    private $codiceIsbn;
    private $numeroCopie;
    //variabili statiche per registrare il numero di lbri imprestati e totali
    private static $numeroLibriTotali =0;
    private static $numeroLibriPrestati =0;

    // metodo costruttore in cui verifico che tutti i campi siano corretti
    public function __construct($titolo,$autore,$annoPubblicazione,$codiceIsbn,$numeroCopie){
        $this->titolo = $this->setTitolo($titolo);
        $this->autore = $this->setAutore($autore);
        $this->annoPubblicazione = $this->setAnnoPubblicazione($annoPubblicazione);
        $this->codiceIsbn = $this->setCodiceIsbn($codiceIsbn);
        $this->numeroCopie = $this->setNumeroCopie($numeroCopie);
        self::$numeroLibriTotali++;
    }

    //metodi getter
    public function getTitolo(){
        return $this->titolo;
    }
    public function getAutore(){
        return $this->autore;
    }
    public function getAnnoPubblicazione(){
        return $this->annoPubblicazione;
    }
    public function getCodiceIsbn(){
        return $this->codiceIsbn;
    }
    public function getNumeroCopie(){
        return $this->numeroCopie;
    }
    //metodi statici getter per recuperare le due variabili statiche
    public  static function getNumeroLibriTotali(){
        return self::$numeroLibriTotali;
    }
    public static function getNumeroLibriPrestati(){
        return self::$numeroLibriPrestati;
    }
    //metodi setter 
    public function setTitolo($titolo){
        if( is_string($titolo) && trim($titolo) != "")
            return ucfirst($titolo);
        else
            exit("il titolo inserito non è valido");
    }
    public function setAutore($autore){
        if( is_string($autore) && trim($autore) != "")
            return ucwords($autore);
        else
            exit("l'autore inserito non è valido");
    }
    public function setCodiceIsbn($codiceIsbn){
        if( is_string($codiceIsbn) && trim($codiceIsbn) != "" && strlen($codiceIsbn) == 13)
            return trim($codiceIsbn);
        else
            exit("il codice isbn inserito non è valido");
    }
    public function setAnnoPubblicazione($annoPubblicazione){
        if($annoPubblicazione <= 2027)
            return $annoPubblicazione;
        else
            exit("l'anno inserito non è valido");
    }
    public function setNumeroCopie($numeroCopie){
       if($numeroCopie >0)
            return $numeroCopie;
        else
            exit("il numero di copie inserito non è valido");
    }
    //metodi personali
    //stampa le informazioni di un singolo libro
    public function stampaInformazioniLibro(){
        return "--titolo: " . $this->titolo . "--\n" .
             "--autore: " . $this->autore . "--\n" .
             "--anno di pubblicazione: " . $this->annoPubblicazione . "--\n" .
             "--codice ISBN: " . $this->codiceIsbn . "\n" .
             "--numero copie disponibli: " . $this->numeroCopie . "--\n" .
             "--età libro: " . (date('Y')-$this->annoPubblicazione) . "--\n" . 
             "-------------------------------------------------------------\n\n";
    }
    //restituisce se un libro è ancora disponibile o meno
    public function disponibile(){
        return ($this->numeroCopie > 0) ? "disponibile":"non disponibile";
    }
    //fa prendere in prestito un libro se ci sono copie
    public function prendiInPrestito(){
        if($this->numeroCopie > 0){
            $this->numeroCopie --;
            self::$numeroLibriPrestati++;
            return "una copia del libro " . $this->titolo . " è stata presa in prestito(copie rimaste: " . $this->numeroCopie . ")\n\n";
        }
        else
            return "le copie del libro " . $this->titolo . " non sono piu disponibili! \n\n";
    }
    //restituisce un libro alla bibblioteca
    public function restituisciLibro(){
        $this->numeroCopie ++;
        return "una copia del libro " . $this->titolo . " è stata restituita(copie rimaste: " . $this->numeroCopie . ")\n\n";
        
    }
    
}
?>