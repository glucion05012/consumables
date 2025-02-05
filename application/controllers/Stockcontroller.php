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

        public function stock_list_ajax(){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->stock_model->stock_list_ajax($length, $start, $search);
            $query_all = $this->stock_model->stock_list_ajax_count();

            if($query_all > 0){
                foreach($query as $rows){

                    // regular access
                    $json[] = array(
                        $rows['sku'],
                        $rows['engas_id'],
                        $rows['product'],
                        $rows['description'],
                        $rows['rate'],
                        $rows['threshold'],
                        $rows['unit'],
                        $rows['amount'],
                       '<button type="button" class="viewbtn btn btn-success" value="'. $rows['stock_id'] .'" id="updateStockBtn"><i class="fas fa-plus"></i></button>'.
                       '<button type="button" class="viewbtn btn btn-info" value="'. $rows['stock_id'] .'" id="historyBtn"><i class="fas fa-list"></i></button>'.
                       '<a href="edit/'. $rows['stock_id'] .'" class="btn btn-primary"><i class="fa fa-edit" title="Edit"></i></a>'.
                       '<a class="btn btn-danger" onclick="return confirm('."'Press OK to confirm delete stock?'".')" href="delete/'. $rows['stock_id'] .'" title="Delete"><i class="fa fa-trash"></i></a>'
                    );
                   
                }
                $total_records = $query_all;
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json ?: []
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['data'] = [];
                echo json_encode($response);
            }
        }

        public function wish_list_ajax(){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->stock_model->wish_list_ajax($length, $start, $search);
            $query_all = $this->stock_model->wish_list_ajax_count();

            if($query_all > 0){
                foreach($query as $rows){

                    // regular access
                    $json[] = array(
                        $rows['sku'],
                        $rows['product'],
                        $rows['rate'] .' - '.$rows['unit'],
                        $rows['wish']
                    );
                   
                }
                $total_records = $query_all;
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json ?: []
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['data'] = [];
                echo json_encode($response);
            }
        }

        public function history_list_ajax($id){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->stock_model->history_list_ajax($id, $length, $start, $search);
            $query_all = $this->stock_model->history_list_ajax_count($id);

            if($query_all > 0){
                foreach($query as $rows){

                    // regular access
                    $json[] = array(
                        $rows['timestamp'],
                        $rows['division'],
                        $rows['product'],
                        $rows['quantity'],
                        $rows['activity'],
                        $rows['remarks'].' <br> <b>Old Unit: <i>'.$rows['old'].'</i></b>'
                    );
                   
                }
                $total_records = $query_all;
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json ?: []
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['data'] = [];
                echo json_encode($response);
            }
        }

        
        public function requested_list_ajax(){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->stock_model->requested_list_ajax($length, $start, $search);
            $query_all = $this->stock_model->requested_list_ajax_count();

            if($query_all > 0){
                foreach($query as $rows){

                    // regular access
                    $json[] = array(
                        $rows['ris_no'],
                        $rows['sku'],
                        $rows['product'],
                        $rows['description'],
                        '<b>'.$rows['count'].'</b>',
                        $rows['timestamp'],
                        $rows['requested_by'],
                       '<button type="button" class="viewbtn btn btn-success" data-var1="'.$rows['request_temp_id'].'" data-var2="'.$rows['count'].'" id="forDeliveryBtn">For Delivery</button>'
                    );
                   
                }
                $total_records = $query_all;
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json ?: []
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['data'] = [];
                echo json_encode($response);
            }
        }
        

        public function for_delivery_list_ajax(){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->stock_model->for_delivery_list_ajax($length, $start, $search);
            $query_all = $this->stock_model->for_delivery_list_ajax_count();

            if($query_all > 0){
                foreach($query as $rows){

                    // regular access
                    $json[] = array(
                        $rows['ris_no'],
                        $rows['sku'],
                        $rows['product'] .' - '.$rows['description'],
                        '<b>'.$rows['count'].'</b>',
                        $rows['timestamp'],
                        $rows['requested_by'],
                        $rows['status'],
                    );
                   
                }
                $total_records = $query_all;
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json ?: []
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['data'] = [];
                echo json_encode($response);
            }
        }

        public function ris_list_ajax(){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->stock_model->ris_list_ajax($length, $start, $search);
            $query_all = $this->stock_model->ris_list_ajax_count();

            if($query_all > 0){
                foreach($query as $rows){

                    // regular access
                    $json[] = array(
                        $rows['ris_no'],
                        $rows['timestamp'],
                        $rows['status'],
                        '<button type="button" class="viewbtn btn btn-info" value="'.$rows['ris_no'].'" id="historyBtn"><i class="fas fa-list"></i></button>'
                    );
                   
                }
                $total_records = $query_all;
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json ?: []
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['data'] = [];
                echo json_encode($response);
            }
        }

        public function request_list_ajax(){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->stock_model->request_list_ajax($length, $start, $search);
            $query_all = $this->stock_model->request_list_ajax_count();

            if($query_all > 0){
                foreach($query as $rows){

                    //action button
                    if(intval($rows['rate']) <= intval($rows['threshold'])){
                        $action_btn = '<button class="btn btn-danger" disabled>Insufficient Stock</button>';
                        $action_btn2 = '';
                        $action_btn3 = '';
                        if($rows['wish'] == ''){
                            $action_btn2 = '<button type="button" class="btn btn-primary" value="'. $rows['stock_id'] .'" id="wishBtn"><i class="nav-icon fa fa-star"></i></button>';
                        }
                    }else{
                            $action_btn3 = '<button type="button" class="btn btn-success" value="'. $rows['stock_id'] .'" id="addBtn"><i class="nav-icon fa fa-plus"></i></button>';
                            $action_btn2 = '';
                            $action_btn = '';
                    }
                    //action button end


                    // regular access
                    $json[] = array(
                        $rows['sku'],
                        $rows['product'],
                        $rows['rate'],
                        $rows['threshold'],
                        $action_btn.$action_btn2.$action_btn3
                    );
                   
                }
                $total_records = $query_all;
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json ?: []
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['data'] = [];
                echo json_encode($response);
            }
        }

        

        public function pending_list_ajax(){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $div_id = $_SESSION['division'];
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->stock_model->pending_list_ajax($div_id, $length, $start, $search);
            $query_all = $this->stock_model->pending_list_ajax_count($div_id);

            if($query_all > 0){
                foreach($query as $rows){

                    // regular access
                    $json[] = array(
                        $rows['sku'],
                        $rows['product'] .' - '.$rows['description'],
                        '<b>'.$rows['count'].'</b>',
                        $rows['timestamp'],
                        $rows['status'],
                       '<button type="button" class="viewbtn btn btn-danger" value="'. $rows['request_temp_id'] .'" id="removestock">-</button>'
                    );
                   
                }
                $total_records = $query_all;
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json ?: []
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['data'] = [];
                echo json_encode($response);
            }
        }
        

        public function stock_list_one($id){
            $data['stockListOne'] =  $this->stock_model->list_one($id);
            echo json_encode($data['stockListOne']);        
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
            return;
        }
        

    }
?>