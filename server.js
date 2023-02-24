const express = require('express')
const app = express()

const server = require('http').createServer(app)

const io = require('socket.io')(server, {
    cors: { origin: "http://127.0.0.1:8000" }
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
