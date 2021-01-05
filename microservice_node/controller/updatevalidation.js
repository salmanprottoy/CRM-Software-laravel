const express 	= require('express');
const userModel = require.main.require('./models/userModel');
const router 	= express.Router();
const pending =   require.main.require('./models/validationschema');
const adjacent =   require.main.require('./models/nodeschema');
const dburl			='mongodb+srv://validator:validator@cluster0.jhjsx.mongodb.net/validator?retryWrites=true&w=majority';
const mongoose		=require('mongoose');
mongoose.connect(dburl,{useNewUrlParser: true, useUnifiedTopology:true})
	.then((result)=> console.log('connected'))
	.catch((err)=> console.log(err));
router.post('/store', (req, res)=>{
	
	if(req.cookies['uname'] == null){
		res.redirect('/login');
	}
	adjacent.find()
	.where('parent').equals('100')
	.then((result)=> {
		const pend= new pending({
		id:req.body.id,
		name:req.body.name,
		email:req.body.email,
		phone:req.body.phone,
		status:req.body.status,
		gender:req.body.gender,
		address:req.body.address,
		vote:0,
		previd:'100',
		newid:result[0].child
	});
	pend.save()
	.then((result)=> {res.send(result)})
	.catch((err)=>{console.log(err);});

	})
	.catch((err)=>{console.log(err);});
	
});
module.exports = router;