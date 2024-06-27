<?php
class Event
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

    public function getId() : int{
        return $this->id;
    }
    public function getTitle() : string{
        return $this->title;
    }
    public function getDate() : string{
        return $this->date;
    }
    public function getDescription() : string{
        return $this->description;
    }

}