const express = require('express');
const app = express();
const port = "3000";

app.get("/", function (request, response){
    response.send("Hola mundo");
});

app.get("/adios", function (request, response){
    response.send("Adios mundo");
});

app.listen(port, function(){
    console.log(`Server running at port ${port}`);
});