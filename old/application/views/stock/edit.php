<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<div class='errormsg' style='color:red'>
        <?php echo validation_errors(); ?>
</div>

    <form action="<?= base_url('stock/edit/'); ?>/<?php echo $stockListOne['stock_id']; ?>" method="post" accept-charset="utf-8">
        <div class="form-group" style="padding: 2rem" >
            <div class="form-group-create-sm" style="padding: 1rem; border:2px black solid;">
                <h3>Stock Update</h3>
            
                <div class="row">
                    
                    <div class="col-sm-4" >
                        <p><b>Product Code: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sku" value="<?php echo $stockListOne['sku']; ?>" readonly>
                    </div>

                    <div class="col-sm-4" >
                        <p><b>Name of Product: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="product" value="<?php echo $stockListOne['product']; ?>">
                    </div>

                    <div class="col-sm-4" >
                        <p><b>Description: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <textarea name="description" rows="4" cols="50" class="form-control"><?php echo $stockListOne['description']; ?></textarea>
                    </div>
                    
                    <!-- <div class="col-sm-4" >
                        <p><b>Rate: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="rate" value="<?php echo $stockListOne['rate']; ?>">
                    </div> -->
                    
                    <div class="col-sm-4" >
                        <p><b>Unit: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="unit" value="<?php echo $stockListOne['unit']; ?>">
                    </div>

                    <div class="col-sm-4" >
                        <p><b>Amount: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="amount" value="<?php echo $stockListOne['amount']; ?>">
                    </div>

                    <div class="col-sm-4" >
                        <p><b>Threshold: </b></p> 
                    </div> 
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="threshold" value="<?php echo $stockListOne['threshold']; ?>">
                    </div>

                </div>
                <div class="center-button" style="margin-top:3rem;">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Press OK to confirm Update Stock?')">Update</button>
                </div>
            </div>
        </div>
    </form> 
</div>

