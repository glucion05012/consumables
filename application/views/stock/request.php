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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="card_cart"></div>
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="card_pending_requests"></div>
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
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">For Pick-up</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="card_for_acceptance"></div>    
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="card_completed"></div>      
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

        <div style="margin: 20px">
            <a href="#" id="wish_not_list">Item not in the list?</a>
        </div>

        <table id="requestTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>Product Code</th>
                    <th>Name of Product</th>
                    <th>No of Stocks</th>
                    <th>Threshold</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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
                            <thead>    
                                <tr>
                                    <th>Product Code</th>
                                    <th>Name of Product</th>
                                    <th>No of Stocks</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <textarea name="purpose" rows="4" cols="50" class="form-control" placeholder="Please enter your purpose or request." required></textarea>
                        <br>
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
                    <h4 class="modal-title">Pending Request for Stock <span id="purposelabel"></span></h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  
                    <form action="<?= base_url('stockcontroller/addItemRequestedCancel'); ?>" method="post" accept-charset="utf-8">

                        <table id="requestedTable" class="table table-striped table-bordered table-sm align">
                            <thead>
                                <tr>
                                    <th>RIS No.</th>
                                    <th>Product Code</th>
                                    <th>Name of Product</th>
                                    <th>No of Stocks</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
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
                    <form action="<?= base_url('stockcontroller/addItemRequestedAccept'); ?>" method="post" accept-charset="utf-8" onsubmit="return validateForm()">

                        <table id="acceptanceTable" class="table table-striped table-bordered table-sm align">
                            <thead>
                                <tr>
                                    <th>RIS No.</th>
                                    <th>Product Code</th>
                                    <th>Name of Product</th>
                                    <th>No of Stocks</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <!-- RATING STAR -->
                        <style>
                            .rating {
                                margin-top: 40px;
                                border: none;
                                float: left;
                            }

                            .rating > label {
                                color: #90A0A3;
                                float: right;
                                cursor: pointer; /* Changes the cursor to a hand */
                            }

                            .rating > label:before {
                                margin: 5px;
                                font-size: 2em;
                                font-family: FontAwesome;
                                content: "\f005";
                                display: inline-block;
                            }

                            .rating > input {
                                display: none;
                            }

                            .rating > input:checked ~ label,
                            .rating:not(:checked) > label:hover,
                            .rating:not(:checked) > label:hover ~ label {
                                color: #F79426;
                            }

                            .rating > input:checked + label:hover,
                            .rating > input:checked ~ label:hover,
                            .rating > label:hover ~ input:checked ~ label,
                            .rating > input:checked ~ label:hover ~ label {
                                color: #FECE31;
                            }

                            /* Styling for the title display */
                            .rating-title {
                                font-size: 1.2em;
                                color: #333;
                                margin-top: 10px;
                                text-align: center;
                            }
                        </style>

                        <!-- This span will display the selected title -->
                        <div class="row">
                            <div class="col-sm-12">
                            <b>Overall Rating: <span style="color:red">*</span></b> <span class="rating-title" style="font-weight:bold; text-align:center"id="ratingTitle"></span>
                            </div>
                            <div class="col-sm-12">
                                <div class="rating">
                                    <input type="radio" id="star5" name="rating" value="5"  />
                                    <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                    <input type="radio" id="star4" name="rating" value="4"  />
                                    <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                    <input type="radio" id="star3" name="rating" value="3"  />
                                    <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                    <input type="radio" id="star2" name="rating" value="2"  />
                                    <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                    <input type="radio" id="star1" name="rating" value="1"  />
                                    <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <textarea name="feedback" rows="4" cols="50" class="form-control" placeholder="Please enter your feedback to this transaction." ></textarea>
                            </div>
                        </div>
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
                    
                        <table id="completedTable" class="table table-striped table-bordered table-sm align">
                            <thead>
                            <tr>
                                <th>RIS No.</th>
                                <th>Product Code</th>
                                <th>Name of Product</th>
                                <th>No of Stocks</th>
                                <th>Date Requested</th>
                                <th>Status</th>
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
        <!-- END MODAL FOR REQUEST COMPLETED -->

        <!-- MODAL FOR ADD ITEM -->
        <div id="addItemModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Item</h4>
                    <h5><p id = "skulabel"></p><p id = "productlabel2"></p></h5>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  
                <form action="<?= base_url('stockcontroller/addItem'); ?>" method="post" accept-charset="utf-8">
                    <div class="form-group" style="padding: 2rem" >
                        <div class="form-group-create-sm" style="padding: 1rem; border:2px black solid;">
                            <h3 id="productlabel"></h3>
                            <h5 id="desclabel"></h5><br><br>
                            <p>Remaining: <p id ="ratelabel"></p></p>
                            <input type="text" id="ratelabelval" hidden>
                        
                            <div class="row">

                                <input type="hidden" name="stock_id" >
                                <input type="hidden" name="sku" >
                                <input type="hidden" name="product" >
                                <input type="hidden" name="description" >
                                <input type="hidden" name="rate" >
                                <input type="hidden" name="amount" >

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
        <!-- END MODAL FOR ADD ITEM -->

        <!-- MODAL FOR ADD ITEM NOT IN LIST -->
        <div id="wishNotModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Item not in the list</h4>
                    <h5><p id = "skulabel"></p><p id = "productlabel2"></p></h5>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  
                <form action="<?= base_url('stockcontroller/addItemNotList'); ?>" method="post" accept-charset="utf-8">
                    <div class="form-group" style="padding: 2rem" >
                        <div class="form-group-create-sm" style="padding: 1rem; border:2px black solid;">
                        
                            <div class="row">
                                <div class="col-sm-4" >
                                    <p><b>Name of Product: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="product_name" required>
                                </div>

                                <div class="col-sm-4" >
                                    <p><b>Description: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                <textarea name="product_description" rows="4" cols="50" class="form-control" placeholder="Please enter description of youru requested product." required></textarea>
                                </div>

                                <div class="col-sm-4" >
                                    <p><b>Remarks: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                <textarea name="remarks" rows="4" cols="50" class="form-control" required></textarea>
                                </div>
                            

                            </div>
                            <div class="center-button" style="margin-top:3rem;">
                                <button type="submit" class="btn btn-success" onclick="return confirm('Press OK to confirm request?')">Add to wishlist</button>
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
        <!-- END MODAL ITEM NOT IN LIST -->

        <!-- MODAL FOR ADD WISH LIST -->
        <div id="addWishList" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Wish List</h4>
                    <h5><p id = "skulabelwish">as</p><p id = "productlabel2wish"></p></h5>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  
                <form action="<?= base_url('stockcontroller/addWishList'); ?>" method="post" accept-charset="utf-8">
                    <div class="form-group" style="padding: 2rem" >
                        <div class="form-group-create-sm" style="padding: 1rem; border:2px black solid;">
                        
                            <div class="row">
                                <div class="col-sm-4" >
                                    <p><b>Name of Product: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="product_name" readonly>
                                    <input type="hidden" class="form-control" name="stock_id" readonly>
                                </div>

                                <div class="col-sm-4" >
                                    <p><b>Description: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                <textarea name="product_description" rows="4" cols="50" class="form-control" placeholder="Please enter description of youru requested product." readonly></textarea>
                                </div>

                                <div class="col-sm-4" >
                                    <p><b>Remarks: </b></p> 
                                </div> 
                                <div class="col-sm-8">
                                <textarea name="remarks" rows="4" cols="50" class="form-control" required></textarea>
                                </div>
                            

                            </div>
                            <div class="center-button" style="margin-top:3rem;">
                                <button type="submit" class="btn btn-success" onclick="return confirm('Press OK to confirm request?')">Add to wishlist</button>
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
        <!-- END MODAL WISH LIST -->
        
        

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

    
    var base_url = "<?php echo base_url();?>";
    $('#requestTable').DataTable({
        'pageLength': 10,
        'serverSide': true,
        'processing': false,
        'ordering': false,
        "bDestroy": true,
        'order': [],
        'ajax': {
            url : base_url+'Stockcontroller/request_list_ajax/',
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
            searchPlaceholder: 'Search Product Code or Name',
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
        },
        "rowCallback": function( row, data, index ) {
            if ( parseInt(data[2]) <= parseInt(data[3]) ){
                $('td', row).css('background-color', '#FAA0A0');
            }
            
        }
    });

    
    $('#cartTable').DataTable({
        'pageLength': 10,
        'serverSide': true,
        'processing': true,
        'ordering': false,
        "bDestroy": true,
        'order': [],
        'ajax': {
            url : base_url+'Stockcontroller/pending_list_ajax/',
            type : 'POST',
            dataSrc: function(json) {
                console.log(json);
                if (json && Array.isArray(json.data)) {
                    if (json.data.length === 0) {
                        $('.dataTables_processing').hide();
                        $('#myTableInboxList tbody').html('<tr><td colspan="100%" class="text-center">No records found</td></tr>');
                        return [];
                    }
                    $('#card_cart').html(json.data.length);
                    return json.data;
                }
                return [json.data];
            }
        },
        language: {
            searchPlaceholder: 'Product Code or Name',
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
        }
    });

    $('#requestedTable').DataTable({
        'pageLength': 10,
        'serverSide': true,
        'processing': true,
        'ordering': false,
        "bDestroy": true,
        'order': [],
        'ajax': {
            url : base_url+'Stockcontroller/pending_requested_list_ajax/',
            type : 'POST',
            dataSrc: function(json) {
                console.log(json);
                if (json && Array.isArray(json.data)) {
                    if (json.data.length === 0) {
                        $('.dataTables_processing').hide();
                        $('#myTableInboxList tbody').html('<tr><td colspan="100%" class="text-center">No records found</td></tr>');
                        return [];
                    }
                    $('#card_pending_requests').html(json.data.length);
                    return json.data;
                }
                return [json.data];
            }
        },
        language: {
            searchPlaceholder: 'Product Code or Name',
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
        }
    });

    $('#acceptanceTable').DataTable({
        'pageLength': 10,
        'serverSide': true,
        'processing': true,
        'ordering': false,
        "bDestroy": true,
        'order': [],
        'ajax': {
            url : base_url+'Stockcontroller/acceptance_list_ajax/',
            type : 'POST',
            dataSrc: function(json) {
                console.log(json);
                if (json && Array.isArray(json.data)) {
                    if (json.data.length === 0) {
                        $('.dataTables_processing').hide();
                        $('#myTableInboxList tbody').html('<tr><td colspan="100%" class="text-center">No records found</td></tr>');
                        return [];
                    }
                    $('#card_for_acceptance').html(json.data.length);
                    return json.data;
                }
                return [json.data];
            }
        },
        language: {
            searchPlaceholder: 'Product Code or Name',
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
        }
    });

    $('#completedTable').DataTable({
        'pageLength': 10,
        'serverSide': true,
        'processing': true,
        'ordering': false,
        "bDestroy": true,
        'order': [],
        'ajax': {
            url : base_url+'Stockcontroller/completed_list_ajax/',
            type : 'POST',
            dataSrc: function(json) {
                console.log(json);
                if (json && Array.isArray(json.data)) {
                    if (json.data.length === 0) {
                        $('.dataTables_processing').hide();
                        $('#myTableInboxList tbody').html('<tr><td colspan="100%" class="text-center">No records found</td></tr>');
                        return [];
                    }
                    $('#card_completed').html(json.data.length);
                    return json.data;
                }
                return [json.data];
            }
        },
        language: {
            searchPlaceholder: 'Product Code or Name',
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
        }
    });
} );

