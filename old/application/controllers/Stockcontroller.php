<?php
    class Stockcontroller extends CI_Controller{

        public function dashboard(){
            if(isset($_SESSION['fullname'])){
                // echo json_encode($data['acc_rights']);
                $data['stockList'] =  $this->stock_model->lists();
                
                $this->load->view('templates/header');
                $this->load->view('dashboard', $data);
                $this->load->view('templates/footer');
            }else{
                $this->load->view('login');
            }
        } 
            
        public function add(){
            if(isset($_SESSION['fullname'])){
                $this->form_validation->set_rules('sku', 'SKU',
                'required');

                if($this->form_validation->run() === FALSE){
                    // echo json_encode($data['acc_rights']);
                    $this->load->view('templates/header');
                    $this->load->view('stock/add');
                    $this->load->view('templates/footer');
                }else{
                
                    $this->stock_model->create();
                    $this->session->set_flashdata('successmsg', 'Stock successfully added!');
                    redirect('stock/list');
                
                } 
            }else{
                $this->load->view('login');
            }
        }

        public function edit($id){
            if(isset($_SESSION['fullname'])){
                $this->form_validation->set_rules('sku', 'SKU',
                'required');

                if($this->form_validation->run() === FALSE){
                    $data['stockListOne'] =  $this->stock_model->list_one($id);

                    $this->load->view('templates/header');
                    $this->load->view('stock/edit', $data);
                    $this->load->view('templates/footer');
                }else{
                
                    $this->stock_model->update_stock($id);
                    $this->session->set_flashdata('successmsg', 'Stock successfully updated!');
                    redirect('stock/list');
                }
            }else{
                $this->load->view('login');
            }
        }

        public function lists(){
            if(isset($_SESSION['fullname'])){
                $data['stockList'] =  $this->stock_model->lists();
                $data['history_stock_txn'] =  $this->stock_model->history_stock_txn();

                // echo json_encode( $data['history_stock_txn'] );
                $this->load->view('templates/header');
                $this->load->view('stock/list', $data);
                $this->load->view('templates/footer');
            }else{
                $this->load->view('login');
            }
        }

        public function delete($id){
            $this->stock_model->delete_stock($id);
            $this->session->set_flashdata('successmsg', 'Stock successfully deleted!');
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }

        public function request(){
            if(isset($_SESSION['fullname'])){
                $data['stockList'] =  $this->stock_model->lists();
                $data['itemTemp'] =  $this->stock_model->itemTemp();
                $data['itemTempRequested'] =  $this->stock_model->itemTempRequested();
                $data['itemTempForDelivery'] =  $this->stock_model->itemTempForDelivery();
                $data['itemTempCompleted'] =  $this->stock_model->itemTempCompleted();

                $this->stock_model->check_wish();
                // echo json_encode($data['acc_rights']);
                $this->load->view('templates/header');
                $this->load->view('stock/request', $data);
                $this->load->view('templates/footer');       
            }else{
                $this->load->view('login');
            }    
        }

        public function update_restock(){
            if(isset($_SESSION['fullname'])){
                $this->stock_model->update_restock();
                $this->session->set_flashdata('successmsg', 'Stock successfully added!');
                
                $url = $_SERVER['HTTP_REFERER'];
                redirect($url);    
            }else{
                $this->load->view('login');
            }
        }
        
                
        public function addItem(){
            if(isset($_SESSION['fullname'])){
                $this->stock_model->addItemTemp();
            
                $url = $_SERVER['HTTP_REFERER'];
                redirect($url); 
            }else{
                $this->load->view('login');
            }
        }

        public function addItemRequested(){
            if(isset($_SESSION['fullname'])){
                // validation if stock is available
                $data['lists'] =  $this->stock_model->lists();
                $data['itemTemp'] =  $this->stock_model->itemTemp();
                $kasya = 0;
                
                foreach($data['lists'] as $ht){
                    foreach($data['itemTemp'] as $htemp){
                        if($ht['stock_id'] == $htemp['stock_id']){
                            if($ht['rate'] >= $htemp['count']){
                                $kasya = 1;
                            }else{
                                $kasya = 0;
                                break 2;
                            }
                        }
                    }
                }
                
                if($kasya == 1){
                    $this->stock_model->addItemTempRequested();
                    $this->session->set_flashdata('successmsg', 'Stocks Successfully Requested!');
                }else{
                    $this->session->set_flashdata('errormsg', 'Insufficient Stocks!');
                }
                // $countTemp = json_encode($ht[0]['rate']);
                // $countTemp json_decode( $countTemp );
                // $this->stock_model->addItemTempRequested();

                $url = $_SERVER['HTTP_REFERER'];
                redirect($url);
            }else{
                $this->load->view('login');
            }
        }
        
         public function removeItemRequested(){
                $this->stock_model->addItemRequestedRemove();

                $url = $_SERVER['HTTP_REFERER'];
                redirect($url); 
           
        }

        public function addItemRequestedCancel(){
            if(isset($_SESSION['fullname'])){
                $this->stock_model->addItemRequestedCancel();

                $url = $_SERVER['HTTP_REFERER'];
                redirect($url); 
            }else{
                $this->load->view('login');
            }
            
        }

        public function approver(){
            if(isset($_SESSION['fullname'])){
                $data['itemTempRequested'] =  $this->stock_model->itemTempRequested();
                $data['itemTempForDelivery'] =  $this->stock_model->itemTempForDelivery();
                $data['stockList'] =  $this->stock_model->lists();

                // echo json_encode($data['acc_rights']);
                $this->load->view('templates/header');
                $this->load->view('stock/approver', $data);
                $this->load->view('templates/footer');   
            }else{
                $this->load->view('login');
            }         
        }

        public function itemTempToForDelivery(){
            if(isset($_SESSION['fullname'])){
                
                if ($this->stock_model->itemTempToForDelivery() === FALSE){
                    $this->session->set_flashdata('errormsg', 'Insufficient Stocks!');
                }
                
                $url = $_SERVER['HTTP_REFERER'];
                redirect($url); 
                
                
            }else{
                $this->load->view('login');
            }
        }

        public function addItemRequestedAccept(){
            if(isset($_SESSION['fullname'])){
                $this->stock_model->itemTempToCompleted();

                $url = $_SERVER['HTTP_REFERER'];
                redirect($url); 
            }else{
                $this->load->view('login');
            }
        }
        
        public function ris(){
            if(isset($_SESSION['fullname'])){
               $data['getris'] =  $this->stock_model->getris();
               $data['getrishistory'] =  $this->stock_model->getrishistory();
               
                // echo json_encode($data['getrishistory']);
                $this->load->view('templates/header');
                $this->load->view('stock/ris', $data);
                $this->load->view('templates/footer');   
            }else{
                $this->load->view('login');
            }         
        }

        public function wish($id){
            $this->stock_model->wish($id);
            $this->session->set_flashdata('successmsg', 'Stock successfully added to wishlist!');
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }
        

    }
?>