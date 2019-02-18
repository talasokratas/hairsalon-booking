<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 18/02/2019
 * Time: 17:55
 */

class Reservations extends Controller
{

    public function __construct()
    {
        $this->reservation = $this->model('Reservation');
    }
    /**
     *loads index view with passed values
     */
    public function index(){
        $data = [
            'reservations' => $this->reservation->getAll()
        ];
        $this->view('admin/index', $data);
    }

    /**
     * @param $id
     *
     * deletes table row and redirects to index page
     */
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($this->reservation->deleteReservation($id)){
                header('location:' . URLROOT . '/reservations/');
            } else {
                die('Something went wrong');
            }
        } else {
            header('location:' . URLROOT . '/reservations/');
        }
    }

    public function confirm($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($this->reservation->reservationCompleted($id)){
                header('location:' . URLROOT . '/reservations/');
            } else {
                die('Something went wrong');
            }
        } else {
            header('location:' . URLROOT . '/reservations/');
        }
    }
}