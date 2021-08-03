
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   
<title> Login Form</title>
    
    <link rel="stylesheet" type="text/css" href="style3.css">
    </head>
    <body>
    <div class="login-box">
        <img src="avatar.png" class="avatar">
        <div class="form">
           
   
        <form class="login form" action="server3.php" method="post" >
            
        <p>UserID</p>
        <input type="text" name="user_id" placeholder="Enter User ID" user_id="user_id" required>
              <p>Username</p>
        <input type="text" name="username" placeholder="Enter Username" username="username" required>
            <p>Phone Number</p>
        <input type="text" name="user_phone" placeholder="Enter Phone Number" user_phone="user_phone" pattern="[789][0-9]{9}" required>
            <p>Password</p>
        <input type="password" name="password_1" placeholder="Enter Password" id="password_1" required>
             <p>Confirm Password</p>
        <input type="password" name="password_2" placeholder="Confirm Password" id="password_2" required>
            <p>Type of User</p>
           
            <select name="user_type">
               
                <option value="Authorized Personnel">Authorized Personnel</option>
                  <option value="Civilian">Civilian</option>
               
            </select>
       
    <input type="submit" name="Signup" value="Signup" id="submit">
        <p> Already Registered Personnel?? <a href=apsignin.html ><b>Signin</b></a> </p>
        <p> Already Registered User?? <a href=cvsignin.html><b>Signin</b></a> </p>
        </form>
        </div>
        </div>
           
 
</body>
       
</html>

