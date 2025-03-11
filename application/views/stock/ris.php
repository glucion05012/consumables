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
    <table id="myTableRISList" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th>RIS No.</th>
                <th>Time Stamp</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <!-- RIS MODAL -->
    <div id="risModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            
            <div id="printableArea">

                <!-- Modal Header -->
                <div class="modal-header" style="justify-content:center">
                    <!-- <h4 class="modal-title">RIS No.</h4>
                    <h5 id="risNo"></h5> -->
                        
                        <table>
                            <tr><th colspan=4 style="text-align:center; padding-bottom: 30px;">REQUISITION AND ISSUE SLIP</th></tr>
                            
                            <tr>
                                <b>
                                <th>Entity Name: </th>
                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp DENR-EMB-NCR &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                <th>Fund Cluster: </th>
                                <td></td>
                                </b>
                            </tr>
                            <tr>
                                <th>Division: </th>
                                <td></td>
                                <th>Responsibility Center Code: </th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Office: </th>
                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span id="requestedBy"></span></td>
                                <th>RIS No.: </th>
                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span id="risNo1"></span> </td>
                            </tr>

                        </table>
                </div>

                <!-- Modal body -->
                <div class="modal-body" >  
                
                    <div class="modal-body" style="align-self:center;">  

                        <table id="risTable" class="table table-striped table-bordered table-sm align">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Stock No.</th>
                                    <th>Unit</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th colspan=2>Stock Available?</th>
                                    <th colspan=2 >Issue</th>
                                </tr>
                                <tr style="text-align:center">
                                    <td colspan=4></td>
                                    <td>Yes</td>
                                    <td>No</td>
                                    <td>Quantity</td>
                                    <td>Remarks</td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <!-- <?php foreach($getrishistory as $ht) : ?>
                                <?php if($plu['ris_no'] == $ht['ris_no'])  : ?>
                                    <tr style="text-align:center">
                                        <td><?php echo $ht['sku'];?></td>
                                        <td><?php echo $ht['unit'];?></td>
                                        <td><?php echo $ht['product'];?></td>
                                        <td><?php echo $ht['count'];?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?> -->

                        </table>

                        <p><b>Purpose: For official use of DENR-NCR</b></p>

                        <table class="table table-bordered table-sm align"> 
                            <tr style="text-align:center">
                                <th></th>
                                <td><b>Requested by:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></td>
                                <td><b>Approved by:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></td>
                                <td><b>Issued by:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></td>
                                <td><b>Received by:</b></td>
                            </tr>
                            <tr style="text-align:center">
                                <td style="text-align:left">Signature:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="text-align:center">
                                <td style="text-align:left">Printed Name:</td>
                                <td><span id="requestedBy2"></span></td>
                                <td>Jan S. Bautista</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="text-align:center">
                                <td style="text-align:left">Designation:</td>
                                <td></td>
                                <td>Chief, Administrative Division</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="text-align:center">
                                <td style="text-align:left">Date:</td>
                                <td><span id="date_requested"></span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>

                    </div>
                    
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a href=""  onclick="printDiv('printableArea')"  class='btn btn-success'>Export</a>
                <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
            </div>

            </div>
        </div>
    </div>
    <!-- RIS MODAL END -->
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

                var base_url = "<?php echo base_url();?>";
                $('#myTableRISList').DataTable({
                    'pageLength': 10,
                    'serverSide': true,
                    'processing': true,
                    'ordering': false,
                    "bDestroy": true,
                    'order': [],
                    'ajax': {
                        url : base_url+'Stockcontroller/ris_list_ajax/',
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
                        searchPlaceholder: 'Search RIS No or Status',
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
                    }
                });

                $(document).on('click', '#historyBtn', function() {
                    var id = $(this).val();
                    var base_url = "<?php echo base_url();?>";
                    $.ajax({
                        url: base_url + "Stockcontroller/ris_list_ajax_one/" + id,
                        method: 'POST',
                        dataType: 'JSON',
                        success: function(data) {
                            $('#risModal').modal('show');
                            if (data != 0) {
                                // transaction details data
                                $('#risNo').html(data[0].ris_no);
                                $('#requestedBy').html(data[0].requested_by);
                                $('#requestedBy2').html(data[0].first_name);
                                $('#risNo1').html(data[0].ris_no);
                                $('#date_requested').html(data[0].timestamp);
                                
                                $ris_no = data[0].ris_no;
                                // RIS details table
                                $('#risTable').DataTable({
                                    'pageLength': 0,
                                    'serverSide': true,
                                    'processing': true,
                                    'ordering': false,
                                    "bDestroy": true,
                                    'paging' : false,
                                    'searching' : false,
                                    'info' : false,
                                    'order': [],
                                    'ajax': {
                                        url : base_url+'Stockcontroller/getrishistory/' + $ris_no,
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
                                        searchPlaceholder: 'Search RIS No or Status',
                                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
                                    }
                                });
                                
                            } else {
                                console.log("No record exists", "Error");
                            }
                        }
                    });
                });
            } );

            function printDiv(divName) {
        // let text = "Item will be removed from the inventory once the BOQ was printed\nClick OK to confirm?";
        let text = "Click OK to confirm print?";
        if (confirm(text) == true) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            document.title='RIS'; 

            var css = `@page 
                        .treeClass{ white-space: nowrap;}  
                        table, th, td {
                        border: 1px solid black;
                        border-collapse: collapse;
                        margin-bottom: 1rem;
                        }`,
            // var css = '@media print {  * { margin-left: 100 !important; padding: 0 !important; }  #controls, .footer, .footerarea{ display: none; }  html, body { height:100%; overflow: hidden; background: #FFF; font-size: 9.5pt; } .template { width: auto; left:0; top:0; } img { width:80%; } li { margin: 0 0 10px 20px !important;}}',
            // var css = '@page { font-size: 8px; margin: 0px; } input {border:0;outline:0;} input:focus {outline:none!important;} .item{ width: 40px !important; white-space: nowrap;} .description{ width: 500px !important; white-space: nowrap;} .specs{ width: 500px !important; white-space: nowrap;} .qty{ width: 50px !important; white-space: nowrap;}',
               head = document.head || document.getElementsByTagName('head')[0],
                style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet){
            style.styleSheet.cssText = css;
            } else {
            style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);
            window.print();

            document.body.innerHTML = originalContents;
            location.reload();
        }

    }
        </script>