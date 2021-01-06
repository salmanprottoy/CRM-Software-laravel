const express = require('express');
const userModel = require.main.require('./models/userModel');
const router = express.Router();
var fs = require('fs')

router.get('/', (req, res) => {

	if (req.cookies['uname'] != null) {
		res.render('home/index');
	} else {
		res.redirect('/login');
	}
})

router.post('/pending_incoming', (req, res) => {
	console.log('Node incoming');
	fs.readFile('./assets/json/pending_transaction.json', 'utf-8', function (err, data) {
		if (err) throw err

		var arrayOfObjects = JSON.parse(data);
		//console.log(arrayOfObjects.length);
		var auto_id = arrayOfObjects.length;
		arrayOfObjects.push({
			id: auto_id,
			pid: req.body.id,
			name: req.body.name,
			mobile: req.body.phone,
			gender: req.body.gender,
			email: req.body.email,
			address: req.body.address,
			image: req.body.image,
			create_time: req.body.create_time,
			created_by: req.body.created_by,
			vote: req.body.vote,
			prev_voter_id: ''


		})

		//console.log(arrayOfObjects)

		fs.writeFile('./assets/json/pending_transaction.json', JSON.stringify(arrayOfObjects), 'utf-8', function (err) {
			if (err) throw err
			console.log('Done!')
		})
	})

	res.json({ flag: true });
})

router.get('/userlist', (req, res) => {

	// userModel.getAll(function (results) {
	// 	res.render('home/userlist', { userlist: results });
	// });

	fs.readFile('./assets/json/pending_transaction.json', 'utf-8', function (err, data) {
		if (err) throw err

		var arrayOfObjects = JSON.parse(data);
		//console.log(arrayOfObjects[0].vote);
		//res.cookie('vote', arrayOfObjects.vote);
		res.render('home/userlist', { userlist: arrayOfObjects });
	})

});

module.exports = router;