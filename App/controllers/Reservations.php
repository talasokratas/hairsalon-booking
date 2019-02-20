<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 18/02/2019
 * Time: 17:55
 */

class Reservations extends Controller
{

    /**
     * Reservations constructor.
     */
    public function __construct() {
        $this->reservation = $this->model('Reservation');
        $this->barber = $this->model('Barber');
        $this->client = $this->model('Client');
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->reservation->deleteReservation($id)) {
                header('location:' . URLROOT . '/reservations/');
            } else {
                die('Something went wrong');
            }
        } else {
            header('location:' . URLROOT . '/reservations/');
        }
    }

    /**
     * @param $id
     */
    public function confirm($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->reservation->reservationCompleted($id)) {
                $this->client->addVisit($_POST['client_id']);
                header('location:' . URLROOT . '/reservations/');
            } else {
                die('Something went wrong');
            }
        } else {
            header('location:' . URLROOT . '/reservations/');
        }
    }

    /**
     * @param null $date
     */
    public function create($date = null){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date = $_POST['date'];
        }

        if (isset($date) && $this->validateDate($date)) {
            $day = $date;
        } else {
            $day = date("Y-m-d");

        }

        $data = [
            'barbers' => $this->barber->getAll(),
            'schedule' => $this->scheduleByDay($day),
            'day' => $day
        ];
        $this->view('admin/create', $data);
    }

    /**
     * @param $date
     * @return mixed
     */
    public function scheduleByDay($date){
        return $this->reservation->schedule($date);

    }

    /**
     * @param $date
     * @return bool
     */
    public function validateDate($date){
        $dateNow = date("Y-m-d");
        $comparisonDate = DateTime::createFromFormat('Y-m-d', $date);
        if ($comparisonDate && $comparisonDate->format('Y-m-d') === $date) {
            if ($dateNow <= $date) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * confirm clients visit and add to his visits count
     */
    public function confirmation(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "name" => '',
                'barber' => trim($_POST['barber']),
                'barber_id' => trim($_POST['barber_id']),
                'date' => trim($_POST['date'])
            ];

            $this->view('admin/save', $data);

        } else {
                $this->view('admin/create');
            }
    }

    /**
     * register
     */
    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'barber_id' => trim($_POST['barber_id']),
                'barber' => trim($_POST['barber']),
                'date' => trim($_POST['date']),
                'name_err' => '',
                'date_err' => '',
            ];

            if(empty($data['name'])){
                $data['name_err'] = 'Įveskite savo vardą';
            } else {
                 $client = $this->client->getClientByName($data['name']);
                 if(empty($client)){
                     if($this->client->register($data['name'])){
                         $client = $this->client->getClientByName($data['name']);
                     } else {
                         die ('something went wrong');
                     }
                 }

                if($this->client->hasReservation($client->id)){
                    $data['name_err'] = 'Jūs jau turite viena rezervaciją';
                }
            }


            if(empty($data['date'])){
                $data['date_err'] = 'Pasirinkite datą';
            } else if($this->reservation->isTimeReserved($data)){
                $data['date_err'] = 'Laikas jau užimtas';
                die('uzimtas');
            }


            if(empty($data['name_err']) && empty($data['date_err']) && empty($data['barber_id_err'])){
                if($this->reservation->register($data, $client->id)){
                    header('location:' . URLROOT . '/');
                } else {
                    die ('something went wrong');
                }

            } else {

                $this->view('admin/save', $data);
            }

        } else {

            header('location:' . URLROOT . '/reservations/create');
        }
    }

    /**
     * show reservations by selected day
     */
    public function showByDay() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date = $_POST['date'];
        }

        if (isset($date) && $this->validateDate($date)) {
            $day = $date;
        } else {
            $day = date("Y-m-d");
        }

        $data = [
            'reservations' => $this->reservation->getAllByDate($day),
            'day' => $day
        ];
        $this->view('admin/index', $data);
    }


}