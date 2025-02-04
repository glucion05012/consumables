<style>
    .card{
        margin: 2rem;
    }

</style>

<div class="content-wrapper">

<div style="color: green; text-align: center; padding: 5px">
    <?php if($this->session->flashdata('successmsg')): ?> 
        <p><?php echo $this->session->flashdata('successmsg'); ?></p>
    <?php endif; ?>
</div>

<div style="color: red; text-align: center; padding: 5px">
    <?php if($this->session->flashdata('errormsg')): ?> 
        <p><?php echo $this->session->flashdata('errormsg'); ?></p>
    <?php endif; ?>
</div>
    <!-- ----------------------- card ----------------------- -->
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-50 py-2">
                    <a href='' data-toggle='modal' data-target='#requestModal' >
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cart</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                        $cnt = 0;
                                        foreach($itemTemp as $at){
                                            if($at['requested_by'] == $_SESSION['division']){
                                                $cnt += 1;
                                            }
                                        }
                                        echo $cnt;
                                    ?></div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-50 py-2">
                    <a href='' data-toggle='modal' data-target='#requestModalPending' >
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                        $cnt = 0;
                                        foreach($itemTempRequested as $at){
                                            if($at['requested_by'] == $_SESSION['division']){
                                                $cnt += 1;
                                            }
                                        }
                                        echo $cnt;
                                    ?></div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-50 py-2">
                    <a href='' data-toggle='modal' data-target='#requestModalForAcceptance' >
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">For Acceptance</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                        $cnt = 0;
                                        foreach($itemTempForDelivery as $at){
                                            if($at['requested_by'] == $_SESSION['division']){
                                                $cnt += 1;
                                            }
                                        }
                                        echo $cnt;
                                    ?></div>    
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-thumbs-up fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-50 py-2">
                    <a href='' data-toggle='modal' data-target='#requestModalForCompleted' >
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                        $cnt = 0;
                                        foreach($itemTempCompleted as $at){
                                            if($at['requested_by'] == $_SESSION['division']){
                                                $cnt += 1;
                                            }
                                        }
                                        echo $cnt;
                                    ?></div>      
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>Product Code</th>
                    <th>Name of Product</th>
                    <th>No of Stocks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($stockList as $cl) : ?>
                    <?php if(intval($cl['rate']) <= intval($cl['threshold'])){
                        echo '<tr class="table-active" style="background-color: #FFCCCB"> ';
                    }else{
                        echo '<tr class="table-active"> ';
                    }  ?>
                        <td><?php echo $cl['sku']; ?></td>
                        <td><?php echo $cl['product']; ?></td>
                        <td><b><?php echo $cl['rate']; ?></b></td>
                        <td>
                            <?php if(intval($cl['rate']) <= intval($cl['threshold'])) : ?>
                                    <button class='btn btn-danger' disabled>Insufficient Stock</button>
                                    <?php if($cl['wish'] == "") : ?>
                                        <a class='btn btn-primary'  onclick="return confirm('Press OK to confirm wish for stock?')" href='wish/<?php echo $cl['stock_id']; ?>' title="Add to Wish List"><i class="nav-icon fa fa-star"></i></a>
                                    <?php endif; ?>
                                <?php else : ?>
                                <a class='btn btn-success' href='' data-toggle='modal' data-target='#addItemModal-<?php echo $cl['stock_id']; ?>' value='<?php echo $cl['stock_id']; ?>' title="Add to Cart">+</a>
                            <?php endif; ?>
                            
                        </td>
                    </tr>   
                <?php endforeach; ?>
            </tbody>
        </table>

