const express = require('express')
const nodemailer = require('nodemailer')
const bodyParser = require('body-parser')
const cors = require('cors')
const app = express()
const port = 3002
require('dotenv').config()
app.use(cors())
app.use(bodyParser.json())

app.post('/send', (req, res) => {
    let transporter = nodemailer.createTransport({
        host: 'smtp.googlemail.com', // Gmail Host
        port: 465, // Port
        secure: true, // this is true as port is 465
        auth: {
            user: process.env.GMAIL_USER, //Gmail username
            pass: process.env.GMAIL_PASSWORD // Gmail password
        }
    });
    let request = ''
    for(let x in req.body){
        request += '<b>'+x+'</b>: ' + req.body[x] + '<br>'
    }

    let mailOptions = {
        from: '"Aquila Website" <aquilapartments@gmail.com>',
        to: 'aquilapartments@gmail.com,' + req.body.email,
        subject: 'New booking from website',
        html: 'This is the request:<br>' + request
    };
    
    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return console.log(error);
        }
        res.json(info)
    });
})
app.listen(port, () => console.log(`Mailsender listening on port ${port}!`))