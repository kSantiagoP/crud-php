<?php 


class EventRepository
{
    private PDO $pdo;    

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getEventos(){
      
        try{
            $query = "SELECT * FROM eventos ORDER BY `date`";
            $call = $this->pdo->query($query);
            $eventos = $call->fetchAll(PDO::FETCH_ASSOC);
            $dados = array_map(function ($evento){
                return new Evento($evento['id'], 
                                $evento['title'],
                                $evento['date'], 
                                $evento['description']);
            }, $eventos);
    
            return $dados;
        }
        catch(Exception $e){
            exit("Não foi possível resgatar os Eventos da agenda: ". $e->getMessage());
        }

    }

    public function deleteEvent(int $id){
        try{
            $query = "DELETE FROM eventos WHERE id= ?";
            $call = $this->pdo->prepare($query);
            $call->bindValue(1, $id);
            $call->execute();
        }
        catch(Exception $e){
            exit("Não foi possível excluir dados do banco: ". $e->getMessage());
        }


    }

    public function insertEvent(Evento $evento){

        try{
            $query = "INSERT INTO eventos (`title`, `date`, `description`) VALUES (?,?,?)";
            $call = $this->pdo->prepare($query);
            $call->bindValue(1, $evento->getTitle());
            $call->bindValue(2, $evento->getDate());
            $call->bindValue(3, $evento->getDescription());
            $call->execute();            
        }catch(Exception $e){
            exit("Não foi possível inserir um novo evento na agenda: " . $e->getMessage());
        }
        

    }

    public function getEventById(int $id){
        
        try{
            $query = "SELECT * FROM eventos WHERE id= ?";
        
            $call = $this->pdo->prepare($query);
            $call->bindValue(1, $id);
            $call->execute();
    
            $dados = $call->fetch(PDO::FETCH_ASSOC);
    
    
            return new Evento($dados['id'],$dados['title'], $dados['date'], $dados['description']);
        }catch(Exception $e){
            exit("Não foi possível resgatar o evento a ser editado: " . $e->getMessage());
        }

    }

    public function updateEvent(Evento $event){
        
        try{
            $query = "UPDATE eventos SET `title` = ?, `date` = ?, `description` = ? WHERE id = ?";

            $call = $this->pdo->prepare($query);
            $call->bindValue(1, $event->getTitle());
            $call->bindValue(2, $event->getDate());
            $call->bindValue(3, $event->getDescription());
            $call->bindValue(4, $event->getId());
    
            $call->execute();             
        }catch(Exception $e){
            exit("Não foi possível editar o evento: " . $e->getMessage());
        }

    }

}




?>