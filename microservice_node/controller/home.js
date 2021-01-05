const express 	= require('express');
const userModel = require.main.require('./models/userModel');
const router 	= express.Router();
const pending =   require.main.require('./models/validationschema');
const dburl			='mongodb+srv://validator:validator@cluster0.jhjsx.mongodb.net/validator?retryWrites=true&w=majority';
const mongoose		=require('mongoose');
mongoose.connect(dburl,{useNewUrlParser: true, useUnifiedTopology:true})
	.then((result)=> console.log('connected'))
	.catch((err)=> console.log(err));
router.get('/', (req, res)=>{
	
	if(req.cookies['uname'] != null){
		res.render('home/index');
	}else{
		res.redirect('/login');
	}
})
router.get('/profile',(req,res)=>{
	if(req.cookies['uname'] != null){
		res.render('home/profile');
	}else{
		res.redirect('/login');
	}
})
router.get('/userlist', (req, res)=>{

	// userModel.getAll(function(results){
	// 	res.render('home/userlist', {userlist: results});
	// });
	console.log("id");
	console.log(req.session.idd);
	pending.find()
	.where('newid').equals(req.session.idd)
	.then((result)=> {res.render('home/userlist', {userlist: result});})
	.catch((err)=>{console.log(err);});
});

module.exports = router;