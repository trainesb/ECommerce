import $ from 'jquery';

import {Login} from "./Login";
import {TopCat} from "./TopCat";
import {SubCat} from "./SubCat";
import {Product} from "./Product";
import {Categories} from "./Categories";
import {Staff} from "./Staff";
import {Scraper} from "./Scraper";

import '../scss/Home.scss';

$(document).ready(function () {
   new Staff();
   new Login();
   new TopCat();
   new SubCat();
   new Product();
   new Scraper();
   new Categories();
});
