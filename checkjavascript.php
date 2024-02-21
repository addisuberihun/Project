<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container {
        width: 270px;
        height: 290px;
        border: 1px solid;
        margin: 60px auto;
        border-radius: 10px;
    }

    .box {
        width: 240px;
        height: 220px;
        margin: 14px 20px;

    }

    .box input {
        border-radius: 10px;
        margin: 8px;
        padding: 10px;
    }

    .btn {
        margin-left: 170px;
        font-size: 15px;
    }
</style>

<body>
    <div class="container">
        <form action="">
            <div class="box">
                <input type="text" id="name" placeholder="enter name">
                <input type="email" id="email" placeholder="enter email">
                <input type="tel" id="phone" placeholder="enter phone">
                <input type="password" id="pass" placeholder=" enter password">
                <div class="btn">
                    <input type="submit" id="button">
                </div>
            </div>
        </form>
    </div>
    <script>
        var name = document.getElementById("name");
        var email = document.getElementById("email");
        var phone = document.getElementById("phone");
        var pass = document.getElementById("pass");
        var button = document.getElementById("button");
        name.onclick = () => {
            if (name.value == " ") {
                name.style.border = "red";
            }
            else {
                name.style.border = "green";
            }

        }

        button.onclick = () => {
            if (name.value == "") {
                var g = document.getElementById("button") = "please fill name";
            }
            if (email.value == "") {
                document.getElementById("button") = "please fill email";
            }

            if (phone.value == " ") {
                document.getElementById("button") = "please fill phone";
            }

            if (pass.value == " ") {
                document.getElementById("button") = "please fill password";
            }


        }
    </script>
</body>

</html>