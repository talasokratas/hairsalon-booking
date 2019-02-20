<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 19/02/2019
 * Time: 20:11
 */

class Client
{
    private $db;

    /**
     * Client constructor.
     */
    public function __construct(){
        $this->db = new Database;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getClientByName($name){
        $this->db->query('SELECT * FROM clients WHERE name = :name');
        $this->db->bind(':name', $name);
        return $this->db->single();
    }

    /**
     * @param $id
     * @return bool
     */
    public function hasReservation($id) {
        $this->db->query('SELECT * FROM reservations WHERE client_id =:id AND date > CURDATE() and completed = 0');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if (!empty($row)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $name
     * @return bool
     *
     */
    public function register($name) {
        $this->db->query('INSERT INTO clients (name, visit) VALUES (:name, 0)');
        $this->db->bind(':name', $name);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function addVisit($id) {
        $this->db->query('UPDATE clients SET visit = visit + 1 WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


}