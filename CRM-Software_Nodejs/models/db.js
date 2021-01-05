const mysql = require('mysql');

function getConnection(callback) {

	var connection = mysql.createConnection({
		host: '127.0.0.1',
		user: 'root',
		password: '',
		database: 'crm'
	});

	connection.connect(function (err) {
		if (err) {
			console.error('error connecting: ' + err.stack);
			return;
		}
		console.log('connected as id ' + connection.threadId);
	});

	callback(connection);
}

module.exports = {
	getResults: function (sql, params, callback) {

		getConnection(function (connection) {

			if (params != null) {
				connection.query(sql, params, function (error, results) {
					callback(results);
				});

				connection.end(function (err) {
					console.log('connection closed!');
				});

			} else {

				connection.query(sql, function (error, results) {

					console.log(results);
;					callback(results);

				});

				connection.end(function (err) {
					console.log('connection closed!');
				});
			}

		});

	},
	execute: function (sql, params, callback) {

		getConnection(function (connection) {
			if (params != null) {
				connection.query(sql, params, function (error, status) {
					if (status) {
						callback(true);
					} else {
						callback(false);
					}
				});

				connection.end(function (err) {
					console.log('connection closed!');
				});

			} else {
				connection.query(sql, function (error, status) {
					if (status) {
						callback(true);
					} else {
						callback(false);
					}
				});

				connection.end(function (err) {
					console.log('connection closed!');
				});
			}
		});
	}
}