function search(callback, searchTerm, inputArray) {
  var arrayOfMatches = [];
  for (var e in inputArray) {
    (function(i) {
      for (var y in inputArray[i]) {
        var t = inputArray[e][y].indexOf(searchTerm);
        if (t !== -1) {
          arrayOfMatches.push(inputArray[e]);
        } else {
          
        }
      }
    })(e)
  }
  if (arrayOfMatches.length > 0) {
    callback(null, arrayOfMatches);
  } else {
    callback(new Error("No item found"));
  } 
}

module.exports = {
  search: search
}