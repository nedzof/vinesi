<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */
use view\TemplateView;
use domain\Customer;
use validator\CustomerValidator;

isset($this->customer) ? $customer = $this->customer : $customer = new Customer();
isset($this->customerValidator) ? $customerValidator = $this->customerValidator : $customerValidator = new CustomerValidator();
?>
<div class="projects-horizontal">
    <div class="container">
        <div class="intro">
            <h2 class="text-center" style="font-weight: normal;"><strong>Edit</strong>&nbsp;Tenancy</h2>
            <form>
                <div class="form-group"><label class="text-secondary">Unit</label><input class="form-control" type="text" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email"></div>
                <div class="form-group"><label class="text-secondary">Tenant Name</label><input class="form-control" type="password" required=""></div>
                <div class="form-group"><label class="text-secondary">Adress</label><input class="form-control" type="password" required=""></div>
                <div class="form-group"><label class="text-secondary">Area (in square meter)</label><input class="form-control" type="password" required=""></div>
                <div class="form-group"><label class="text-secondary">Lease Term</label><input class="form-control" type="password" required=""></div>
                <div class="form-group"><label class="text-secondary">Lease Start</label><input class="form-control" type="password" required=""></div>
                <div class="form-group"><label class="text-secondary">Lease Expiry</label><input class="form-control" type="password" required=""></div>
                <div class="form-group"><label class="text-secondary">Rent</label><input class="form-control" type="password" required=""></div>
                <div class="form-group"><label class="text-secondary">Notes</label><input class="form-control" type="password" required=""></div><button class="btn btn-info mt-2" type="submit" style="max-height: -8px;"><i class="icon ion-ios-compose-outline"></i></button></form>
        </div>
    </div>
</div>
<div class="footer-clean">
    <footer>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Web design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Legacy</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 item social"><a href="#"><i class="fa fa-ravelry"></i></a>
                    <p class="copyright">Vinesi © 2018</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="../view/assets/js/jquery.min.js"></script>
<script src="../view/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>