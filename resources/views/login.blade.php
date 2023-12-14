<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            display: flex;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .container {
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .card {
            width: 350px;
            background-color: rgb(255, 255, 255);
            overflow: hidden;
            border: 2px solid;
            border-radius: 10px;
            transition: transform 1s ease-in-out;
        }

        .card:hover {
            transition: transform 1s ease-in-out;
            transform: scale(1.2);
        }

        form {
            display: flex;
            flex-direction: column;
            padding: 30px;
            gap: 10px;
        }

        input {
            padding: 15px;
            border: none;
        }

        input:focus {
            outline: none;
            border-color: #3498db;
        }

        h1,
        h5,
        .button {
            text-align: center;
            text-decoration: none;
            font-weight: 700;
        }

        .forget {
            float: right;
        }

        .check {
            margin-top: 1px;
            float: left;
        }

        p,
        a {
            font-size: 12px;
            text-decoration: none;
        }

        .button {
            background-color: rgb(53, 53, 53);
            padding: 10px;
            color: white;
        }

        .button:hover {
            background-color: rgb(0, 0, 0);
            padding: 10px;
            color: white;
        }

        @media (max-width: 450px) {
            .card {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <form action="{{url('admin-login')}}" method="POST">
                @csrf
                <h1>Login Page</h1>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button class="submit" href="#">Login</button>
                <p><input class="check" type="checkbox">Remember me<a class="forget" href="#">Forgot account?</a>
                </p>
                <h5>create account?<a href="#"> Create</a></h5>
            </form>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
