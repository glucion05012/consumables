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

        <table id="myTableStockList" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>Product Code</th>
                    <th>ENGAS ID</th>
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
            </tbody>
        </table>

        <!-- MODAL FOR WISH LIST -->
        <div id="wishModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Wish List</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">  
                    
                        <table id="myTableWishList" style="width: 100% !important"class="table table-striped table-bordered table-sm align">
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Name of Product</th>
                                    <th>No of Stocks</th>
                                    <th>Requested By</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
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

        <!-- MODAL FOR HISTORY -->
        <div id="historyModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">History Stock</h4>
                    <h5 id="sku"></h5>
                </div>

                <!-- Modal body -->
                <div class="modal-body" >  
                    
                <div class="modal-body" style="align-self:center;">  

                    <table id="myTableHistoryList" class="table table-striped table-bordered table-sm align">
                        <tr>
                            <thead>
                                <th>Transaction Date</th>
                                <th>Division</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Activity</th>
                                <th>Remarks</th>
                            </thead>
                        </tr>
                        <tbody>
                        </tbody>

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
        <!-- END MODAL FOR HISTORY -->

        <!-- MODAL FOR ADD STOCK -->
        <div id="updateStockModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Stock</h4>
                    <h5 id="sku_label"></h5>
                </div>

                <!-- Modal body -->
                <div class="modal-body" >  

                <form action="<?= base_url('stockcontroller/update_restock'); ?>" method="post" accept-charset="utf-8">
                    
                        <div style="padding: 1rem; ">
                        
                        <div class="row">
                
                            <input type="hidden" class="form-control" name="stock_id">

                            <div class="col-sm-4" >
                                <p><b>SKU: </b></p> 
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sku" readonly>
                            </div>

                            <div class="col-sm-4" >
                                <p><b>Product: </b></p> 
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="product" readonly>
                            </div>

                            <div class="col-sm-4" >
                                <p><b>Description: </b></p> 
                            </div> 
                            <div class="col-sm-8">
                                <textarea name="description" rows="4" cols="50" class="form-control" readonly></textarea>
                            </div>
                            
                            <div class="col-sm-4" >
                                <p><b>Remaining Stocks: </b></p> 
                            </div> 
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="rate" readonly>
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
                            <div class="col-sm-4" >
                                <p><b>Amount: </b></p> 
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="updated_amount" required>
                            </div>

                            <div class="col-sm-4" >
                                <p><b>Old Stock: </b></p> 
                            </div> 
                            <div class="col-sm-8">
                                <select name="old" required>
                                    <option selected value="no">no</option>
                                    <option value="yes">yes</option>
                                </select>
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
        <!-- END MODAL FOR  ADD STOCK -->
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
 
    $(document).ready(function(e){
        var base_url = "<?php echo base_url();?>";
        $('#myTableStockList').DataTable({
            'pageLength': 10,
            'serverSide': true,
            'processing': true,
            'ordering': false,
            "bDestroy": true,
            'order': [],
            'ajax': {
                url : base_url+'Stockcontroller/stock_list_ajax/',
                type : 'POST',
                dataSrc: function(json) {
                    console.log(json);
                    if (json && Array.isArray(json.data)) {
                        if (json.data.length === 0) {
                            $('.dataTables_processing').hide();
                            $('#myTableInboxList tbody').html('<tr><td colspan="100%" class="text-center">No records found</td></tr>');
                            return [];
                        }
                        return json.data;
                    }
                    return [json.data];
                }
            },
            language: {
                searchPlaceholder: 'Search Product Code or Name or Description',
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
            },
            "rowCallback": function( row, data, index ) {
                if ( parseInt(data[4]) <= parseInt(data[5]) ){
                    $('td', row).css('background-color', '#FAA0A0');
                }
            }
        });

        $('#myTableWishList').DataTable({
            'pageLength': 10,
            'serverSide': true,
            'processing': true,
            'ordering': false,
            "bDestroy": true,
            'order': [],
            'ajax': {
                url : base_url+'Stockcontroller/wish_list_ajax/',
                type : 'POST',
                dataSrc: function(json) {
                    console.log(json);
                    if (json && Array.isArray(json.data)) {
                        if (json.data.length === 0) {
                            $('.dataTables_processing').hide();
                            $('#myTableInboxList tbody').html('<tr><td colspan="100%" class="text-center">No records found</td></tr>');
                            return [];
                        }
                        return json.data;
                    }
                    return [json.data];
                }
            },
            language: {
                searchPlaceholder: 'Product Code or Name or Requested By',
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
            }
        });
        
    });

    $(document).on('click', '#historyBtn', function() {
        var id = $(this).val();
        var base_url = "<?php echo base_url();?>";
       
            $('#historyModal').modal('show');
            // history table
            var base_url = "<?php echo base_url();?>";
            $('#myTableHistoryList').DataTable({
            'pageLength': 10,
            'serverSide': true,
            'processing': true,
            'ordering': false,
            "bDestroy": true,
            'order': [],
            'ajax': {
                url : base_url+'Stockcontroller/history_list_ajax/'+id,
                type : 'POST',
                dataSrc: function(json) {
                    console.log(json);
                    if (json && Array.isArray(json.data)) {
                        if (json.data.length === 0) {
                            $('.dataTables_processing').hide();
                            $('#myTableInboxList tbody').html('<tr><td colspan="100%" class="text-center">No records found</td></tr>');
                            return [];
                        }
                        return json.data;
                    }
                    return [json.data];
                }
            },
            language: {
                searchPlaceholder: 'Product Code or Division or SKU',
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
            }
        });
    });

    $(document).on('click', '#updateStockBtn', function() {
        var id = $(this).val();
        var base_url = "<?php echo base_url();?>";
        $.ajax({
            url: base_url + "Stockcontroller/stock_list_one/" + id,
            method: 'POST',
            dataType: 'JSON',
            success: function(data) {
                $('#updateStockModal').modal('show');
                if (data != 0) {
                    // transaction details data
                    $('#sku_label').html(data.sku + ' - ' + data.product);
                    $('input[name=stock_id]').val(data.stock_id);
                    $('input[name=sku]').val(data.sku);
                    $('input[name=product]').val(data.product);
                    $('textarea[name=description]').val(data.description);
                    $('input[name=rate]').val(data.rate);
                    
                } else {
                    console.log("No record exists", "Error");
                }
            }
        });
    });

} );
</script>

