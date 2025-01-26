const express = require('express')
const app = express()
const path = require('path')
const db = require('./config/mongoose-connection')
var session = require('express-session')
var cookieParser = require('cookie-parser')

app.use(express.json())
app.use(express.urlencoded({extended:true}))

app.set('view engine', 'ejs')
app.use(express.static(path.join(__dirname,'public')))
app.use('/uploads', express.static('uploads'))
app.use(cookieParser())
require('dotenv').config()
const { body, validationResult } = require('express-validator');

app.use(session({
    secret:process.env.SESSION_SECRET,
    resave: false,
    saveUninitialized: true,
    cookie: { secure: true }
  }))

const adminRoutes = require('./routes/adminRoute')
const  siteRoute = require('./routes/siteRoute')

app.use('/admin',adminRoutes)
app.use('/', siteRoute)


app.listen(3000, () =>{
    console.log('server is running on port 3000'); 
})