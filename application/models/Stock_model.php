<?php
class Stock_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function stock_list_ajax($length, $start, $search){
        $query = $this->db->query("SELECT * 
                                    FROM stock 
                                    WHERE 
                                    (
                                        sku LIKE CONCAT('%$search%') OR 
                                        product LIKE CONCAT('%$search%') OR 
                                        description LIKE CONCAT('%$search%')OR 
                                        engas_id LIKE CONCAT('%$search%')
                                    )
                                    LIMIT $start, $length");
        return $query->result_array();
    }

    public function stock_list_ajax_count(){
        $query = $this->db->query("SELECT * 
                                    FROM stock 
                                    ");
        return $query->num_rows();
    }

    public function wish_list_ajax($length, $start, $search){
        $query = $this->db->query("SELECT * 
                                    FROM stock 
                                    WHERE 
                                    (
                                        sku LIKE CONCAT('%$search%') OR 
                                        product LIKE CONCAT('%$search%') OR 
                                        wish LIKE CONCAT('%$search%')
                                    )
                                    AND wish != ''
                                    LIMIT $start, $length");
        return $query->result_array();
    }

    public function wish_list_ajax_count(){
        $query = $this->db->query("SELECT * 
                                    FROM stock 
                                    where wish != ''
                                    ");
        return $query->num_rows();
    }

    public function history_list_ajax($id, $length, $start, $search){
        $query = $this->db->query("SELECT a.*, b.sku, b.product
                                    FROM stock_txn a left join stock b on a.stock_id = b.stock_id
                                    WHERE 
                                    (
                                        a.division LIKE CONCAT('%$search%') OR 
                                        b.sku LIKE CONCAT('%$search%') OR 
                                        b.product LIKE CONCAT('%$search%')
                                    ) AND a.stock_id = $id
                                    LIMIT $start, $length");
        return $query->result_array();
    }

    public function history_list_ajax_count($id){
        $query = $this->db->query("SELECT a.*, b.sku, b.product
                                    FROM stock_txn a left join stock b on a.stock_id = b.stock_id
                                    WHERE a.stock_id = $id
                                    ");
        return $query->num_rows();
    }

    
    public function requested_list_ajax($length, $start, $search){
        $query = $this->db->query("SELECT * FROM requeststocktemp 
                                    WHERE 
                                    (
                                        requested_by LIKE CONCAT('%$search%') OR 
                                        sku LIKE CONCAT('%$search%') OR 
                                        product LIKE CONCAT('%$search%')
                                    ) AND status = 'Requested'
                                    LIMIT $start, $length");
        return $query->result_array();
    }
    public function requested_list_ajax_count(){
        $query = $this->db->query("SELECT * FROM requeststocktemp 
                                    WHERE status = 'Requested'
                                    ");
        return $query->num_rows();
    }

    public function for_delivery_list_ajax($length, $start, $search){
        $query = $this->db->query("SELECT * FROM requeststocktemp 
                                    WHERE 
                                    (
                                        requested_by LIKE CONCAT('%$search%') OR 
                                        sku LIKE CONCAT('%$search%') OR 
                                        product LIKE CONCAT('%$search%')
                                    ) AND status = 'For Delivery'
                                    LIMIT $start, $length");
        return $query->result_array();
    }
    public function for_delivery_list_ajax_count(){
        $query = $this->db->query("SELECT * FROM requeststocktemp 
                                    WHERE status = 'For Delivery'
                                    ");
        return $query->num_rows();
    }

    
    public function ris_list_ajax($length, $start, $search){
        $query = $this->db->query("SELECT * FROM requeststocktemp 
                                    WHERE 
                                    (
                                        ris_no LIKE CONCAT('%$search%') OR 
                                        status LIKE CONCAT('%$search%')
                                    )
                                    GROUP BY ris_no
                                    LIMIT $start, $length");
        return $query->result_array();
    }

    public function ris_list_ajax_count(){
        $query = $this->db->query("SELECT * FROM requeststocktemp 
                                    GROUP BY ris_no");
        return $query->num_rows();
    }

    public function request_list_ajax($length, $start, $search){
        $query = $this->db->query("SELECT * FROM stock 
                                    WHERE 
                                    (
                                        sku LIKE CONCAT('%$search%') OR 
                                        product LIKE CONCAT('%$search%')
                                    )
                                    LIMIT $start, $length");
        return $query->result_array();
    }

    public function request_list_ajax_count(){
        $query = $this->db->query("SELECT * FROM stock 
                                    ");
        return $query->num_rows();
    }

    public function pending_list_ajax($div_id, $length, $start, $search){
        $query = $this->db->query("SELECT * FROM requeststocktemp 
                                    WHERE 
                                    (
                                        sku LIKE CONCAT('%$search%') OR 
                                        product LIKE CONCAT('%$search%')
                                    ) AND status = 'Pending' AND requested_by = '$div_id'
                                    LIMIT $start, $length");
        return $query->result_array();
    }
    public function pending_list_ajax_count($div_id){
        $query = $this->db->query("SELECT * FROM requeststocktemp 
                                    WHERE status = 'Pending' AND requested_by = '$div_id'
                                    ");
        return $query->num_rows();
    }
    
    public function create(){
        $data = array(
            'sku' => $this->input->post('sku'),
            'engas_id' => $this->input->post('engas_id'),
            'product' => $this->input->post('product'),
            'description' => $this->input->post('description'),
            'rate' => $this->input->post('rate'),
            'unit' => $this->input->post('unit'),
            'threshold' => $this->input->post('threshold'),
            'amount' => $this->input->post('amount')
        );
        
        $this->db->insert('stock', $data);

        $stock_id = $this->db->insert_id();
        //LOGS START
        date_default_timezone_set('Asia/Manila');
        $date_log = date('F j, Y g:i:a  ');
        $logs = array(
            'stock_id' => $stock_id,
            'amount' => $this->input->post('amount'),
            'user_id' => $_SESSION['user_id'],
            'division' => $_SESSION['division'],
            'quantity' => $this->input->post('rate'),
            'timestamp' => $date_log,
            'activity' => 'Stock In ',
            'old' => $this->input->post('old'),
            'remarks' => 'Product added: ' . $this->input->post('product'),
        );

        return $this->db->insert('stock_txn', $logs);
        //LOGS END
    }

    public function lists(){
        $query = $this->db->query("SELECT * FROM stock");
        return $query->result_array();
    }

    public function history_stock_txn(){
        $query = $this->db->query("SELECT * FROM `stock_txn` a left join stock b on a.stock_id = b.stock_id;");
        return $query->result_array();
    }

    public function list_one($id){
        $query = $this->db->query("SELECT * FROM stock where stock_id = $id");
    return $query->row_array();
    }

    public function update_stock($id){
        $data = array(
            'product' => $this->input->post('product'),
            'engas_id' => $this->input->post('engas_id'),
            'description' => $this->input->post('description'),
            'amount' => $this->input->post('amount'),
            'unit' => $this->input->post('unit'),
            'threshold' => $this->input->post('threshold'),
        );
        

        $this->db->where('stock_id',  $id);
        $this->db->update('stock', $data);

        //LOGS START
        date_default_timezone_set('Asia/Manila');
        $date_log = date('F j, Y g:i:a  ');
        $logs = array(
            'stock_id' => $id,
            'amount' => $this->input->post('amount'),
            'user_id' => $_SESSION['user_id'],
            'division' => $_SESSION['division'],
            'timestamp' => $date_log,
            'activity' => 'Stock Update ',
            'remarks' => 'New Product Name: ' . $this->input->post('product') . '<br>' . 'New Description: ' . $this->input->post('description') . '<br>' . 'New Amount: ' . $this->input->post('amount') . '<br>' . 'New Threshold: ' . $this->input->post('threshold'),
        );

        return $this->db->insert('stock_txn', $logs);
        //LOGS END
    }

    public function delete_stock($id){
        $query = $this->db->query("DELETE from stock where stock_id = $id");

        //LOGS START
        date_default_timezone_set('Asia/Manila');
        $date_log = date('F j, Y g:i:a  ');
        $logs = array(
            'stock_id' => $id,
            'user_id' => $_SESSION['user_id'],
            'division' => $_SESSION['division'],
            'timestamp' => $date_log,
            'activity' => 'Stock Delete ',
        );

        return $this->db->insert('stock_txn', $logs);
        //LOGS END
    }
   
    public function update_restock(){
        $stock_id = $this->input->post('stock_id');

        $updatedrate = $this->input->post('rate') +  $this->input->post('updated_stock');
        $data = array(
            'rate' => $updatedrate,
        );
        
        $this->db->where('stock_id',  $stock_id);
        $this->db->update('stock', $data);

        //LOGS START
        date_default_timezone_set('Asia/Manila');
        $date_log = date('F j, Y g:i:a  ');
        $logs = array(
            'stock_id' => $stock_id,
            'user_id' => $_SESSION['user_id'],
            'division' => $_SESSION['division'],
            'quantity' => $this->input->post('updated_stock'),
            'amount' => $this->input->post('updated_amount'),
            'timestamp' => $date_log,
            'activity' => 'Add Quantity',
            'old' => $this->input->post('old'),
            'remarks' => 'New count: '.$updatedrate,
        );

        return $this->db->insert('stock_txn', $logs);
        //LOGS END
    }

    
    public function itemTemp(){
        $query = $this->db->query("SELECT * FROM requeststocktemp where status = 'Pending'");
        return $query->result_array();
    }

    public function itemTempRequested(){
        $query = $this->db->query("SELECT * FROM requeststocktemp where status = 'Requested'");
        return $query->result_array();
    }

    public function itemTempForDelivery(){
        $query = $this->db->query("SELECT * FROM requeststocktemp where status = 'For Delivery'");
        return $query->result_array();
    }

    public function itemTempCompleted(){
        $query = $this->db->query("SELECT * FROM requeststocktemp where status = 'Completed'");
        return $query->result_array();
    }

    public function addItemTemp(){
        date_default_timezone_set('Asia/Manila');
        $date_now = date('F j, Y g:i:a  ');

        $data = array(
            'stock_id' =>$this->input->post('stock_id'),
            'requested_by' =>$_SESSION['division'],
            'sku' =>$this->input->post('sku'),
            'product' =>$this->input->post('product'),
            'description' =>$this->input->post('description'),
            'amount' =>$this->input->post('amount'),
            'count' =>$this->input->post('addCnt'),
            'timestamp' =>$date_now,
            'status' => 'Pending',
        );
        

        return $this->db->insert('requeststocktemp', $data);
    }

    public function addItemTempRequested(){
        $lastrisno = $this->db->query("SELECT SUBSTRING(MAX(ris_no), 9, 4) as ris_no FROM `requeststocktemp`");
       
        foreach($lastrisno->result() as $fd)
        {
            $lastrisnofin =  $fd->ris_no;
        }
        
        $lastrisnofinlas = ltrim($lastrisnofin, "0"); 
        $lastrisnofinlasta = intval($lastrisnofinlas) + 1;

        $risno = date('Y-m') . '-' . str_pad($lastrisnofinlasta,3,"0",STR_PAD_LEFT);
        $data = array(
            'status' => 'Requested',
            'ris_no' => $risno,
        );
        
        $this->db->where('status', 'Pending');
        $this->db->where('requested_by', $_SESSION['division']);
        return $this->db->update('requeststocktemp', $data);
    }
    
     public function addItemRequestedRemove(){
        $tempid = $this->input->post('tempid');
         
        $this->db->where('request_temp_id', $tempid);
        return $this->db->delete('requeststocktemp');
    }

    public function addItemRequestedCancel(){
        $data = array(
            'status' => 'Pending',
            'ris_no' => '',
        );

        $this->db->where('requested_by', $_SESSION['division']);
        return $this->db->update('requeststocktemp', $data);
    }

    public function itemTempToCompleted(){
        $data = array(
            'status' => 'Completed',
        );
        
        $this->db->where('status', 'For Delivery');
        $this->db->where('requested_by', $_SESSION['division']);
        return $this->db->update('requeststocktemp', $data);
    }

    public function itemTempToForDelivery(){
        $request_temp_id = $this->input->post('request_temp_id');
        $cntrel = $this->input->post('cntrel');

        $query = $this->db->query("SELECT * FROM requeststocktemp where request_temp_id = $request_temp_id");
        $query2 = $this->db->query("SELECT * FROM stock");
        foreach($query2->result_array() as $row2){
            foreach($query->result_array() as $row){
                $stock_id = $row['stock_id'];
                $stock_id2 = $row2['stock_id'];
                if($stock_id == $stock_id2){
                    if(intval($row2['rate']) >= intval($cntrel)){
        // remcnt = intval($row2['rate']) - intval($row['count']);
                            $remcnt = intval($row2['rate']) - intval($cntrel);

                            $data = array(
                                'rate' => $remcnt,
                            );
                            $this->db->where('stock_id', $stock_id2);
                            $this->db->update('stock', $data);


                            $datast = array(
                                'count' => $cntrel,
                                'status' => 'For Delivery',
                            );

                            $this->db->where('status', 'Requested');
                            $this->db->where('request_temp_id', $request_temp_id);
                            $this->db->update('requeststocktemp', $datast);

                            //LOGS START
                            date_default_timezone_set('Asia/Manila');
                            $date_log = date('F j, Y g:i:a  ');
                            $logs = array(
                                'stock_id' => $stock_id,
                                'user_id' => $_SESSION['user_id'],
                                'division' => $row['requested_by'],
                                'quantity' => $cntrel,
                                'timestamp' => $date_log,
                                'activity' => 'Stock Out',
                                'remarks' => 'New count: '.$remcnt.'<br> RIS No.: ' . $row['ris_no'],
                            );

                            return $this->db->insert('stock_txn', $logs);
                            //LOGS END
                    }else{
                        return false;
                    }
                }
            }
        }
    }

    public function getris(){
    //    $divsn = $_SESSION['division'];
        // $query = $this->db->query("SELECT * FROM requeststocktemp where requested_by = '$divsn' group by ris_no ");
        $query = $this->db->query("SELECT * FROM requeststocktemp GROUP BY ris_no");
        return $query->result_array();
    }

    public function getrishistory(){
         $query = $this->db->query("SELECT a.*, b.unit FROM requeststocktemp a LEFT JOIN stock b on a.stock_id = b.stock_id");
         return $query->result_array();
     }
    
     public function wish($id){
        $data = array(
            'wish' => $_SESSION['division'],
        );

        $this->db->where('stock_id', $id);
        return $this->db->update('stock', $data);
    }

    public function check_wish(){
        $query = $this->db->get('stock');
        foreach($query->result_array() as $row){
            if($row['rate'] >= $row['threshold']){
                $data = array(
                    'wish' => '',
                );
                $this->db->where('stock_id', $row['stock_id']);
                $this->db->update('stock', $data);
            }
        }
    }
    
    
}

?>
       