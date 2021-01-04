//declaration
const express = require('express');
const bodyParser = require('body-parser');
const exSession = require('express-session');
const cookieParser = require('cookie-parser');

const home = require('./controller/home');

const app = express();

//config
app.set('view engine', 'ejs');

//middleware

app.use(bodyParser.urlencoded({ extended: true }));
app.use(exSession({ secret: 'my secret value', saveUninitialized: true, resave: false }));
app.use(cookieParser());


app.use('/home', home);

//route
app.get('/', (req, res) => {
	res.send('Hello from express server');
});


//server startup
app.listen(3000, (error) => {
	console.log('express server started at 3000...');
});