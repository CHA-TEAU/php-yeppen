<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="text" name="login" class="login" placeholder="Login">
    <input type="text" name="role"  class="role" placeholder="Role">
    <input type="text" name="pass"  class="pass" placeholder="Password">
    
    <button id="btn">Click</button>

    <script>

        let btn = document.getElementById('btn');

        btn.addEventListener("click", () =>{
            let login = document.querySelector('.login').value;
            let role = document.querySelector('.role').value;
            let pass = document.querySelector('.pass').value;
            let json = JSON.stringify({
                "action":"reg",
                "payload":{
                    "login":login,
                    "role":role,
                    "pass":pass,
                }

            });

            console.log(json);

            fetch("http://localhost/apishop.php", {
                method: "POST",
                body: json,
            })

            .then(response => response.json())
            .then(data => {
                alert("Registration Successful")
            })
            .catch(error => {
                console.log(error);
            })
            
        });


    </script>
</body>
</html>