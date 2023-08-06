<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunnspot Login</title>
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header> 
    <div class="flex-box">
      <img src="../images/accommodation.png" alt="Accommodation">
      <h1>Sunnyspot Accomodation</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="cabin_show.html">Contact</a></li>
        <li><a href="adminlogin.php">Login</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div id="login">
     <h1>Log in</h1>
      <form action="login.php" method="post">
         <div class="form-group">
           <label for="username">User Name</label>
           <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" >
         </div>
         <div class="form-group">
           <label for="password">Password</label>
           <input type="password" name="password" id="password" class="form-control" placeholder="Password">
         </div>
         <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>  
 </main>
 <footer> 
     &copy; Copyright
  </footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>