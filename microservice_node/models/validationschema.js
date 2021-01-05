const mongoose		=require('mongoose');
const Schema		=mongoose.Schema;
const data = new Schema({

	id:{
		type:Number
	},
	name:{
		type:String
	},
	email:{
		type:String
	},
	phone:{
		type:String
	},
	status:{
		type:String
	},
	gender:{
		type:String
	},
	address:{
		type:String
	},
	vote:{
		type:Number
	},
	previd:{
		type:String
	},
	newid:{
		type:String
	}
},{timestamps:true});
const pending = mongoose.model('Pending', data);
module.exports = pending; 