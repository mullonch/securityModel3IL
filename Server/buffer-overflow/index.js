"use strict";

const express = require("express");
const ejs = require("ejs");
const app = express();

const { exec } = require('child_process');

app.use((req, res, next) => {
  res.header("Access-Control-Allow-Origin", "*");
  next();
});

app.get('/auth', (req, res) => {
  exec('dir', (err, stdout, stderr) => {
    if (stdout == 0) {
      ejs.renderFile(__dirname + "/pages/auth.ejs", {}, {}, (err, str) => res.send(str));
    } else {
  
    }
  });
});

app.get('/', (req, res) => {
  ejs.renderFile(__dirname + "/pages/index.ejs", {}, {}, (err, str) => res.send(str));
});

app.listen("8080");