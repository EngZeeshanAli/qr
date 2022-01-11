const express = require('express');

const app = express();

const server = require('http').createServer(app);

const io = require('socket.io')(server, {
    cors: {origin: "*"}
});

io.on('connection', (socket) => {
    console.log("connection is stable ");

    socket.on('sendRequest', (message) => {
        console.log(message);
        socket.broadcast.emit("login", message);
    });

    socket.on('disconnect', (socket) => {
        console.log("disconnected");
    });
});

server.listen(3000, () => {
    console.log("server is running");
});
