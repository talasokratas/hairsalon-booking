<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 18/02/2019
 * Time: 19:02
 */

class Reservation
{
    private $db;

    /**
     * Reservation constructor.
     * On creation connects to DB
     */
    public function __construct(){
        $this->db = new Database;
    }

    /**
     * @return array of objects
     */
    public function getAll(){
        $this->db->query('SELECT p.id, 
                                   DATE_FORMAT(p.date, \'%m-%d\') as day,
                                   DATE_FORMAT(p.date, \'%H:%i\') as time,
                                   o.name as client,
                                   o.visit,
                                   p.client_id, 
                                   d.name as barber
                                   FROM reservations p 
                                      LEFT JOIN clients o ON p.client_id = o.id 
                                      LEFT JOIN barbers d ON p.barber_id = d.id 
                                      WHERE p.completed = 0 
                                      ORDER BY p.date');
        return $this->db->resultSet();
    }

    /**
     * @param $date
     * @return mixed
     */
    public function getAllByDAte($date){
        $this->db->query('SELECT p.id, 
                                   DATE_FORMAT(p.date, \'%m-%d\') as day,
                                   DATE_FORMAT(p.date, \'%H:%i\') as time,
                                   o.name as client,
                                   o.visit,
                                   p.client_id, 
                                   d.name as barber
                                   FROM reservations p 
                                      LEFT JOIN clients o ON p.client_id = o.id 
                                      LEFT JOIN barbers d ON p.barber_id = d.id 
                                      WHERE p.completed = 0  and DATE_FORMAT(p.date, \'%Y-%m-%d\') = :date 
                                      ORDER BY p.date');
        $this->db->bind(':date', $date);
        return $this->db->resultSet();
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteReservation($id){
        $this->db->query('DELETE FROM reservations WHERE id = :id');
        $this->db->bind(':id', $id);
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
    public function reservationCompleted($id){
        $this->db->query('UPDATE reservations SET completed = 1 WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $date
     * @return array
     */
    public function schedule($date){

        $reservedTimes = [];

        $begin = new DateTime($date . ' 9:00');
        $end = new DateTime($date . ' 20:00');

        $interval = DateInterval::createFromDateString('15 minute');
        $period = new DatePeriod($begin, $interval, $end);

        foreach ($period as $dt) {

            $this->db->query('SELECT barber_id as id FROM reservations WHERE completed = 0 AND date = :dt');
            $this->db->bind(':dt', $dt->format("Y-m-d H:i"));
            if(!empty($this->db->resultSet())){
                $reservedTimes[$dt->format("H:i")] = [];
                $barbers = $this->db->resultSet();
                foreach ($barbers as $barber){
                    array_push($reservedTimes[$dt->format("H:i")], $barber->id) ;
                }
            } else {
                $reservedTimes[$dt->format("H:i")] = [];
            }

        }

        return $reservedTimes;
    }

    /**
     * @param $data
     * @param $clientID
     * @return bool
     */
    public function register($data, $clientID) {
        $this->db->query('INSERT INTO reservations (date, client_id, barber_id) VALUES (:date, :client_id, :barber_id)');
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':client_id', $clientID);
        $this->db->bind(':barber_id', $data['barber_id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function isTimeReserved($data) {
        $this->db->query('SELECT * FROM reservations WHERE barber_id =:id AND date = :date');
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':id', $data['barber_id']);

        $row = $this->db->single();

        if (!empty($row)) {
            return true;
        } else {
            return false;
        }
    }

}