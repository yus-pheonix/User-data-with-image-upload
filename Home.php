<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <title>Home Page</title>
</head>
<body>
    <div id="container">
        <span id="message"></span>
        <form action="" method="post" id="form1">
            <legend>User Information</legend>
            <fieldset>
            <div>
                <label for="username">User Name : </label>
                <input type="text" name="username" id="username" required/>
                <span id="usernameerror" class="error"></span>
            </div>
            <div>
                <label for="lastname">Last Name : </label>
                <input type="text" name="lastname" id="lastname" required/>
                <span id="lastnameerror" class="error"></span>
            </div>
            <div>
                <label for="mobile">Mobile : </label>
                <input type="text" name="mobile" id="mobile" required/>
                <span id="mobileerror" class="error"></span>
            </div>
            <div>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required/>
                <span id="emailerror" class="error"></span>
            </div>
            <div>
                <label for="image">Image : </label>
                <input type="file" name="image" id="image" required/>
                <span id="imageerror" class="error"></span>
            </div>
            <div>
                <input type="submit" value="Send">
                <button id="display">Show User Data</button>
            </div>
        </fieldset>
        </form>
        
    </div>
 
</body>
</html>