<header class="header">
<img src="Foodies2.png" alt="logo" class="logo" />

  <nav class="navbar">
    <a href="#">Menu</a>
    <a href="#">Foodies</a>
    <a href="#">Over ons</a>
    <a href="#">Contact</a>
    <a href="login.php">Login</a>
  </nav>
</header>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
  }

  body {
    min-height: 100vh;
    margin-top: 73px;
    padding-top: 73px;
  }

  .logo {
    width: 85px;
    height: auto;
  }

  h1 {
    margin-top: 20px;
  }

  .navbar {
    display: flex;
    justify-content: center;
    flex-grow: 1;
    text-align: center;
  }

  .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 100px;
    background-color: #808080;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
    height: 73px;
    border-bottom: 2px solid rgba(0, 0, 0, 0.058); /* Voeg een witte lijn onder het logo toe */
  }

  .logo {
    text-decoration: none;
  }

  .navbar a {
    position: relative;
    font-size: 18px;
    color: black;
    font-weight: 500;
    text-decoration: none;
    margin-left: 27px;
  }

  .navbar a:first-child {
    margin-left: 0;
  }

  .navbar a::before {
    content: "";
    position: absolute;
    top: 100%;
    left: 0;
    width: 0;
    height: 2px;
    background: black;
    transition: 0.3s;
  }

  .navbar a:hover::before {
    width: 100%;
  }
</style>
