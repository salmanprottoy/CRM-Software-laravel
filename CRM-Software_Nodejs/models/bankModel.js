const db = require('./db');

module.exports ={

	getAll: function(callback){
        var sql = "select * from bankinfo";
        console.log(sql);
		db.getResults(sql,null, function(results){
			callback(results);
		});

	}
}