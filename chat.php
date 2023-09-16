<?php
setcookie("uname", $_POST['name'], time() + 60 * 60);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>
    <script>
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i].trim();
                if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
            }
            return "";
        }
        function send(){
            var sendXHR = new XMLHttpRequest();
            sendXHR.onreadystatechange = function() {
                document.getElementById("chat").value = "";
            }
            sendXHR.open('get' , "./upload.php?data=" + document.getElementById("chat").value + "&name=" + getCookie("uname"));
            sendXHR.send();
        }
        window.onload = function() {
            var a;
            var mlist = document.getElementById("message");

            function query() {
                var xhr = new XMLHttpRequest()
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        a = JSON.parse(this.responseText)
                        var data = "";
                        for (var i = 0; i < a.length; i++) {
                            var tagtype;
                            if (a[i][1] == getCookie("uname")){
                                tagtype = 'self';
                            }
                            else{
                                tagtype = "others"
                            }
                            data += '<div class="' + tagtype + '  message"><div class="card-body">' + a[i][2] + '</div><span class="card-link">&nbsp;&nbsp;' + a[i][1] + '</span></div><br>'
                        }
                        mlist.innerHTML = data;
                    }
                }
                xhr.open('get', "./requery.php", true)
                xhr.send();
                setTimeout(query, 1000);
            }
            query();
        }
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        #main {
            width: 100vw;
            height: 100vh;
            background-color: #333;
        }

        #app {
            width: 50vw;
            height: 70vh;
            position: absolute;
            top: 15vh;
            left: 25vw;
            border-radius: 5px;
            border: 2px solid black;
            overflow-y: scroll;
        }
        .message{
            width: 90%;
            margin-left: 2%;
            margin-top: 5px;
            border: 1px solid #000;
            padding: 0;
            border-radius: 5px;
            box-shadow: #000 3px 3px 3px;
        }
        .self{
            background-color: #6666FF;
            color: #fff;
        }
        .others{
            background-color: #FFFF66;
            color: #000;
        }
        #inp{
            width: 90%;
            left: 1%;
            border-radius: 10px;
            height: 10%;
            border: #000 1px solid;
            bottom: 0;
            position: fixed;
            left: 2px;
        }
        #chat{
            width: 85%;
            height: 90%;
            background-color: #333;
            border: #000 1px solid;
            border-radius: 5px;
            top: 5%;
            left: 1%;
            position: absolute;
        }
        #send{
            position: absolute;
            right: 1%;
            width: 10%;
            height: 90%;
            border: #000 1px solid;
            border-radius: 10px;
            top: 5%;
        }
    </style>
</head>

<body>
    <div id="main">
        <div id="app">
            <ul id="message">
            </ul>
            <div id="inp">
                <input type="text" name="data" id="chat">
                <button id="send" onclick="send()">发送</button>
            </div>
        </div>
    </div>
</body>

</html>