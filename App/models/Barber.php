<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 19/02/2019
 * Time: 13:51
 */

class Barber
{
    private $db;
    /**
     * Barber constructor.
     * On creation connects to DB
     */
    public function __construct(){
        $this->db = new Database;
    }

    /**
     * @return mixed
     */
    public function getAll(){
        $this->db->query('SELECT * FROM barbers');
        return $this->db->resultSet();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getBarberById($id){
        $this->db->query('SELECT * FROM barbers WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }
}