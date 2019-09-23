import $ from 'jquery';

import {Login} from "./Login";
import {Users} from "./Users";
import {AddTopCat} from "./AddTopCat";
import {AddSubCat} from "./AddSubCat";
import {AddProduct} from "./AddProduct";

import '../scss/Home.scss';

$(document).ready(function () {
   new Login();
   new Users();
   new AddTopCat();
   new AddSubCat();
   new AddProduct();
});