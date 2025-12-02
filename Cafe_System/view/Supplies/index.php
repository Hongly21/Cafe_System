<?php
include('../../root/Header.php');
include('../../Config/conect.php');



?>
<h3 class="text-center" style="margin-top: 15px;">CONTROL STOCK</h3>
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Suppliers</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Purchases</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="Purchased-tab" data-bs-toggle="tab" data-bs-target="#Purchased-tab-pane" type="button" role="tab" aria-controls="Purchased-tab-pane" aria-selected="false">Purchased</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">PurchasesDailts</button>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent" style="padding: 15px 0px 10px 0px; box-sizing:border-box">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <?php include('supplytab.php') ?>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <?php include('purchasetap.php'); ?>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <?php include('purchasedetailtab.php') ?>
        </div>
        <div class="tab-pane fade" id="Purchased-tab-pane" role="tabpanel" aria-labelledby="Purchased-tab" tabindex="0">
            <?php include('purchased.php') ?>
        </div>
    </div>
</div>