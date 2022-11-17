<?php include 'includes/header.php';

// if (!isset($_SESSION['login'])) {
//     header('location:login.php');
// }

?>
<div class="login-hero">
    <h1 class="text-white">Payment</h1>
</div>
<div>
    <div class="col-sm-8 col-md-6 col-lg-4 m-auto border p-5 rounded my-5 shadow">
        <form method="post" action="create-checkout-session.php">
            <div class="form-outline mb-4">
                <h4> Subscribe to our services</h4>
                <label class="form-label mt-3" for="duration">please select a duration</label>
                <select class="form-select" id="duration" name="duration" onmouseout="getVal()">
                    <option value="1">1 month</option>
                    <option value="3">3 month</option>
                    <option value="6">6 month</option>
                </select>
            </div>

            <h4 id="total" class="mt-4">Total price: 500 EGP</h4>
            <!-- Submit button -->
            <input type="submit" name="submit" class="btn btn-primary btn-block mb-4 w-100" value="Pay">

        </form>
    </div>
</div>


<script>
    function getVal() {
        const val = document.querySelector('#duration').value;
        let total = val * 500;
        document.getElementById('total').innerHTML = 'Total price: ' + total + ' EGP' 
    }
</script>

<?php include 'includes/footer.php' ?>