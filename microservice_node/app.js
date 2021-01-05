//declaration
const express 		= require('express');
const bodyParser 	= require('body-parser');
const exSession 	= require('express-session');
const cookieParser 	= require('cookie-parser');
const login			= require('./controller/login');
const home			= require('./controller/home');
const logout		= require('./controller/logout');
const user			= require('./controller/user');
const updatevalidation=require('./controller/updatevalidation');
const app 			= express();
const dburl			='mongodb+srv://validator:validator@cluster0.jhjsx.mongodb.net/validator?retryWrites=true&w=majority';
const mongoose		=require('mongoose');
//config
app.set('view engine', 'ejs');
//middleware
app.use('/abc', express.static('assets'));
app.use(bodyParser.urlencoded({extended: true}));
app.use(exSession({secret: 'my secret value', saveUninitialized: true, resave: false }));
app.use(cookieParser());
app.use('/update',updatevalidation);
app.use('/login', login);
app.use('/home', home);
app.use('/logout', logout);
app.use('/user', user);

//route
app.get('/', (req, res)=>{
	res.send('Hello from express server');	
});

//server startup
app.listen(3000, (error)=>{
	console.log('express server started at 3000...');
});