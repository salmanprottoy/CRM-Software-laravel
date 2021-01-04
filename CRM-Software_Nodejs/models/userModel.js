const db = require('./db');

module.exports = {




	getAll: function (callback) {
		var sql = "select * from coupons";
		db.getResults(sql, null, function (results) {
			callback(results);
		});
	},

}