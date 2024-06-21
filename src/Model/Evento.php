<?php 


class Evento
{
    private ?int $id;
    private string $title;
    private string $date;
    private string $description;


    public function __construct(?int $id, string $title, string $date, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->description = $description;
    }

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDate(){
        return $this->date;
    }
    public function getDescription(){
        return $this->description;
    }

}




?>