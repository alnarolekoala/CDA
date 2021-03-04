<?php


class Disc extends DiscsEntity
{
    public function __construct()
    {
        $this->table = 'disc';
        $this->getConnection();
    }


    /**
     * récupération de toutes les données de disc
     * @return array
     */
    public function getDiscsInformations(): array
    {
        $query = 'SELECT ' . $this->table . '.`id`, `disc_title`, `disc_year`, `disc_picture` , `disc_label` , `disc_genre` , `disc_price` , `artist_name` FROM ' . $this->table . ' INNER JOIN `artist` ON ' . $this->table . '.`artist_id` = `artist`.`id`';
        $result = $this->_con->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_OBJ);

    }

    /**
     * récupération des données d'un disc selon son id
     * @param $id
     * @return mixed
     */
    public function getOneDiscById($id)
    {
        $query = 'SELECT ' . $this->table . '.`id`, `disc_title`, `disc_year`, `disc_picture` , `disc_label` , `disc_genre` , `disc_price` , `artist_id` FROM ' . $this->table . ' INNER JOIN `artist` ON ' . $this->table . '.`artist_id` = `artist`.`id` WHERE ' . $this->table . '.`id` = :id';
        $result = $this->_con->prepare($query);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }


    /**
     * modification des données dans la table disc
     * @param $id
     * @return bool
     */
    public function updateDisc($id): bool
    {
        $query = 'UPDATE ' . $this->table . ' SET `disc_title` = :title, `disc_year` = :year, `disc_picture` = :picture, `disc_label` = :label, `disc_genre` = :genre, `disc_price` = :price, `artist_id` = :artist WHERE `id` = :id';
        $result = $this->_con->prepare($query);
        $result->bindValue(':title', $this->disc_title, PDO::PARAM_STR);
        $result->bindValue(':year', $this->disc_year, PDO::PARAM_INT);
        $result->bindvalue(':picture', $this->disc_picture, PDO::PARAM_STR);
        $result->bindvalue(':label', $this->disc_label, PDO::PARAM_STR);
        $result->bindvalue(':genre', $this->disc_genre, PDO::PARAM_STR);
        $result->bindvalue(':price', $this->disc_price, PDO::PARAM_STR);
        $result->bindvalue(':artist', $this->artist_id, PDO::PARAM_INT);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    /**
     * ajout de données dans la table disc
     * @return bool
     */
    public function addDisc(): bool
    {
        $query = 'INSERT INTO `disc` (`disc_title`, `disc_year`, `disc_picture`, `disc_label`, `disc_genre`, `disc_price`, `artist_id`) VALUES (:title, :year, :picture, :label, :genre, :price, :artist)';
        $result = $this->_con->prepare($query);
        $result->bindValue(':title', $this->disc_title, PDO::PARAM_STR);
        $result->bindValue(':year', $this->disc_year, PDO::PARAM_INT);
        $result->bindValue(':picture', $this->disc_picture, PDO::PARAM_STR);
        $result->bindValue(':label', $this->disc_label, PDO::PARAM_STR);
        $result->bindValue(':genre', $this->disc_genre, PDO::PARAM_STR);
        $result->bindValue(':price', $this->disc_price, PDO::PARAM_STR);
        $result->bindValue(':artist', $this->artist_id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Suppression d'une ligne de la table disc
     * @param $id
     * @return bool
     */
    public function deleteDisc($id): bool
    {
        $query = 'DELETE FROM `disc` WHERE `id` = :id';
        $result = $this->_con->prepare($query);
        $result->bindValue(':id', $id, PDO::PARAM_STR);
        return $result->execute();
    }
// compte le nombre d'occurence pour le titre choisis
    public function getDiscByTitle($title)
    {
        $query = 'SELECT COUNT(*) FROM ' . $this->table . ' WHERE `disc_title` = :title';
        $result = $this->_con->prepare($query);
        $result->bindValue(':title', $title, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }
}