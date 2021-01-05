const express = require('express');
const userModel	= require.main.require('./models/userModel');
const clientsModel	= require.main.require('./models/clientsModel');
const router = express.Router();
const pending =   require.main.require('./models/validationschema');
const adjacent =   require.main.require('./models/nodeschema');
const dburl			='mongodb+srv://validator:validator@cluster0.jhjsx.mongodb.net/validator?retryWrites=true&w=majority';
const mongoose		=require('mongoose');
mongoose.connect(dburl,{useNewUrlParser: true, useUnifiedTopology:true})
	.then((result)=> console.log('connected'))
	.catch((err)=> console.log(err));
router.get('/create', (req, res)=>{
	res.render('user/create'); 
})

router.post('/create', (req, res)=>{

	var user = {
		username: 	req.body.username,
		password: 	req.body.password,
		type	: 	req.body.type
	};

	userModel.insert(user, function(status){
		if(status){
			res.redirect('/home/userlist');
		}else{
			res.redirect('user/create');
		}
	});
})
router.get('/upgrade/:id/:table',(req,res)=>{
	var id=req.params.id;
	var tab=req.params.table;
	userModel.updatebyid(tab,id,function(status){
		if(status)
		{
			res.redirect('/home/:table');
		}
	});
})

router.get('/edit/:id', (req, res)=>{

	if(req.cookies['uname'] == null){
			res.redirect('/login');
		}
	// var user ={
	// 	id: req.params.id,
	// 	username: req.body.username,
	// 	password: req.body.password,
	// 	type: req.body.type
	// };
	// userModel.update(user,function(status){
	// 	if(status)
	// 	{
			
	// 		res.redirect('/home/userlist');
	// 	}
	// 	else
	// 	{
	// 		res.render('user/edit', user);
	// 	}
	// })
	pending.find()
	.where('id').equals(req.params.id)
	.then((resu)=>{

		adjacent.find()
		.where('child').equals(req.session.idd)
		.then((results)=>{

			if(results[0].parent==resu[0].previd)
			{
				adjacent.find()
				.where('parent').equals(req.session.idd)
				.then((final)=>{
					pending.update({id:req.params.id},{vote: (resu[0].vote)+1, previd:req.session.idd, newid:final[0].child},function (err, docs) { 
				    if (err){ 
				        console.log(err) 
				    } 
				    else{ 
				        //res.redirect('/home/userlist');
				        res.redirect('/user/check/'+final[0].child);
				    } 
				});
				})
				.catch((err)=>{console.log("noo");});
			}
			else console.log('no');

		})
		.catch((err)=>{console.log("noo");});

	})

})
router.get('/check/:id',(req,res)=>{

		if(req.cookies['uname'] == null){
				res.redirect('/login');
			}
		if(req.params.id=='000')
		{
			pending.find()
			.where('newid').equals(req.params.id)
			.then((results)=>{
				if(results[0].vote > 0)
				{

					var user ={
						id: results[0].id,
						name: results[0].name,
						email:results[0].email,
						gender:results[0].gender,
						phone:results[0].phone,
						status:results[0].status,
						address:results[0].address
					};
					clientsModel.update(user,'leads',function(status){
						if(status)
						{
							console.log(status);
							// res.redirect('/home/userlist');
						}
						else
						{
							console.log("NO");
						}
					})
				}

				pending.deleteOne({newid:'000'},function (err, docs) { 
				    if (err){ 
				        console.log(err) 
				    } 
				    else{ 
				        //res.redirect('/home/userlist');
				        console.log("done");
				    } 
				});


			})
		}
		res.redirect('/home/userlist');



})
router.get('/delete/:id', (req, res)=>{
	if(req.cookies['uname'] == null){
		res.redirect('/login');
	}
	pending.find()
	.where('id').equals(req.params.id)
	.then((resu)=>{

		adjacent.find()
		.where('child').equals(req.session.idd)
		.then((results)=>{

			if(results[0].parent==resu[0].previd)
			{
				adjacent.find()
				.where('parent').equals(req.session.idd)
				.then((final)=>{
					pending.update({id:req.params.id},{vote: (resu[0].vote)-1, previd:req.session.idd, newid:final[0].child},function (err, docs) { 
				    if (err){ 
				        console.log(err) 
				    } 
				    else{ 
				        res.redirect('/home/userlist');
				    } 
				});
				})
				.catch((err)=>{console.log("noo");});
			}
			else console.log('no');

		})
		.catch((err)=>{console.log("noo");});

	})
	
})

module.exports = router;


//validation -> express-validator (https://www.npmjs.com/package/express-validator)
//file upload -> express-fileupload (https://www.npmjs.com/package/express-fileupload)
