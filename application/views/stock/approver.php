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
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Requested</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($itemTempRequested) ?></div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-50 py-2">
                    <a href='' data-toggle='modal' data-target='#requestModalPendingForDelivery' >
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">For Delivery</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($itemTempForDelivery) ?></div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
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
                    <th>RIS No.</th>
                    <th>Product Code</th>
                    <th>Name of Product</th>
                    <th>Description</th>
                    <th>No Of Stocks</th>
                    <th>Date Requested</th>
                    <th>Requested By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($itemTempRequested as $cl) : ?>
                        <tr class="table-active"> 
                            <td><?php echo $cl['ris_no']; ?></td>
                            <td><?php echo $cl['sku']; ?></td>
                            <td><?php echo $cl['product']; ?></td>
                            <td><?php echo $cl['description']; ?></td>
                            <td><b><?php echo $cl['count']; ?></b></td>
                            <td><?php echo $cl['timestamp']; ?></td>
                            <td><?php echo $cl['requested_by']; ?></td>
                            <td>
                                <button type="submit" id="forDeliveryBtn-<?php echo $cl['request_temp_id'];?>" value='<?php echo $cl['request_temp_id'];?>' class="btn btn-success" >For Delivery</button>
                            </td>
                        </tr>   
                <?php endforeach; ?>
            </tbody>
        </table>

        

</div>

       

        <!-- MODAL FOR DELIVERY -->
        <div id="requestModalPendingForDelivery" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Stock For Delivery</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  

                    <table id="cartTable" class="table table-striped table-bordered table-sm align">
                        <tr>
                            <th>RIS No.</th>
                            <th>SKU</th>
                            <th>Product</th>
                            <th>Count</th>
                            <th>Date Requested</th>
                            <th>Requested By</th>
                            <th>Status</th>
                        </tr>

                        <?php foreach($itemTempForDelivery as $ht) : ?>
                            <tr>
                                <td><?php echo $ht['ris_no'];?></td>
                                <td><?php echo $ht['sku'];?></td>
                                <td><?php echo $ht['product'];?> - <?php echo $ht['description'];?></td>
                                <td><?php echo $ht['count'];?></td>
                                <td><?php echo $ht['timestamp'];?></td>
                                <td><?php echo $ht['requested_by'];?></td>
                                <td><?php echo $ht['status'];?></td>
                                
                            </tr>
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
        <!-- END MODAL FOR DELIVERY -->

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
         
         
//  ----------------------- forDeliveryBtn button -----------------------
<?php foreach($itemTempRequested as $cl) : ?>
    $(document).on('click', '#forDeliveryBtn-<?php echo $cl['request_temp_id'];?>', function(){ 
        var cntrel = window.prompt("Count of Stock to release.", <?php echo $cl['count']; ?>);
        if (confirm('Are you sure you want to proceed for delivery?')) {
            var request_temp_id = $(this).val();
//           alert(cntrel);
            var base_url = <?php echo json_encode(base_url()); ?>;
            $.ajax({
                data : {request_temp_id : request_temp_id,
                       cntrel : cntrel}
                , type: "POST"
                , url: base_url + "Stockcontroller/itemTempToForDelivery"
                , crossOrigin: false
                , success: function(res) {
                    alert('Successfully updated for delivery.');
                    location.reload();
                }, 
                error: function(err) {
                    alert( 'Insufficient Stocks!');
                     location.reload();
                }
            });
            location.reload();
        }
        location.reload();            
    });
<?php endforeach; ?>
    
</script>

