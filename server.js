const express = require('express')
const app = express()

const server = require('http').createServer(app)

const io = require('socket.io')(server, {
    cors: { origin: "http://127.0.0.1:8000" }
});

const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'blogbio'
});

connection.connect(function (err) {
    if (err) {
        console.log('Error connecting to Db');
        return;
    }
    console.log('Connection established');
});

io.on("connection",function (socket) {
    console.log("Ben Katıldım");

    socket.on("test",function (data) {
        console.log('merhaba');
    });

    // MESAJ GONDER

    socket.on("disconnect",function () {
        console.log("Ben Katıldım ve Çıkış Yaptım");
    });
});

const port = 3000

server.listen(port, () => {
    console.log('Server is running. Port: '+port)
});
