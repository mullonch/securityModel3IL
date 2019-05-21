"use strict";

const express = require("express");
const ejs = require("ejs");
const bodyParser = require('body-parser')

const app = express();

const { exec } = require('child_process');

app.use( bodyParser.json() );
app.use((req, res, next) => {
  res.header("Access-Control-Allow-Origin", "*");
  next();
});
app.use(bodyParser.urlencoded({
  extended: true
})); 

app.post('/auth', (req, res) => {
  const username = req.body.username;
  const password = req.body.password;

  exec(`auth.exe "${username}" "${password}"`, (err, stdout, stderr) => {
    if (stdout == "OK") {
      ejs.renderFile(__dirname + "/pages/auth.ejs", {}, {}, (err, str) => res.send(str));
    } else {
      ejs.renderFile(__dirname + "/pages/bad-auth.ejs", {}, {}, (err, str) => res.send(str));
    }
  });
});

app.get('/', (req, res) => {
  ejs.renderFile(__dirname + "/pages/index.ejs", {}, {}, (err, str) => res.send(str));
});

app.listen("8080");