import $ from 'jquery';

import {Login} from "./Login";
import {Product} from "./Product";
import {Categories} from "./Categories";
import {Staff} from "./Staff";
import {Home} from "./Home";

import '../scss/Home.scss';

$(document).ready(function () {
   new Staff();
   new Login();
   new Product();
   new Categories();
   new Home();
});
