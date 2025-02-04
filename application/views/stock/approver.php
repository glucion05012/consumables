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

        <table id="myTableApproveList" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
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

                    <table id="forDeliveryTable" class="table table-striped table-bordered table-sm align">
                        <thead>
                            <tr>
                                <th>RIS No.</th>
                                <th>SKU</th>
                                <th>Product</th>
                                <th>Count</th>
                                <th>Date Requested</th>
                                <th>Requested By</th>
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
        <!-- END MODAL FOR DELIVERY -->


        

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
    $('#myTableApproveList').DataTable({
        'pageLength': 10,
        'serverSide': true,
        'processing': true,
        'ordering': false,
        "bDestroy": true,
        'order': [],
        'ajax': {
            url : base_url+'Stockcontroller/approve_list_ajax/',
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
        }
    });

    $('#forDeliveryTable').DataTable({
        'pageLength': 10,
        'serverSide': true,
        'processing': true,
        'ordering': false,
        "bDestroy": true,
        'order': [],
        'ajax': {
            url : base_url+'Stockcontroller/for_delivery_list_ajax/',
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
        }
    });
} );
         
         
//  ----------------------- forDeliveryBtn button -----------------------

$(document).on('click', '#forDeliveryBtn', function(){ 
    var request_temp_id = $(this).data("var1");
    var cnt = $(this).data("var2");
    var cntrel = window.prompt("Count of Stock to release.", cnt);
    if (confirm('Are you sure you want to proceed for delivery?')) {
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
    
</script>

