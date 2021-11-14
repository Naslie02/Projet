<?php

class MusiqueBuilder extends AbstractBuilder {

  public function __construct(array $d) {
    parent::__construct($d);
  }

  public function isValid() : bool {
    $this->error = array();
    // Met à jour toutes les valeurs inexistantes ou nulles à une chaine vide
    // TODO : Utiliser les références à la place des propriétés
    $reflection = new ReflectionClass(Musique::class);
    foreach ($reflection->getProperties() as $propriete) {
      $key = $propriete->getName();
      $this->data[$key] = parent::getValue($key);
    }
    // Si la jaquette est renseignée, on effectue une vérifcation
    if ($this->data[Musique::REF_JAQUETTE] !== "") {
      // On récupère la liste des jacquettes
      $path = Router::getUploadPath()."/jaquettes/";
      $dir = scandir($path);
      // Si la jacquette n'a pas de fichier correspondant
      if (!in_array($this->data[Musique::REF_JAQUETTE], $dir, true))
        $this->data[Musique::REF_JAQUETTE] = "empty.png";
    // Si elle n'est pas renseignée, on lui attribue la jaquette par défaut
    } else
      $this->data[Musique::REF_JAQUETTE] = "empty.png";
    // On considère que le titre et l'auteur sont nécessaires,
    // les autres champs peuvent être vides
    if ($this->data[Musique::REF_TITRE] === "")
      $this->error[Musique::REF_TITRE] = "Le titre doit être renseigné";
    if ($this->data[Musique::REF_AUTEUR] === "")
      $this->error[Musique::REF_AUTEUR] = "Le nom de l'auteur ou du groupe d'auteurs doit être renseigné";
    return empty($this->error);
  }

  public function build() {
    if ($this->isValid())
      return new Musique(
        $this->data[Musique::REF_ID],
        $this->data[Musique::REF_TITRE],
        $this->data[Musique::REF_AUTEUR],
        $this->data[Musique::REF_DATESORTIE],
        $this->data[Musique::REF_JAQUETTE],
        $this->data[Musique::REF_LABEL],
        $this->data[Musique::REF_LIEN],
        $this->data[Musique::REF_GENRE],
        $this->data[Musique::REF_PROPRIETAIRE]
      );
    else
      throw new InvalidArgumentException(implode(" ; ", $this->error));
  }
}

?>
