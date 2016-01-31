<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 11/30/2015
 * Time: 1:23 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class rest_webservice extends REST_Controller{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
        //$this->methods['login_model']['limit'] = 500; // 500 requests per hour per user/key

        //load session
        $this->load->library('session');
        session_start();
    }

    public function login_get()
    {
        //test link : http://192.168.100.86:8081/busmanage/api/rest_webservice/login/username/admin/password/21232f297a57a5a743894a0e4a801fc3
        //password admin : 21232f297a57a5a743894a0e4a801fc3

        //load model
        $this->load->database();
        $this->load->model('login_model');

        //get username and password
        $username = $this->get('username');
        $password = $this->get('password');
        //$password_md5= md5($password);

        if ($username === NULL)
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found.'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }


        $usr_result = $this->login_model->get_user($username, $password);

        if ($usr_result > 0) //active user record is present
        {
            $_SESSION['UserNameAPI'] = $username;
            
            $this->response([
                'status' => TRUE,
                'message' => 'Login successful'
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found.'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
    
    public function login_bus_post()
    {
        //test link : http://192.168.100.86:8081/busmanage/api/rest_webservice/login/username/admin/password/21232f297a57a5a743894a0e4a801fc3
        //password admin : 21232f297a57a5a743894a0e4a801fc3

        //load model
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('vehicle_model');

        //get username and password
        $username = $this->post('username');
        $password = $this->post('password');
        //$password= md5($password);
                      
        if ($username === NULL)
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No username were found.'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
                
        $usr_result = $this->login_model->get_user_manageid($username, $password);
        
        if ($usr_result == 1) //active user record is present
        {
            $_SESSION['UserNameAPI'] = $username;
            $driver_id_result = $this->login_model->get_driver_id_bus($username, $password);
            $busid = $this->vehicle_model->getBusIdOfUser($driver_id_result);
            if($busid != "")
            {
                $this->response([
                        'status' => TRUE,
                        'message' => "Sucessful.",
                        'ManageId' => $usr_result,
                        'BusId'=> $busid
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else 
            {
                $this->response([
                        'status' => FALSE,
                        'message' => "User doesn't have any bus.",
                        'ManageId' => $usr_result,
                        'BusId'=> ""
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }
        /*
        else if ($usr_result == 2)
        {            
            $_SESSION['UserNameAPI'] = $username;
            $this->response([
                    'status' => TRUE,
                    'message' => "Sucessful",
                    'ManageId' => $usr_result,
                    'UserName'=>$username
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else if ($usr_result == 0)
        {
            $this->response([
                'status' => FALSE,
                'message' => 'This user only login on website.'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
         */
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found.'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }
    
    public function login_bus_get()
    {
        //test link : http://192.168.100.86:8081/busmanage/api/rest_webservice/login_bus/username/admin/password/21232f297a57a5a743894a0e4a801fc3
        //password admin : 21232f297a57a5a743894a0e4a801fc3

        //load model
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('vehicle_model');

        //get username and password
        $username = $this->get('username');
        $password = $this->get('password');
        //$password= md5($password);
                      
        if ($username === NULL)
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No username were found.'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
                
        $usr_result = $this->login_model->get_user_manageid($username, $password);
        
        if ($usr_result == 1) //active user record is present
        {
            $_SESSION['UserNameAPI'] = $username;
            $driver_id_result = $this->login_model->get_driver_id_bus($username, $password);
            $busid = $this->vehicle_model->getBusIdOfUser($driver_id_result);
            if($busid != "")
            {
                $this->response([
                        'status' => TRUE,
                        'message' => "Sucessful.",
                        'ManageId' => $usr_result,
                        'BusId'=> $busid
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else 
            {
                $this->response([
                        'status' => FALSE,
                        'message' => "User doesn't have any bus.",
                        'ManageId' => $usr_result,
                        'BusId'=> ""
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }
        /*
        else if ($usr_result == 2)
        {            
            $_SESSION['UserNameAPI'] = $username;
            $this->response([
                    'status' => TRUE,
                    'message' => "Sucessful",
                    'ManageId' => $usr_result,
                    'UserName'=>$username
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else if ($usr_result == 0)
        {
            $this->response([
                'status' => FALSE,
                'message' => 'This user only login on website.'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
         * 
         */
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found.'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }
    
    public function get_bus_id_post()
    {        
        //test link : http://192.168.100.86:8081/busmanage/api/rest_webservice/get_bus_id/username/admin/password/21232f297a57a5a743894a0e4a801fc3
        //load model
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('vehicle_model');

        //get username and password
        $username = $this->post('username');
        $password = $this->post('password');
        //$password= md5($password);
        
        $usr_result = $this->login_model->get_driver_id_bus($username, $password);
        $busid = $this->vehicle_model->getBusIdOfUser($usr_result);
        
        if($busid != "")
        {            
            $this->response([
                'status' => TRUE,
                'message' => $busid
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'Your account doesn\'t have any bus'
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
    }
    
    public function get_bus_id_get()
    {        
        //test link : http://192.168.100.86:8081/busmanage/api/rest_webservice/get_bus_id/username/admin/password/21232f297a57a5a743894a0e4a801fc3
        //load model
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('vehicle_model');

        //get username and password
        $username = $this->get('username');
        $password = $this->get('password');
        //$password= md5($password);
        
        $usr_result = $this->login_model->get_driver_id_bus($username, $password);
        $busid = $this->vehicle_model->getBusIdOfUser($usr_result);
        
        if($busid != "")
        {            
            $this->response([
                'status' => TRUE,
                'message' => $busid
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'Your account doesn\'t have any bus'
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
    }

    public function insertBusLocation_post()
    {
        //test link : http://192.168.100.86:8081/busmanage/api/rest_webservice/insertBusLocation?busid=3&lat=10.764851666666667&long=106.70562666666667
        
        //load model
        $this->load->database();
        $this->load->model('vehicle_model');

        $busID = $this->post('busid');
        $lat = $this->post('lat');//get latitude
        $long = $this->post('long');//get longtitude

        $zoom = $this->post('zoom');//get zoom level

        if ($zoom === NULL) {
            $zoom = 14;
        }

        $usr_result = $this->vehicle_model->getBusIdOfUser  ($busID);

        if (count($usr_result) > 0) //active user record is present
        {
            $result = $this->vehicle_model->update($busID, array(
                'Latitude' => $lat,
                'Longitude' => $long,
                'Zoom' => $zoom
            ));
            if($result)
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Update successful'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Update failed'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }

        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No bus were found'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function insertBusLocation_get()
    {
        //test link : http://192.168.100.86:8081/busmanage/api/rest_webservice/insertBusLocation?busid=3&lat=10.764851666666667&long=106.70562666666667
        
        //load model
        $this->load->database();
        $this->load->model('vehicle_model');

        $busID = $this->get('busid');
        $lat = $this->get('lat');//get latitude
        $long = $this->get('long');//get longtitude

        $zoom = $this->get('zoom');//get zoom level

        if ($zoom === NULL) {
            $zoom = 14;
        }

        $usr_result = $this->vehicle_model->getBusIdOfUser($busID);

        if (count($usr_result) > 0) //active user record is present
        {
            $this->vehicle_model->update($busID, array(
                'Latitude' => $lat,
                'Longitude' => $long,
                'Zoom' => $zoom
            ));

            $this->response([
                'status' => TRUE,
                'message' => 'Update successful'
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No bus were found'
            ], REST_Controller::HTTP_OK);
        }
        
    }
    
    public function getAllDestination_post()
    {
        //link test : http://192.168.100.86:8081/busmanage/api/rest_webservice/getAllDestination
        //load model
        $this->load->database();
        $this->load->model('student_model');

        $usr_result = $this->student_model->select ();

        if (count($usr_result) > 0) //active user record is present
        {
            
            $this->response(['student' => $usr_result], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No destination were found'
            ], REST_Controller::HTTP_OK);//HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
    
    public function getAllDestination_get()
    {
        // link test : http://192.168.100.86:8081/busmanage/api/rest_webservice/getAllDestinations
        //load model
        $this->load->database();
        $this->load->model('student_model');

        $usr_result = $this->student_model->select ();

        if (count($usr_result) > 0) //active user record is present
        {
            
            $this->response(['student' => $usr_result], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No destination were found'
            ], REST_Controller::HTTP_OK); 
        }
    }
    
    public function getDestinationByRouteId_get()
    {
        // link test : http://192.168.100.86:8081/busmanage/api/rest_webservice/getDestinationByRouteId/busid/3
        //load model
        $this->load->database();
        $this->load->model('student_model');

        $busID = $this->get('busid');
        
        $usr_result = $this->student_model->selectbyroute ($busID);

        if (count($usr_result) > 0) //active user record is present
        {            
            $this->response(['student' => $usr_result], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No destination were found'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }
        
    public function getDestinationByRouteId_post()
    {
        // link test : http://192.168.100.86:8081/busmanage/api/rest_webservice/getDestinationByRouteId/busid/3
        //load model
        $this->load->database();
        $this->load->model('student_model');

        $busID = $this->post('busid');
        
        $usr_result = $this->student_model->selectbyroute ($busID);

        if (count($usr_result) > 0) //active user record is present
        {
            
            $this->response(['student' => $usr_result], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No destination were found'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }
    
    public function checkBusDistance_post()
    {
        $this->response([
                'status' => TRUE,
                'message' => 5000
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
    
    public function checkBusDistance_get()
    {
        $this->response([
                'status' => TRUE,
                'message' => 5000
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
    
    public function updatePickup_get()
    {
        //test link : http://192.168.100.68/busmanage/api/rest_webservice/updatePickup?confirm=20151230&pickup=1&takehome=1&studentid=201511300001
        
        //load model
        $this->load->database();
        $this->load->helper("date");
        $this->load->model('login_model');

        $ConfirmPickupID = $this->get('confirm');
        $pickup = $this->get('pickup');//get latitude
        $takehome = $this->get('takehome');//get longtitude
        $studentID= $this->get('studentid');
        
        $count = substr($ConfirmPickupID,11);
        
        $get_studentID = $this->login_model->get_all_confirm($studentID);
        $usr_result = $this->login_model->get_confirmpickup($studentID,$ConfirmPickupID);

        if (count($usr_result) > 0) //active user record is present
        {
            if($pickup == 0 && $takehome == 0)
            {
                $this->db->where("ConfirmPickupID",$ConfirmPickupID);
                $this->db->where("StudentID",$studentID);
                $result = $this->db->delete("act_confirmpickup");
            }else{
                $result = $this->login_model->update($ConfirmPickupID, array(
                    'PickUp' => $pickup,
                    'TakeHome' => $takehome,
                    'ConfirmPickupDate' => $ConfirmPickupID
                ));
            }
                if($result)
                {
                    $this->response([
                        'status' => TRUE,
                        'message' => 'Update successful'
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                }
                else
                {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'Error: Already Update'
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                }
        } else {
            if($pickup == 0 && $takehome == 0)
            {
               $this->response([
                    'status' => FALSE,
                    'message' => 'Nothing Change'
                ], REST_Controller::HTTP_OK);
            }
            else{
                $result = $this->db->insert('act_confirmpickup',array(
                    'ConfirmPickupID' => $ConfirmPickupID,
                    'StudentID' => $studentID,
                    'GroupID' => $get_studentID['GroupID'],
                    'PickUp' => $pickup,
                    'TakeHome' => $takehome,
                    'ConfirmPickupDate' => $ConfirmPickupID,
                    'Delete'=> 0
                ));
            }
            if($result)
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Insert Successfull'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Insert Fail'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }
    }
    
    public function updatePickup_post()
    {
        //load model
        $this->load->database();
        $this->load->helper("date");
        $this->load->model('login_model');

        $ConfirmPickupID = $this->post('confirm');
        $pickup = $this->post('pickup');//get latitude
        $takehome = $this->post('takehome');//get longtitude
        $studentID= $this->post('studentid');
        
        $count = substr($ConfirmPickupID,11);
        
        $get_studentID = $this->login_model->get_all_confirm($studentID);
        $usr_result = $this->login_model->get_confirmpickup($studentID,$ConfirmPickupID);

        if (count($usr_result) > 0) //active user record is present
        {
            if($pickup != 0 && $takehome != 0)
            {
                $result = $this->login_model->update($ConfirmPickupID, array(
                    'PickUp' => $pickup,
                    'TakeHome' => $takehome,
                    'ConfirmPickupDate' => $ConfirmPickupID
                ));
            }else{
                $this->db->where("ConfirmPickupID",$ConfirmPickupID);
                $this->db->where("StudentID",$studentID);
                $result = $this->db->delete("act_confirmpickup");
            }
            if($result)
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Update successful'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Error: Already Update'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }

        } else {
            if($pickup == 0 && $takehome == 0)
            {
               $this->response([
                    'status' => FALSE,
                    'message' => 'Nothing Change'
                ], REST_Controller::HTTP_OK);
            }
            else{
                $result = $this->db->insert('act_confirmpickup',array(
                    'ConfirmPickupID' => $ConfirmPickupID,
                    'StudentID' => $studentID,
                    'GroupID' => $get_studentID['GroupID'],
                    'PickUp' => $pickup,
                    'TakeHome' => $takehome,
                    'ConfirmPickupDate' => $ConfirmPickupID,
                    'Delete'=> 0
                ));
            }
            if($result)
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Insert Successfull'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Insert Fail'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }
    }
     public function insertandupdatePickup_post()
    {
         //load model
        $this->load->database();
        $this->load->helper("date");
        $this->load->model('login_model');
        
        $pickup = $this->post('pickup');
        $takehome = $this->post('takehome');
        $confirm_date=  $this->post('date');
        $studentID= $this->post('studentid');
        $ConfirmPickupID = $this->post('confirmpickid');
        
        $get_studentID = $this->login_model->get_all_confirm($studentID);
        $usr_result = $this->login_model->get_confirmpickup($studentID,$ConfirmPickupID);

        if (count($usr_result) > 0) //active user record is present
        {
            $result = $this->login_model->updatePickup($ConfirmPickupID,$studentID, array(
                'PickUp' => $pickup,
                'TakeHome' => $takehome,
                'ConfirmPickupDate' => $confirm_date
            ));
            if($result)
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Update successful'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Error: Already Update'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }

        } else {
            $result = $this->db->insert('act_confirmpickup',array(
                'ConfirmPickupID' =>$ConfirmPickupID,// $confirm_date."-".$count,
                'StudentID' => $get_studentID['StudentID'],
                'GroupID' => $get_studentID['GroupID'],
                'PickUp' => $pickup,
                'TakeHome' => $takehome,
                'ConfirmPickupDate' => $confirm_date,
                'Delete'=> 0
            ));
            if($result)
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Insert Successfull'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Insert Fail'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }
    }
     public function insertandupdatePickup_get()
    {
         //load model
        $this->load->database();
        $this->load->helper("date");
        $this->load->model('login_model');
        $pickup = $this->get('pickup');
        $takehome = $this->get('takehome');
        $confirm_date=  $this->get('date');
        $studentID= $this->get('studentid');
        $ConfirmPickupID = $this->get('confirmpickid');
        $usr_result = $this->login_model->get_confirmpickup($studentID,$ConfirmPickupID);
        $get_studentID = $this->login_model->get_all_confirm($studentID);
        if (count($usr_result) > 0) //active user record is present
        {
            $result = $this->login_model->updatePickup($ConfirmPickupID,$studentID, array(
                'PickUp' => $pickup,
                'TakeHome' => $takehome,
                'ConfirmPickupDate' => $confirm_date
            ));
            if($result)
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Update successful'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Error: Already Update'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }

        } else {
            $result = $this->db->insert('act_confirmpickup',array(
                'ConfirmPickupID' => $ConfirmPickupID,//$confirm_date."-".$count,
                'StudentID' => $get_studentID['StudentID'],
                'GroupID' => $get_studentID['GroupID'],
                'PickUp' => $pickup,
                'TakeHome' => $takehome,
                'ConfirmPickupDate' => $confirm_date,
                'Delete'=> 0
            ));
            if($result)
            {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Insert Successfull'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Insert Fail'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }
    }
    public function login_parent_get()
    {
        //test link : http://192.168.100.68/busmanage/api/rest_webservice/login_parent/email/a01@gmail.com/password/00d2a735511a71b0d8449a57cf2520aa

        //load model
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('vehicle_model');

        //get username and password
        $email = $this->get('email');
        $password = $this->get('password');
        //$password= md5($password);
                      
        if ($email === NULL)
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No username were found.'
            ], REST_Controller::HTTP_OK);
        }
                        
        $all_student = $this->login_model->get_all_student($email);
        $location = $this->login_model->get_location($all_student['RouteID']);
        $get_all_confirm = $this->login_model->login_get_confirm($all_student['StudentID']);
        if ($all_student['PassWord']==$password) //active user record is present
        {
            if($get_all_confirm['ConfirmPickupID'] != NULL)
            {
                $this->response([
                        'status' => TRUE,
                        'message' => "Login Sucessful",
                        'StudentID' => $all_student['StudentID'],
                        'StudentName' => $all_student['StudentName'],
                        'Latitude_Student'=> $all_student['Latitude'],
                        'Longitude_Student'=> $all_student['Longitude'],
                        
                        'Latitude_Bus' => $location['Latitude'],
                        'Longitude_Bus' => $location['Longitude'],
                        'BusID'=>$location['BusID'],
                        'BusName'=>$location['BusName'],
                        'Zoom'=>$location['Zoom'],
                        
                        'ConfirmPickupID'=> substr($get_all_confirm['ConfirmPickupID'],11),
                        'PickUp' => $get_all_confirm['PickUp'],
                        'TakeHome' => $get_all_confirm['TakeHome']
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else 
            {
                $this->response([
                        'status' => TRUE,
                        'message' => "Login Sucessful",
                        'StudentID' => $all_student['StudentID'],
                        'StudentName' => $all_student['StudentName'],
                        'Latitude_Student'=> $all_student['Latitude'],
                        'Longitude_Student'=> $all_student['Longitude'],
                        
                        'Latitude_Bus' => $location['Latitude'],
                        'Longitude_Bus' => $location['Longitude'],
                        'BusID'=>$location['BusID'],
                        'BusName'=>$location['BusName'],
                        'Zoom'=>$location['Zoom'],
                        
                        'ConfirmPickupID'=> 0,
                        'PickUp' => 0,
                        'TakeHome' => 0
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }
            else 
            {
                $this->response([
                        'status' => FALSE,
                        'message' => "Login Fail",
                    ], REST_Controller::HTTP_OK);
            }
    }
    
    public function login_parent_post()
    {
        //test link : http://192.168.100.68/busmanage/api/rest_webservice/login_parent/email/a01@gmail.com/password/00d2a735511a71b0d8449a57cf2520aa
        //password admin : 21232f297a57a5a743894a0e4a801fc3

        //load model
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('vehicle_model');

        //get username and password
        $email = $this->post('email');
        $password = $this->post('password');
        //$password= md5($password);
                      
        if ($email === NULL)
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No username were found.'
            ], REST_Controller::HTTP_OK);
        }
        $all_student = $this->login_model->get_all_student($email);
        $location = $this->login_model->get_location($all_student['RouteID']);
        $get_all_confirm = $this->login_model->login_get_confirm($all_student['StudentID']);
        if ($all_student['PassWord']==$password) //active user record is present
        {
            if($get_all_confirm['ConfirmPickupID'] != NULL)
            {
                $this->response([
                        'status' => TRUE,
                        'message' => "Login Sucessful",
                        'StudentID' => $all_student['StudentID'],
                        'StudentName' => $all_student['StudentName'],
                        'Latitude_Student'=> $all_student['Latitude'],
                        'Longitude_Student'=> $all_student['Longitude'],
                        
                        'Latitude_Bus' => $location['Latitude'],
                        'Longitude_Bus' => $location['Longitude'],
                        'BusID'=>$location['BusID'],
                        'BusName'=>$location['BusName'],
                        'Zoom'=>$location['Zoom'],
                        
                        'ConfirmPickupID'=> substr($get_all_confirm['ConfirmPickupID'],11),
                        'PickUp' => $get_all_confirm['PickUp'],
                        'TakeHome' => $get_all_confirm['TakeHome']
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else 
            {
                $this->response([
                        'status' => TRUE,
                        'message' => "Login Sucessful",
                        'StudentID' => $all_student['StudentID'],
                        'StudentName' => $all_student['StudentName'],
                        'Latitude_Student'=> $all_student['Latitude'],
                        'Longitude_Student'=> $all_student['Longitude'],
                        
                        'Latitude_Bus' => $location['Latitude'],
                        'Longitude_Bus' => $location['Longitude'],
                        'BusID'=>$location['BusID'],
                        'BusName'=>$location['BusName'],
                        'Zoom'=>$location['Zoom'],
                        
                        'ConfirmPickupID'=> 0,
                        'PickUp' => 0,
                        'TakeHome' => 0
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }
            else 
            {
                $this->response([
                        'status' => FALSE,
                        'message' => "Login Fail",
                    ], REST_Controller::HTTP_OK);
            }
    }
    
    public function getBusLocation_post()
    {
        // link test : http://192.168.100.86:8081/busmanage/api/rest_webservice/getBusLocation/busid/BS003
        //load model
        $this->load->database();
        $this->load->model('vehicle_model');

        $busID = $this->post('busid');
        
        $usr_result = $this->vehicle_model->getLocationBus ($busID);

        if (count($usr_result) > 0) //active user record is present
        {
            
            $this->response(['destination' => $usr_result], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No destination were found'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }
    
    public function getBusLocation_get()
    {
        // link test : http://192.168.100.68/busmanage/api/rest_webservice/getBusLocation/busid/3
        //load model
        $this->load->database();
        $this->load->model('vehicle_model');

        $busID = $this->get('busid');
        
        $usr_result = $this->vehicle_model->getLocationBus ($busID);

        if (count($usr_result) > 0) //active user record is present
        {
            
            $this->response([
                'buslocationinfo' => $usr_result
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No destination were found'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }    
    
    public function getBusIdByRouteId_post()
    {
        // link test : http://192.168.100.86:8081/busmanage/api/rest_webservice/getBusIdByRouteId/routeid/0
        //load model
        $this->load->database();
        $this->load->model('vehicle_model');

        $routeID = $this->post('routeid');
        
        $result = $this->vehicle_model->getBusIdByRouteId ($routeID);

        if (count($result) > 0) //active user record is present
        {
            
            $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No destination were found'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }
    
    public function getBusIdByRouteId_get()
    {
        // link test : http://192.168.100.86:8081/busmanage/api/rest_webservice/getBusIdByRouteId/routeid/0
        //load model
        $this->load->database();
        $this->load->model('vehicle_model');

        $routeID = $this->get('routeid');
        
        $result = $this->vehicle_model->getBusIdByRouteId ($routeID);

        if (count($result) > 0) //active user record is present
        {
            
            $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No destination were found'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }
}