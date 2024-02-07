var express = require('express');
var router = express.Router();

const { MongoClient } = require("mongodb");
const uri = "mongodb://127.0.0.1:27017";
const client = new MongoClient(uri);
const database = client.db("coches");
const marcasCollection = database.collection("marcas");

router.get("/", async function(req, res, next){
    /* var arrayMarcas = [
        {
            marca: "Seat",
            pais: "España"
        },
        {
            marca: "Mercedes",
            pais: "Alemania"
        },
        {
            marca: "Toyota",
            pais: "Japon"
        }
    ]; */
    var marcas = getAllMarcas();

    res.render("marcas", { title: "Brands", marcas: await marcas });
});

async function getAllMarcas(){
    try{
        query = {};
        var marcas = await marcasCollection.find(query).toArray();
        return marcas;
    } finally{
        //Esto es una guarrada deberiamos hacer un catch
    }
}

module.exports = router;