const Koa = require('koa');
const WebSocket = require('koa-websocket');

const app = new WebSocket(new Koa());
const config = require('./config.js');


app.listen(config.port, () => {
	console.log("server started on localhost:" + config.port);
})