
<html>
<body>
    <form action ="/newWork4/index.php/?action=auth&method=login" method="post">
    User: <input type="text" name="username" value="" placeholder="Username"/>
    <br/>
    Password: <input type="password" name="password" value=""/>
    <br/>
    <input type="submit" name="submit" value="OK"/>
</form>
<form method="post" action="/newWork4/index.php/?action=auth&method=logout">
    <br/>
    <input type="submit" name="logout" value="Logout"/>
</form>
    
    
    
    
<!--     register begin hereee -->
    
    
    
    
    <form action ="/newWork4/index.php/?action=register&method=register" method="post" >
        User: <input type="text" name="username" required value="" placeholder="Your Username Please"/>
    <br/>
    Password: <input type="password" required name="password" placeholder="Your Password Please" />
    <br/>
    Email: <input type="email" required name="email" value="" placeholder="Your Valid Email Please"/>
    <br/>
    Full Name: <input type="text" required name="name" value="" placeholder="Your Full Name Please"/>
    <br/>
    <input type="submit" name="Register" value="Register"/>
        <br/>
   
</form>



<!-- add question begin here -->
  
    

    
</body>
</html>
    