const express = require('express');
const userModel = require.main.require('./models/userModel');
const router = express.Router();
var fs = require('fs')



router.get('/edit/:id', (req, res) => {


	// userModel.getById(req.params.id, function (result) {

	// 	var user = {
	// 		name: result.Name,
	// 		email: result.Email,
	// 		mobile: result.Mobile,
	// 		gender: result.Gender,
	// 		address: result.Address,
	// 		image: result.image,
	// 		vote: result.vote

	// 	};

	// 	res.render('user/edit', user);
	// });

	fs.readFile('./assets/json/pending_transaction.json', 'utf-8', function (err, data) {
		if (err) throw err

		let arrayOfObjects = JSON.parse(data);
		console.log(arrayOfObjects.length);
		//console.log(arrayOfObjects.id);
		for (var i = 0; i < arrayOfObjects.length; i++) {
			console.log(arrayOfObjects[i]['id']);
		}


		for (var i = 0; i < arrayOfObjects.length; i++) {
			if (arrayOfObjects[i]['id'] == req.params.id) {
				var user = {
					name: arrayOfObjects[i]['name'],
					email: arrayOfObjects[i]['email'],
					mobile: arrayOfObjects[i]['mobile'],
					gender: arrayOfObjects[i]['gender'],
					address: arrayOfObjects[i]['address'],
					image: arrayOfObjects[i]['image'],
					vote: arrayOfObjects[i]['vote'],
				}
				//console.log(user);

				//console.log(arrayOfObjects[i]['id']);
			}
		}
		res.render('user/edit', user);
	})

});



router.post('/edit/:id', (req, res) => {
	fs.readFile('./assets/json/pending_transaction.json', 'utf-8', function (err, data) {
		if (err) throw err

		let arrayOfObjects = JSON.parse(data);
		console.log(arrayOfObjects.length);


		var uname = req.cookies['uname'];
		var user = {
			pid: req.params.id,
			name: req.body.name,
			mobile: req.body.mobile,
			gender: req.body.gender,
			email: req.body.email,
			address: req.body.address,
			image: req.body.image,
			create_time: req.body.create_time,
			created_by: req.body.created_by,
			vote: parseInt(req.body.vote) + 1,
			prev_voter_id: uname
		};
		// fs.writeFileSync('./assets/json/pending_transaction.json', JSON.stringify(user));
		for (var i = 0; i < arrayOfObjects.length; i++) {
			fs.writeFile('./assets/json/pending_transaction.json', JSON.stringify(user), 'utf-8', function (err) {
				if (err) throw err
				console.log('Done!')
			})
		}

	})


	res.redirect('/home');

	// res.redirect('/home/userlist');
})

router.get('/delete/:id', (req, res) => {
	userModel.getById(req.params.id, function (result) {

		var user = {
			username: result.username,
			password: result.password,
			type: result.type
		};

		res.render('user/delete', user);
	});

})

router.post('/delete/:id', (req, res) => {

	userModel.delete(req.params.id, function (status) {
		if (status) {
			res.redirect('/home/userlist');
		}
	});

})

module.exports = router;


//validation -> express-validator (https://www.npmjs.com/package/express-validator)
//file upload -> express-fileupload (https://www.npmjs.com/package/express-fileupload)
