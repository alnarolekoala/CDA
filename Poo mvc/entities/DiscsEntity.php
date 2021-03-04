<?php


class DiscsEntity extends Model
{
    public int $id;

    public string $disc_title;

    public int $disc_year;

    public string $disc_picture;

    public string $disc_label;

    public string $disc_genre;

    public string $disc_price;

    public int $artist_id;

// ID
    public function getId(): int
    {
        return $this->id;
    }

// TITLE
    public function getDiscTitle(): string
    {
        return $this->disc_title;
    }

    public function setDiscTitle(string $title)
    {
        $this->disc_title = $title;
        return $this;
    }

    // YEAR

    public function getDiscYear(): int
    {
        return $this->disc_year;
    }

    public function setDiscYear(int $year)
    {
        $this->disc_year = $year;
        return $this;
    }

    // picture

    public function getDiscPicture() : string
    {
        return $this->disc_picture;
    }

    public function setDiscPicture(string $picture)
    {
        $this->disc_picture= $picture;
        return $this;
    }

    //label

    public function getDiscLabel() : string
    {
        return $this->disc_label;
    }

    public function setDiscLabel(string $label)
    {
        $this->disc_label= $label;
        return $this;
    }

    //genre

    public function getDiscGenre() : string
    {
        return $this->disc_genre;
    }

    public function setDiscGenre(string $genre)
    {
        $this->disc_genre= $genre;
        return $this;
    }

    //price

    public function getDiscPrice() : string
    {
        return $this->disc_price;
    }

    public function setDiscPrice(string $price)
    {
        $this->disc_price= $price;
        return $this;
    }


    public function getArtistID(): int
    {
        return $this->artist_id;
    }

    public function setArtistID(int $artist_id)
    {
        $this->artist_id = $artist_id;
        return $this;
    }
}





