<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"
      defer
    ></script>
    <script src="js/validation.js" defer></script>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css"
    />

    <style>
        /* Reset standaard marges en paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
        overflow: hidden; /* Schakel scrollen uit */
        height: 100%; /* Vul het volledige scherm */
        }


        
        body {
        display: flex; 
        align-items: flex-start; 
        justify-content: center;
        height: 100vh; 
        font-family: Arial, sans-serif; 
        background-color: #f0f0f0; 
        padding-top: 20px; 
        }

        
        form {
            width: 340px; 
            padding: 20px; 
            background-color: #fff; 
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            text-align: center; 
        }

        input, button {
            width: 100%;
            margin: 10px 0;
            padding: 10px; 
            font-size: 16px; 
        }

        button {
            background-color: #007bff; 
            color: #fff; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; 
        }
    </style>
    <title>Signup</title>
  </head>
  <body>
    <?php
    require 'navbar.php';
    ?>

<form action="process-signup.php" method="post" novalidate id="signup">
    <h1>Signup</h1>
    
      <div>
        <input type="text" id="name" name="name" placeholder="Enter your name" required />
      </div>

      <div>
        <input type="email" id="email" name="email" placeholder="Enter your email" required />
      </div>

      <div>
        <input
          type="password"
          id="password"
          name="password"
          autocomplete="new-password"
          placeholder="Enter your password"
          required
        />
      </div>

      <div>
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
          autocomplete="new-password"
          placeholder="Repeat your password"
          required
        />
      </div>

      <button>Sign up</button>
    </form>
      </body>
</html>
