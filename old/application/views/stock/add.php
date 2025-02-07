<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<div class='errormsg' style='color:red'>
        <?php echo validation_errors(); ?>
</div>

    <form action="<?= base_url('stock/add'); ?>" method="post" accept-charset="utf-8">
        <div class="form-group" style="padding: 2rem" >
            <div class="form-group-create-sm" style="padding: 1rem; border:2px black solid;">
                <h3>Stock In</h3>
            
                <div class="row">

                    <div class="col-sm-4" >
                        <p><b>Product Code: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sku" required>
                    </div>

                    <div class="col-sm-4" >
                        <p><b>Name of Product: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="product">
                    </div>

                    <div class="col-sm-4" >
                        <p><b>Description: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <textarea name="description" rows="4" cols="50" class="form-control"></textarea>
                    </div>
                    
                    <div class="col-sm-4" >
                        <p><b>No of Stocks: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="rate">
                    </div>
                    
                    <div class="col-sm-4" >
                        <p><b>Unit: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="unit">
                    </div>

                    <div class="col-sm-4" >
                        <p><b>Amount: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="amount">
                    </div>

                    <div class="col-sm-4" >
                        <p><b>Threshold: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="threshold">
                    </div>

                </div>
                <div class="center-button" style="margin-top:3rem;">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Press OK to confirm Add Stock?')">Create</button>
                </div>
            </div>
        </div>
    </form> 
</div>

