<?php
    class Logincontroller extends CI_Controller{
        
        public function login(){
            $this->form_validation->set_rules('username', 'Username',
                    'required');
            $this->form_validation->set_rules('password', 'Password',
                    'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('login');
            }else{
                if($this->login_model->login()) {
                    $data['user'] =  $this->login_model->login();
                   
                    // echo json_encode( $data['user'] );
                    $first_name = ($data['user'][0]['first_name']);
                    $middle_name = ($data['user'][0]['middle_name']);
                    $last_name = ($data['user'][0]['last_name']);
                    $_SESSION['fullname'] = $first_name . ' ' . $middle_name . ' ' . $last_name;
                    
                    $_SESSION['user_id'] = $user_id = ($data['user'][0]['user_id']);
                    $_SESSION['division'] = $user_division = ($data['user'][0]['division']);

                    // $this->load->view('templates/header');
                    // $this->load->view('templates/navbar');
                    // $this->load->view('project/dashboard');
                    // $this->load->view('templates/footer');
                    redirect('dashboard');
                }     
                else{
                    $this->session->set_flashdata('errormsg', 'No User found!');

                    $this->load->view('login');
                } 
            }       
            
        }

        public function logout(){
            unset($_SESSION['fullname']);
            unset($_SESSION['user_id']);
            unset($_SESSION['user_department_id']);
            $this->load->view('login');
        }

        
    }
?>