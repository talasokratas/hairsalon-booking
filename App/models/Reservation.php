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

    public function reservationCompleted($id){
        $this->db->query('UPDATE reservations SET completed = 1 WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

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


}