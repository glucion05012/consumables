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
                    url: base_url + "Stockcontroller/stock_list_one/" + id,
                    method: 'POST',
                    dataType: 'JSON',
                    success: function(data) {
                        $('#historyModal').modal('show');
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