const mongoose = require('mongoose')

mongoose.connect('mongodb://localhost:27017/news')
.then(() => console.log('connected to mongodb'))


module.exports = mongoose.connection;