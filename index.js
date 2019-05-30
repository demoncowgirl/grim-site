var express = require('express');
var mysql = require('mysql');
var app = express();

var port = process.env.PORT || 8000;
app.use(express.static(__dirname + '/app'));

app.listen(port, function() {
console.log('I am listening on port ' + port);
});
