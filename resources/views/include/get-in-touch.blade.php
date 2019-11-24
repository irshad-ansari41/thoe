<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form action="" class="form form--flex form--search js-search-form form--sidebar">
    <div class="row">
        <div class="form-group">
            <label for="in-keyword" class="control-label">Full Name</label>
            <input type="text" id="in-keyword" placeholder="John Carter" class="form-control">
        </div>
        <div class="form-group">
            <label for="in-keyword" class="control-label">Mobile</label>
            <input type="text" id="in-keyword" placeholder="+97150" class="form-control">
        </div>
        <div class="form-group">
            <label for="in-keyword" class="control-label">Email</label>
            <input type="email" id="in-keyword" placeholder="name@name.com" class="form-control">
        </div>
        <div class="form-group">
            <label for="in-keyword" class="control-label">Intention</label>
            <select id="in-contract-type" data-placeholder="Register interest for" class="form-control">
                <option label=""></option>
                <option>Investments</option>
                <option>Real Estate Brokers</option>
                <option>Suppliers</option>
                <option>Careers</option>
            </select>
        </div>
        <div class="form__buttons">
            <button type="submit" class="button__action ui__button ui__button--3">Register Interest</button>
        </div>
    </div>
</form>