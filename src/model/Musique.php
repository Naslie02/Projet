<?php

class Musique {

  private $id, $titre, $auteur, $dateSortie;
  private $jaquette, $label, $lien, $genre;
  private $proprietaire;

  const REF_ID = 'id';
  const REF_TITRE = 'titre';
  const REF_AUTEUR = 'auteur';
  const REF_DATESORTIE = 'dateSortie';
  const REF_JAQUETTE = 'jaquette';
  const REF_LABEL = 'label';
  const REF_LIEN = 'lien';
  const REF_GENRE = 'genre';
  const REF_PROPRIETAIRE = 'proprietaire';

  public function __construct(
    string $id,
    string $titre,
    string $auteur,
    string $dateSortie,
    string $jaquette,
    string $label,
    string $lien,
    string $genre,
    string $proprietaire
  ) {
    $this->id = $id;
    $this->titre = $titre;
    $this->auteur = $auteur;
    $this->dateSortie = $dateSortie;
    $this->jaquette = $jaquette;
    $this->label = $label;
    $this->lien = $lien;
    $this->genre = $genre;
    $this->proprietaire = $proprietaire;
  }

  public function get(string $ref) : string {
    return $this->$ref;
  }

  public function getId() : string {
    return $this->id;
  }

  public function getTitre() : string {
    return $this->titre;
  }

  public function getAuteur() : string {
    return $this->auteur;
  }

  public function getDateSortie() : string {
    return $this->dateSortie;
  }

  public function getJaquette() : string {
    return $this->jaquette;
  }

  public function getLabel() : string {
    return $this->label;
  }

  public function getLien() : string {
    return $this->lien;
  }

  public function getGenre() : string {
    return $this->genre;
  }

  public function getProprietaire() : string {
    return $this->proprietaire;
  }
}

?>
