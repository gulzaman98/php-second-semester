<?php
include_once 'header.php';
?>




<div class="container my-5 p-t-100">
    <div class="row">
        <div class="col-md-7">
            <div class="card shadow-sm p-4">
                <h4 class="mb-4">Shipping Details</h4>
                <form action="place_order.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="03xxxxxxxxx" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Address</label>
                        <textarea name="address" class="form-control" rows="3" placeholder="House#, Street, City" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Payment Method</label>
                        <select name="payment_method" class="form-select">
                            <option value="cod">Cash on Delivery (COD)</option>
                        </select>
                    </div>
                    <button type="submit" name="place_order" class="btn btn-dark w-100 mt-3 py-2">
                        PLACE ORDER NOW
                    </button>
                    <input type="hidden" name="total_bill" value="<?php echo $_SESSION['g_total']; ?>">
                </form>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card bg-light p-4">
                <h4 class="mb-4">Order Summary</h4>
                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal</span>
                    <strong>Rs. <?php echo number_format($_SESSION['g_total'], 2); ?></strong>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4">
                    <span class="h5">Total</span>
                    <span class="h5 text-primary">Rs. <?php echo number_format($_SESSION['g_total'], 2); ?></span>
                </div>
                <p class="text-muted small">Tax and shipping included in total.</p>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>