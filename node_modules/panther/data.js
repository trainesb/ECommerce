function makename() {
  var text = "";
  var possible = "abcdefghijklmnopqrstuvwxyz";
  for (var i=0; i < 5; i++) {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }
  return text;
}
function makeage() {
  var text = "";
  var possible = "123456789";
  for (var i=0; i < 2; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  return text;
}

//Some sample JSON objects
var obj1 = {
  id: '1',
  name: 'matt',
  age: '17'
};
var obj2 = {
  id: '2',
  name: 'oscar',
  age: '47'
};
var obj3 = {
  id: '3',
  name: 'sam',
  age: '32'
};
var obj4 = {
  id: '4',
  name: 'john',
  age: '22'
};
var obj5 = {
  id: '5',
  name: 'joan',
  age: '43'
};
var arrJsonObj = [];
arrJsonObj.push(obj1, obj2, obj3, obj4, obj5);

//Use the following loop to generate many objects
//The tests will fail if you use this
/*
for (var i = 0; i < 1000; i++) {
  var cObj = {};
  cObj.name = makename();
  cObj.age = makeage();
  cObj.id = i.toString();
  //console.log(cObj);
  arrJsonObj.push(cObj);
}
*/

//An array of JSON objects is exported
module.exports = arrJsonObj;