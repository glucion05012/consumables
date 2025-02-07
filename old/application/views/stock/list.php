<style>
    .card{
        margin: 2rem;
    }

</style>

<div class="content-wrapper">

<div class='successmsg'>
    <?php if($this->session->flashdata('successmsg')): ?> 
        <p><?php echo $this->session->flashdata('successmsg'); ?></p>
    <?php endif; ?>
</div>
    <!-- ----------------------- card ----------------------- -->
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-50 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Current Total Stocks</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($stockList) ?></div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-50 py-2">
                    <a href='' data-toggle='modal' data-target='#wishModal' >
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Wish List</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                        $cnt = 0;
                                        foreach($stockList as $at){
                                            if($at['wish'] != ""){
                                                $cnt += 1;
                                            }
                                        }
                                        echo $cnt;
                                    ?></div>    
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-star fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <a class="btn btn-success create-btn" href="<?= base_url('stock/add'); ?>">Add New Stock</a>

        <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>Product Code</th>
                    <th>Name of Product</th>
                    <th>Description</th>
                    <th>No of Stocks</th>
                    <th>Threshold</th>
                    <th>Unit</th>
                    <th>Amount</th>
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
                        <td><?php echo $cl['description']; ?></td>
                        <td><b><?php echo $cl['rate']; ?></b></td>
                        <td><b><?php echo $cl['threshold']; ?></b></td>
                        <td><?php echo $cl['unit']; ?></td>
                        <td><?php echo $cl['amount']; ?></td>
                        
                        <td>
                            <a class='btn btn-success' href='' data-toggle='modal' data-target='#updateStockModal-<?php echo $cl['stock_id']; ?>' value='<?php echo $cl['stock_id']; ?>' title='Add Stock'><i class='fas fa-plus'></i></a>
                            <a class='btn btn-info' href='' data-toggle='modal' data-target='#historyModal-<?php echo $cl['stock_id']; ?>' value='<?php echo $cl['stock_id']; ?>' title='History'><i class='fas fa-list'></i></a>
                            <a href="edit/<?php echo $cl['stock_id']; ?>" class='btn btn-primary'><i class="fa fa-edit" title='Edit'></i></a>
                            <a class='btn btn-danger' onclick="return confirm('Press OK to confirm delete stock?')" href="delete/<?php echo $cl['stock_id']; ?>" title='Delete'><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>   
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- MODAL FOR HISTORY -->
        <?php foreach($stockList as $plu) : ?>
            <div id="historyModal-<?php echo $plu['stock_id'];?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">History Stock</h4>
                        <h5><?php echo $plu['sku'];?> - <?php echo $plu['product'];?></h5>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" >  
                      
                    <div class="modal-body" style="align-self:center;">  

                        <table id="myTable" class="table table-striped table-bordered table-sm align">
                            <tr>
                                <th>Transaction Date</th>
                                <th>Division</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Activity</th>
                                <th>Remarks</th>
                            </tr>

                            <?php foreach($history_stock_txn as $ht) : ?>
                                <?php if($plu['stock_id'] == $ht['stock_id'])  : ?>
                                    <tr>
                                        <td><?php echo $ht['timestamp'];?></td>
                                        <td><?php echo $ht['division'];?></td>
                                        <td><?php echo $ht['product'];?></td>
                                        <td><?php echo $ht['quantity'];?></td>
                                        <td><?php echo $ht['activity'];?></td>
                                        <td><?php echo $ht['remarks']; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </table>

                        </div>
                        
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                    </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- END MODAL FOR HISTORY -->

        <!-- MODAL FOR ADD STOCK -->
        <?php foreach($stockList as $plu) : ?>
            <div id="updateStockModal-<?php echo $plu['stock_id'];?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Update Stock</h4>
                        <h5><?php echo $plu['sku'];?> - <?php echo $plu['product'];?></h5>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" >  

                    <form action="<?= base_url('stockcontroller/update_restock'); ?>" method="post" accept-charset="utf-8">
                      
                            <div style="padding: 1rem; ">
                            
                            <div class="row">
                    
                                <input type="hidden" class="form-control" name="stock_id" value="<?php echo $plu['stock_id']; ?>">

                                <div class="col-sm-4" >
                                    <p><b>SKU: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="sku" value="<?php echo $plu['sku']; ?>" readonly>
                                </div>

                                <div class="col-sm-4" >
                                    <p><b>Product: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="product" value="<?php echo $plu['product']; ?>" readonly>
                                </div>

                                <div class="col-sm-4" >
                                    <p><b>Description: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                    <textarea name="description" rows="4" cols="50" class="form-control" readonly><?php echo $plu['description']; ?></textarea>
                                </div>
                                
                                <div class="col-sm-4" >
                                    <p><b>Remaining Stocks: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="rate-<?php echo $plu['stock_id']; ?>" name="rate" value="<?php echo $plu['rate']; ?>" readonly>
                                </div>
                                <br><br><br><br>
                                <div class="col-sm-12" >
                                    <h5>Stock to be added:</h5>
                                </div> 
                                <!-- for request transaction list -->
                               
                                <div class="col-sm-4" >
                                    <p><b>Quantity: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                    <input type="number"  class="form-control" name="updated_stock" required>
                                </div>

                                </div>
                                <div class="center-button" style="margin-top:3rem;">
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Press OK to confirm Update Stock?')">Update</button>
                                </div>

                            </div>
                        </div>
                    </form> 
                        
                    </div>

                    
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- END MODAL FOR  ADD STOCK -->

        <!-- MODAL FOR WISH LIST -->
        <div id="wishModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Wish List</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  
                    
                        <table id="cartTable" class="table table-striped table-bordered table-sm align">
                            <tr>
                                <th>Product Code</th>
                                <th>Name of Product</th>
                                <th>No of Stocks</th>
                                <th>Requested By</th>
                            </tr>

                            <?php foreach($stockList as $ht) : ?>
                                <?php if($ht['wish'] != "") : ?>
                                    <tr>
                                        <td><?php echo $ht['sku'];?></td>
                                        <td><?php echo $ht['product'];?> - <?php echo $ht['description'];?></td>
                                        <td><?php echo $ht['rate'];?> <?php echo $ht['unit'];?></td>
                                        <td><?php echo $ht['wish'];?></td>
                                        
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
        <!-- END MODAL FOR WISH LIST -->
</div>

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
</script>

