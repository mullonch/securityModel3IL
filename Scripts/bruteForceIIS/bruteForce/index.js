"use strict";

const request = require("request");
const {passwords} = require("./dictionnaire.json");

const username = "";
const password = "";

async function sendREquest(url, username, password) {
    await request.get("url", {
        auth: {
            user: username,
            pass: password,
            sendImmediately: false
        }
    });
}
