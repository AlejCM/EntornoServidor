var express = require('express');
var router = express.Router();

/* GET users listing. */
router.get('/', function(req, res, next) {
    var models = [
        "Seat Leon",
        "Ford Mustang",
        "Nissan Skyline",
        "Fiat 500",
        "Fiat Multipla"
    ]
    res.render('models', { title: 'Cars Models', models: models });
});

module.exports = router;
