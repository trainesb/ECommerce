//data is an array of JSON objects
var data = require('./data')
  , panther = require('./panther');

var searchTerm = 'matt';

panther.search(function(err, items) {
  if (err) {
    console.log(err);
  } else {
    console.log(items); //items is an array of matching JSON objects
  }
}, searchTerm, data);