var test = function (text1) {
  var text = text1 + ", здравствуйте!";
  return text;
};
var sold = function(x,y){
return `Количество продаж прошлой недели - ${x}, на этой неделе - ${y}, итого - ${x+y}`;
};
var version = "1.21.4";
console.log(module);
exports.test = test;
exports.sold = sold;
exports.version = version;