// setInterval( function () {
//  $('#requestTable').DataTable().ajax.reload();
//  }, 5000);
    
    $(document).on('click', '#wishBtn', function(){ 
        $('#addWishList').modal('show');
        var id = $(this).val();
        var base_url = "<?php echo base_url();?>";
        $.ajax({
            url: base_url + "Stockcontroller/stock_list_one/" + id,
            method: 'POST',
            dataType: 'JSON',
            success: function(data) {
                if (data != 0) {
                    // transaction details data
                    $('input[name=stock_id]').val(data.stock_id);
                    $('#skulabelwish').html(data.sku);
                    $('#productlabel2wish').html(data.product);
                    $('input[name=product_name]').val(data.product);
                    $('textarea[name=product_description]').val(data.description);
                    
                } else {
                    console.log("No record exists", "Error");
                }
            }
        });
        // if (confirm('Are you sure you want to wish for stock?')) {
        //     var id = $(this).val();
        //     var base_url = <?php echo json_encode(base_url()); ?>;
           
        //     $.ajax({
        //         type: "POST"
        //         , url: base_url + "wish/"+id
        //         , dataType: 'json'
        //         , crossOrigin: false
        //         , success: function(res) {
        //             location.reload();
        //         }, 
        //         error: function(err) {
        //             location.reload();
        //         }
        //     });
        // }
    });
    
    $('#addCnt').on('input', function() {
        var rate = $('#ratelabelval').val();
        var addCnt = $('#addCnt').val();
        if(parseInt(rate) < parseInt(addCnt)){
            alert("Count should not exceed the remaining stock.");
            $('#addCnt').val('');
        }
    });

    $(document).on('click', '#addBtn', function() {
        $('#addItemModal').modal('show');
        var id = $(this).val();
        var base_url = "<?php echo base_url();?>";
        $.ajax({
            url: base_url + "Stockcontroller/stock_list_one/" + id,
            method: 'POST',
            dataType: 'JSON',
            success: function(data) {
                $('#addItemModal').modal('show');
                if (data != 0) {
                    // transaction details data
                    $('input[name=stock_id]').val(data.stock_id);
                    $('input[name=sku]').val(data.sku);
                    $('input[name=product]').val(data.product);
                    $('input[name=description]').val(data.description);
                    $('input[name=rate]').val(data.rate);
                    $('input[name=amount]').val(data.amount);
                    $('#productlabel').html(data.product);
                    $('#productlabel2').html(data.product);
                    $('#desclabel').html(data.description);
                    $('#ratelabel').html(parseInt(data.rate)-parseInt(data.total_count_pending)+' '+data.unit);
                    $('#ratelabelval').val(parseInt(data.rate)-parseInt(data.total_count_pending));
                    $('#skulabel').html(data.sku);
                    
                } else {
                    console.log("No record exists", "Error");
                }
            }
        });
    });

    $(document).on('click', '#removestock', function(){ 
        if (confirm('Are you sure you want to remove stock?')) {
        var tempid = $(this).val();
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
                location.reload();
            }
        });
    }
    });

    $(document).on('click', '#wish_not_list', function(){ 
        $('#wishNotModal').modal('show');
    });
    
    const ratingInputs = document.querySelectorAll('.rating input');
    const ratingTitle = document.getElementById('ratingTitle');

    // Event listener to update the rating title on change
    ratingInputs.forEach(input => {
        input.addEventListener('change', function() {
            const selectedLabel = document.querySelector(`label[for='${this.id}']`);
            const ratingValue = parseInt(this.value);  // Get the selected rating value

            // Set the title text
            ratingTitle.textContent = `${selectedLabel.getAttribute('title')}`;

            // Change the text color based on the rating value
            if (ratingValue === 1) {
                ratingTitle.style.color = 'red';  // Bad
            } else if (ratingValue === 2) {
                ratingTitle.style.color = 'orange';  // Good
            } else if (ratingValue === 3) {
                ratingTitle.style.color = 'yellow';  // Very good
            } else if (ratingValue === 4) {
                ratingTitle.style.color = 'lightgreen';  // Great
            } else if (ratingValue === 5) {
                ratingTitle.style.color = 'green';  // Awesome
            }
        });
    });

    function validateForm() {
        // Check if the table has any rows in the tbody
        const tableBody = document.querySelector('#acceptanceTable tbody');
        const rows = tableBody.querySelectorAll('tr');
        
        // If there are no rows in the table, alert the user and prevent submission
        if (rows.length === 0) {
            alert("Please add some items to the table before accepting.");
            return false;  // Prevent form submission
        }

        // Validation for rating selection and feedback textarea
        const selectedRating = document.querySelector('input[name="rating"]:checked');
        const feedback = document.querySelector('textarea[name="feedback"]').value.trim();

        // Check if a rating is selected
        if (!selectedRating) {
            alert("Please select a rating before submitting.");
            return false;  // Prevent form submission
        }

        // Check if feedback is provided
        if (feedback === "") {
            alert("Please enter your feedback.");
            return false;  // Prevent form submission
        }

        // Show confirmation dialog before submitting the form
        const isConfirmed = confirm("Press OK to confirm acceptance of this rating and feedback.");
        if (!isConfirmed) {
            return false;  // Prevent form submission if not confirmed
        }

        return true;  // Allow form submission if all conditions are met
    }
</script>

