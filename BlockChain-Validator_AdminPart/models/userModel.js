const db = require('./db');

module.exports = {

	validate: function (user, callback) {
		var sql = "select * from adminvalidator where username='" + user.username + "' and password='" + user.password + "'";
		db.getResults(sql, function (results) {
			console.log(results.length);
			if (results.length > 0) {
				callback(true);
			} else {
				callback(false);
			}
		});
	},
	getMaxID: function (id, callback) {
		var sql = "SELECT MAX(id) AS id FROM adminvalidator";
		db.getResults(sql, function (results) {
			if (results.length > 0) {
				console.log(results);
				callback(results[0]);
			}
		});
	},
	getAll: function (callback) {
		var sql = "select * from user";
		db.getResults(sql, function (results) {
			callback(results);
		});

	},
	insert: function (user, callback) {
		var sql = "insert into user VALUES ('', '" + user.username + "' , '" + user.password + "' , '" + user.type + "')";

		//console.log(sql);

		db.execute(sql, function (status) {
			callback(status);
		});
	},

	update: function (user, callback) {
		var sql = "update supadmin set Name='" + user.Name + "' , Mobile='" + user.Mobile + "', Email='" + user.Email + "', Gender='" + user.Gender + "' , Address='" + user.Address + "' where id = '" + user.id + "'";
		console.log(sql);
		db.execute(sql, function (status) {
			console.log(status);
			callback(status)
		});

	},
	delete: function (id, callback) {
		var sql = "DELETE FROM user WHERE id = '" + id + "'";
		console.log(sql);
		db.execute(sql, function (status) {
			callback(status);
		});
	}
}