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
	getById: function (id, callback) {
		var sql = "select * from admin_pending_log where pid='" + id + "'";
		db.getResults(sql, function (results) {
			if (results.length > 0) {
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
		var sql = "update user set username='" + user.username + "' , password='" + user.password + "' , type='" + user.type + "' where id = '" + user.id + "'";
		db.execute(sql, function (status) {
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