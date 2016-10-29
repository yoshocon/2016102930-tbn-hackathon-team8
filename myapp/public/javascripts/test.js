var request = require("request")

var url = "http://api.tbn.org.tw/api/rows?ez=%E8%9D%B4%E8%9D%B6%E9%A1%9E&name=%E7%81%B0%E8%9D%B6&type=json"

request({
    url: url,
    json: true
}, function (error, response, body) {

    if (!error && response.statusCode === 200) {
        console.log(body) // Print the json response
    }
})
