<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */

use domain\Customer;
use validator\CustomerValidator;

isset($this->customer) ? $customer = $this->customer : $customer = new Customer();
isset($this->customerValidator) ? $customerValidator = $this->customerValidator : $customerValidator = new CustomerValidator();
?>
<html>
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
</html>