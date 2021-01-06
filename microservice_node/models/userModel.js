const db = require('./db');

module.exports ={

	validate: function(user, callback){
		var sql = "select * from validator where username='"+user.username+"' and password='"+user.password+"'";
		db.getResults(sql, function(results){
			console.log(results.length);
			if(results.length > 0){
				callback(true,results);
			}else{
				callback(false,results);
			}
		});
	},
	getById: function(id,callback){
		var sql = "select * from user where id='"+id+"'";
		db.getResults(sql,function(results){
			callback(results);
		})
	},
	getAll: function(callback){
		var sql = "select * from user";
		db.getResults(sql, function(results){
			callback(results);
		});

	},
	insert: function(user, callback){
		var sql = "insert into user VALUES ('', '"+user.username+"' , '"+user.password+"' , '"+user.type+"')";
		
		//console.log(sql);

		db.execute(sql, function(status){
			callback(status);
		});
	},
	update: function(user,callback){
		var sql = "update user set username='"+user.username+"' , password='"+user.password+"' , type='"+user.type+"' where id = '"+user.id+"' ;";
		db.execute(sql,function(status){
			callback(status);
		})
	},
	delete: function(id,callback){
		var sql = "delete from user where id = '"+id+"';";
		db.execute(sql,function(status){
			callback(status);
		})
	}
}