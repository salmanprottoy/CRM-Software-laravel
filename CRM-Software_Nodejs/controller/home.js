const express = require('express');
const userModel = require.main.require('./models/userModel');

const bankModel = require.main.require('././models/bankModel');

const router = express.Router();





router.get('/getNode', (req, res) => {
	userModel.getAll(function (results) {
		console.log(results);
		res.json(results);
	});
});


router.get('/getBankInfo', (req, res) => {
	bankModel.getAll(function (results) {
		console.log(results);
		res.json(results);
	});
});


module.exports = router;