</div>

        <!-- MODAL FOR REQUEST -->
        <div id="requestModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Request for Stock</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  
                    <form action="<?= base_url('stockcontroller/addItemRequested'); ?>" method="post" accept-charset="utf-8">

                        <table id="cartTable" class="table table-striped table-bordered table-sm align">
                            <tr>
                                <th>Product Code</th>
                                <th>Name of Product</th>
                                <th>No of Stocks</th>
                                <th>Date Requested</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            <?php foreach($itemTemp as $ht) : ?>
                                <?php if($_SESSION['division'] == $ht['requested_by']) : ?>
                                    <tr>
                                        <td><?php echo $ht['sku'];?></td>
                                        <td><?php echo $ht['product'];?> - <?php echo $ht['description'];?></td>
                                        <td><?php echo $ht['count'];?></td>
                                        <td><?php echo $ht['timestamp'];?></td>
                                        <td><?php echo $ht['status'];?></td>
                                        <td><a class='btn btn-danger' href='' id='removestock-<?php echo $ht['request_temp_id']; ?>' value='<?php echo $ht['request_temp_id']; ?>' title="Remove">-</a></td>
                                        
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </table>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Press OK to confirm request of stock?')">Request</button>
                    </form>    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>

                </div>
            </div>
        </div>
        <!-- END MODAL FOR REQUEST -->

        <!-- MODAL FOR REQUEST PENDING -->
        <div id="requestModalPending" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Pending Request for Stock</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  
                    <form action="<?= base_url('stockcontroller/addItemRequestedCancel'); ?>" method="post" accept-charset="utf-8">

                        <table id="cartTable" class="table table-striped table-bordered table-sm align">
                            <tr>
                                <th>RIS No.</th>
                                <th>Product Code</th>
                                <th>Name of Product</th>
                                <th>No of Stocks</th>
                                <th>Date Requested</th>
                                <th>Status</th>
                            </tr>

                            <?php foreach($itemTempRequested as $ht) : ?>
                                <?php if($_SESSION['division'] == $ht['requested_by']) : ?>
                                    <tr>
                                        <td><?php echo $ht['ris_no'];?></td>
                                        <td><?php echo $ht['sku'];?></td>
                                        <td><?php echo $ht['product'];?> - <?php echo $ht['description'];?></td>
                                        <td><?php echo $ht['count'];?></td>
                                        <td><?php echo $ht['timestamp'];?></td>
                                        <td><?php echo $ht['status'];?></td>
                                        
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </table>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Press OK to confirm cancel request of stock?')">Cancel</button>
                    </form>    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>

                </div>
            </div>
        </div>
        <!-- END MODAL FOR REQUEST PENDING -->

        

        <!-- MODAL FOR REQUEST ACCEPT -->
        <div id="requestModalForAcceptance" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">For Receiving of Items</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  
                    <form action="<?= base_url('stockcontroller/addItemRequestedAccept'); ?>" method="post" accept-charset="utf-8">

                        <table id="cartTable" class="table table-striped table-bordered table-sm align">
                            <tr>
                                <th>RIS No.</th>
                                <th>Product Code</th>
                                <th>Name of Product</th>
                                <th>No of Stocks</th>
                                <th>Date Requested</th>
                                <th>Status</th>
                            </tr>

                            <?php foreach($itemTempForDelivery as $ht) : ?>
                                <?php if($_SESSION['division'] == $ht['requested_by']) : ?>
                                    <tr>
                                        <td><?php echo $ht['ris_no'];?></td>
                                        <td><?php echo $ht['sku'];?></td>
                                        <td><?php echo $ht['product'];?> - <?php echo $ht['description'];?></td>
                                        <td><?php echo $ht['count'];?></td>
                                        <td><?php echo $ht['timestamp'];?></td>
                                        <td><?php echo $ht['status'];?></td>
                                        
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </table>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Press OK to confirm accept?')">Accept</button>
                    </form>    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>

                </div>
            </div>
        </div>
        <!-- END MODAL FOR REQUEST ACCEPT -->

        <!-- MODAL FOR REQUEST COMPLETED -->
        <div id="requestModalForCompleted" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Completed Stock</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  
                    
                        <table id="cartTable" class="table table-striped table-bordered table-sm align">
                            <tr>
                                <th>RIS No.</th>
                                <th>Product Code</th>
                                <th>Name of Product</th>
                                <th>No of Stocks</th>
                                <th>Date Requested</th>
                                <th>Status</th>
                            </tr>

                            <?php foreach($itemTempCompleted as $ht) : ?>
                                <?php if($_SESSION['division'] == $ht['requested_by']) : ?>
                                    <tr>
                                        <td><?php echo $ht['ris_no'];?></td>
                                        <td><?php echo $ht['sku'];?></td>
                                        <td><?php echo $ht['product'];?> - <?php echo $ht['description'];?></td>
                                        <td><?php echo $ht['count'];?></td>
                                        <td><?php echo $ht['timestamp'];?></td>
                                        <td><?php echo $ht['status'];?></td>
                                        
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </table>   
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>

                </div>
            </div>
        </div>
        <!-- END MODAL FOR REQUEST COMPLETED -->

        <!-- MODAL FOR ADD ITEM -->
        <?php foreach($stockList as $plu) : ?>
        <div id="addItemModal-<?php echo $plu['stock_id'];?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Item</h4>
                    <h5><?php echo $plu['sku'];?> - <?php echo $plu['product'];?></h5>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  
                <form action="<?= base_url('stockcontroller/addItem'); ?>" method="post" accept-charset="utf-8">
                    <div class="form-group" style="padding: 2rem" >
                        <div class="form-group-create-sm" style="padding: 1rem; border:2px black solid;">
                            <h3><?php echo $plu['product'];?></h3>
                            <h5><?php echo $plu['description'];?></h5><br><br>
                            <p>Remaining: <?php echo $plu['rate'];?></p>
                        
                            <div class="row">

                                <input type="hidden" name="stock_id" value='<?php echo $plu['stock_id'];?>'>
                                <input type="hidden" name="sku" value='<?php echo $plu['sku'];?>'>
                                <input type="hidden" name="product" value='<?php echo $plu['product'];?>'>
                                <input type="hidden" name="description" value='<?php echo $plu['description'];?>'>
                                <input type="hidden" name="rate" value='<?php echo $plu['rate'];?>'>
                                <input type="hidden" name="amount" value='<?php echo $plu['amount'];?>'>

                                <div class="col-sm-4" >
                                    <p><b>Count: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="addCnt" id="addCnt" required>
                                </div>

                            

                            </div>
                            <div class="center-button" style="margin-top:3rem;">
                                <button type="submit" class="btn btn-success" >Add</button>
                            </div>
                        </div>
                    </div>
                </form> 
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- END MODAL FOR ADD ITEM -->

        

        

<script>
$(document).ready(function() {

    // Setup - add a text input to each footer cell
    $('#myTable thead tr').clone(true).appendTo( '#myTable thead' );
    $('#myTable thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#myTable').DataTable( {
        dom: 'Bflrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        orderCellsTop: true,
        fixedHeader: true,
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        
    } );

} );
    
    <?php foreach($itemTemp as $ht) : ?>
        <?php if($_SESSION['division'] == $ht['requested_by']) : ?>
            $(document).on('click', '#removestock-<?php echo $ht['request_temp_id']; ?>', function(){ 
//                alert(<?php echo $ht['request_temp_id']; ?>);
                if (confirm('Are you sure you want to remove stock?')) {
                var tempid =<?php echo $ht['request_temp_id']; ?>;
                var base_url = <?php echo json_encode(base_url()); ?>;
            
                $.ajax({
                    data : {tempid : tempid}
                    , type: "POST"
                    , url: base_url + "Stockcontroller/removeItemRequested"
                    , dataType: 'json'
                    , crossOrigin: false
                    , success: function(res) {
                       

                         location.reload();
                    }, 
                    error: function(err) {
                        alert(err);
                    }
                });
            }
            });
        <?php endif; ?>
    <?php endforeach; ?>
</script>

