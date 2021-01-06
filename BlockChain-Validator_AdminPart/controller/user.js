const express = require('express');
const userModel = require.main.require('./models/userModel');
const router = express.Router();
var fs = require('fs')



router.get('/edit/:id', (req, res) => {




	fs.readFile('./assets/json/pending_transaction.json', 'utf-8', function (err, data) {
		if (err) throw err

		let arrayOfObjects = JSON.parse(data);
		//console.log(arrayOfObjects.length);
		//console.log(arrayOfObjects.id);



		for (var i = 0; i < arrayOfObjects.length; i++) {
			if (arrayOfObjects[i]['id'] == req.params.id) {
				var user = {
					pid: arrayOfObjects[i]['pid'],
					name: arrayOfObjects[i]['name'],
					email: arrayOfObjects[i]['email'],
					mobile: arrayOfObjects[i]['mobile'],
					gender: arrayOfObjects[i]['gender'],
					address: arrayOfObjects[i]['address'],
					image: arrayOfObjects[i]['image'],
					vote: arrayOfObjects[i]['vote'],
				}
				//console.log(user);
				console.log('sssssssssss');
				console.log(arrayOfObjects[i]['id']);
			}
		}

		res.render('user/edit', user);
	})

});



router.post('/edit/:id', (req, res) => {
	fs.readFile('./assets/json/pending_transaction.json', 'utf-8', function (err, data) {
		if (err) throw err

		let arrayOfObjects = JSON.parse(data);
		//console.log(arrayOfObjects);


		var uname = req.cookies['uname'];
		console.log(uname);
		for (var i = 0; i < arrayOfObjects.length; i++) {
			if (arrayOfObjects[i]['id'] == req.params.id) {

				arrayOfObjects[i]['vote'] = parseInt(req.body.vote) + 1;
				arrayOfObjects[i]['prev_voter_id'] = uname;
				//res.cookie('vote', arrayOfObjects[i]['vote']);

				console.log(arrayOfObjects[i]['vote']);
				console.log(arrayOfObjects[i]['prev_voter_id']);

			}

		}
		console.log(arrayOfObjects);
		fs.writeFile('./assets/json/pending_transaction.json', JSON.stringify(arrayOfObjects), 'utf-8', function (err) {
			if (err) throw err
			console.log('Done!')
		})

	})

	// console.log('vote');
	// console.log(req.body.vote);

	userModel.getMaxID(req.params.id, function (result) {
		console.log(result);
		var user = result.id;
		var total_vote = parseInt(req.body.vote) + 1;
		var percentage = (total_vote / user) * 100;
		console.log('percentage')
		console.log(percentage);


		var admin_update = {
			id: req.body.id,
			Name: req.body.name,
			Mobile: req.body.mobile,
			Email: req.body.email,
			Gender: req.body.gender,
			Address: req.body.address,
			image: req.body.image
		};
		console.log('admin update');
		console.log(admin_update);
		if (percentage > 51) {
			userModel.update(admin_update, function (status) {

				if (status) {
					res.redirect('/home/userlist');
				} else {
					res.redirect('/home');
				}
			});
		}

		// console.log('user');
		// console.log(user);
	});
	// check();
	// res.redirect('/home');

	// res.redirect('/home/userlist');
})


// function check() {
// 	fs.readFile('./assets/json/pending_transaction.json', 'utf-8', function (err, data) {
// 		if (err) throw err

// 		let arrayOfObjects = JSON.parse(data);
// 		//console.log(arrayOfObjects);


// 		// var uname = req.cookies['uname'];
// 		console.log(uname);
// 		for (var i = 0; i < arrayOfObjects.length; i++) {
// 			if (arrayOfObjects[i]['id'] == req.params.id) {

// 				arrayOfObjects[i]['vote'] = parseInt(req.body.vote) + 1;
// 				arrayOfObjects[i]['prev_voter_id'] = uname;
// 				//res.cookie('vote', arrayOfObjects[i]['vote']);

// 				console.log(arrayOfObjects[i]['vote']);
// 				console.log(arrayOfObjects[i]['prev_voter_id']);

// 			}

// 		}
// 	console.log('Check');


// }

router.get('/delete/:id', (req, res) => {
	fs.readFile('./assets/json/pending_transaction.json', 'utf-8', function (err, data) {
		if (err) throw err

		let arrayOfObjects = JSON.parse(data);
		//console.log(arrayOfObjects.length);
		//console.log(arrayOfObjects.id);



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
		res.render('user/delete', user);
	})

})

router.post('/delete/:id', (req, res) => {

	fs.readFile('./assets/json/pending_transaction.json', 'utf-8', function (err, data) {
		if (err) throw err

		let arrayOfObjects = JSON.parse(data);
		//console.log(arrayOfObjects.length);


		var uname = req.cookies['uname'];

		for (var i = 0; i < arrayOfObjects.length; i++) {
			if (arrayOfObjects[i]['id'] == req.params.id) {

				//arrayOfObjects[i]['vote'] = parseInt(req.body.vote) + 1;
				arrayOfObjects[i]['prev_voter_id'] = uname;
				console.log(arrayOfObjects[i]['vote']);
				console.log(arrayOfObjects[i]['prev_voter_id']);
				break;
			}

		}
		console.log(arrayOfObjects);
		fs.writeFile('./assets/json/pending_transaction.json', JSON.stringify(arrayOfObjects), 'utf-8', function (err) {
			if (err) throw err
			console.log('Done!')
		})

	})


	res.redirect('/home/userlist');


})

module.exports = router;


//validation -> express-validator (https://www.npmjs.com/package/express-validator)
//file upload -> express-fileupload (https://www.npmjs.com/package/express-fileupload)
