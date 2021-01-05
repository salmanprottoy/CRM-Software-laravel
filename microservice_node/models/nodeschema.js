const mongoose		=require('mongoose');
const Schema		=mongoose.Schema;
const data = new Schema({
	parent:{
		type:String
	},
	child:{
		type:String
	}
});
const adjacent = mongoose.model('Adjacent', data);
module.exports = adjacent; 