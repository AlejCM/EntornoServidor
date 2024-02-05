const http = require('http');
const hostname = "127.0.0.1";
const port = "8000";

const server = http.createServer(function (request, response){
    response.writeHead(200, {"Content-Type" : "text/plain"});
    response.end("Hola Mundo!");

});

server.listen(port, hostname, function(){
    console.log(`Server running at port http://${hostname}:${port}`);
})
