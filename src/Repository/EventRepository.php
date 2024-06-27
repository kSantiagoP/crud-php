<?php
class EventRepository
{
    private PDO $pdo;    

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    //This one and pretty much every method implemented has try catch
    //As the main source of error detection. That's not exactly scalable
    //as it is but works on a small scale project such as this
    public function getEvent(){

        try{
            $query = "SELECT * FROM events ORDER BY `date`";
            $call = $this->pdo->query($query);
            $events = $call->fetchAll(PDO::FETCH_ASSOC);
            return array_map(function ($event){
                return new Event($event['id'],
                                $event['title'],
                                $event['date'],
                                $event['description']);
            }, $events);
        }
        catch(Exception $e){
            exit("Could not retrieve data from the database: ". $e->getMessage());
        }

    }

    public function deleteEvent(int $id){
        try{
            //Preparing and binding values are done to prevent SQL injection
            $query = "DELETE FROM events WHERE id= ?";
            $call = $this->pdo->prepare($query);
            $call->bindValue(1, $id);
            $call->execute();
        }
        catch(Exception $e){
            exit("Could not exclude data from database: ". $e->getMessage());
        }


    }

    public function insertEvent(Event $event){

        try{
            //Preparing and Binding values to prevent SQL injection
            $query = "INSERT INTO events (`title`, `date`, `description`) VALUES (?,?,?)";
            $call = $this->pdo->prepare($query);
            $call->bindValue(1, $event->getTitle());
            $call->bindValue(2, $event->getDate());
            $call->bindValue(3, $event->getDescription());
            $call->execute();            
        }catch(Exception $e){
            exit("Could not insert data into the database: " . $e->getMessage());
        }
        

    }

    public function getEventById(int $id){
        
        try{
            //Preparing and Binding values to prevent SQL injection
            $query = "SELECT * FROM events WHERE id= ?";
            $call = $this->pdo->prepare($query);
            $call->bindValue(1, $id);
            $call->execute();
            $data = $call->fetch(PDO::FETCH_ASSOC);

            return new Event($data['id'],$data['title'], $data['date'], $data['description']);
        }catch(Exception $e){
            exit("Could not get data to be updated: " . $e->getMessage());
        }

    }

    public function updateEvent(Event $event){
        
        try{
            //Preparing and Binding values to prevent SQL injection
            $query = "UPDATE events SET `title` = ?, `date` = ?, `description` = ? WHERE id = ?";
            $call = $this->pdo->prepare($query);
            $call->bindValue(1, $event->getTitle());
            $call->bindValue(2, $event->getDate());
            $call->bindValue(3, $event->getDescription());
            $call->bindValue(4, $event->getId());
            $call->execute();             
        }catch(Exception $e){
            exit("Could not update data from the database: " . $e->getMessage());
        }

    }

}