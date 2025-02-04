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
    <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th>RIS No.</th>
                <th>Time Stamp</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($getris as $cl) : ?>
                <tr class="table-active">
                    <td><?php echo $cl['ris_no']; ?></td>
                    <td><?php echo $cl['timestamp']; ?></td>
                    <td><b><?php echo $cl['status']; ?></b></td>
                    <td>
                    <a class='btn btn-info' href='' data-toggle='modal' data-target='#historyModal-<?php echo $cl['ris_no']; ?>' value='<?php echo $cl['ris_no']; ?>' title='History'><i class='fas fa-list'></i></a>
                    </td>
                </tr>   
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<!-- MODAL FOR HISTORY -->
<?php foreach($getris as $plu) : ?>
            <div id="historyModal-<?php echo $plu['ris_no'];?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    
                    <div id="print-<?php echo $plu['ris_no'];?>" >

                        <!-- Modal Header -->
                        <div class="modal-header" style="justify-content:center">
                            <!-- <h4 class="modal-title">RIS No.</h4>
                            <h5><?php echo $plu['ris_no'];?></h5> -->
                                
                                <table>
                                    <tr><th colspan=4 style="text-align:center; padding-bottom: 30px;">REQUISITION AND ISSUE SLIP</th></tr>
                                    
                                    <tr>
                                        <b>
                                        <th>Entity Name: </th>
                                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp DENR-NCR &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
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
                                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo $plu['requested_by'];?></td>
                                        <th>RIS No.: </th>
                                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $plu['ris_no'];?></td>
                                    </tr>

                                </table>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" >  
                        
                            <div class="modal-body" style="align-self:center;">  

                                <table id="risTable-<?php echo $plu['ris_no'];?>" class="table table-striped table-bordered table-sm align">
                                
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

                                    <?php foreach($getrishistory as $ht) : ?>
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
                                    <?php endforeach; ?>

                                </table>

                                <p><b>Purpose: For official use of DENR-EMB-NCR</b></p>

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
                                        <td></td>
                                        <td>CHARISMA D. CRUZ</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr style="text-align:center">
                                        <td style="text-align:left">Designation:</td>
                                        <td></td>
                                        <td>Head, GENERAL SERVICES SECTION</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr style="text-align:center">
                                        <td style="text-align:left">Date:</td>
                                        <td></td>
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
                        <a href=""  onclick="printContent('print-<?php echo $plu['ris_no'];?>')"  class='btn btn-success'>Export</a>
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                    </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- END MODAL FOR HISTORY -->

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


            // EXPORT TO PRINT

            function printContent(el){
                var restorepage = document.body.innerHTML;
                var printcontent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
            }
            </script>
            <script type="text/javascript">
                (function(document) {
                'use strict';

                var LightTableFilter = (function(Arr) {

                    var _input;

                    function _onInputEvent(e) {
                        _input = e.target;
                        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                        Arr.forEach.call(tables, function(table) {
                            Arr.forEach.call(table.tBodies, function(tbody) {
                                Arr.forEach.call(tbody.rows, _filter);
                            });
                        });
                    }

                    function _filter(row) {
                        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
                        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
                    }

                    return {
                        init: function() {
                            var inputs = document.getElementsByClassName('light-table-filter');
                            Arr.forEach.call(inputs, function(input) {
                                input.oninput = _onInputEvent;
                            });
                        }
                    };
                })(Array.prototype);

                document.addEventListener('readystatechange', function() {
                    if (document.readyState === 'complete') {
                        LightTableFilter.init();
                    }
                });

            })(document);
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
            <script>
            var app = angular.module('myApp', []);
            app.controller('myCtrl', function($scope) {
                $scope.name = " ";
            });
            app.filter('capitalize', function() {
                return function(input) {
                return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
                }
            });
        </script>