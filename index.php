<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>username</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        #main{
            width: 100vw;
            height: 100vh;
            background-color: #333;
        }
        #dialog{
            width: 30vw;
            height: 30vh;
            background-color: #212121;
            position: absolute;
            top: 35vh;
            left: 35vw;
            border-radius: 5px;
            box-shadow: 3px 3px 3px black;
        }
        input{
            font-size: 20px;
        }
        .ele{
            height: 7vh;
            width: 80%;
            background-color: #666666;
            border-radius: 5px;
            border: 1px #000 solid;
            margin-left: 10%;
            margin-top: 10%;
        }
    </style>
</head>
<body>
    <div id="main">
        <div id="dialog">
            <form action="./chat.php" method="post">
                <input type="text" name="name" id="u" class="ele" placeholder="昵称"><br>
                <button type="submit" id="go" class="ele">进入</button>
            </form>
        </div>
    </div>
</body>
</html>