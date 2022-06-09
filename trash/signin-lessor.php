<?php
include 'config.php';
// Define variables and initialize with empty values
$login_username = $login_password = "";
$login_username_err = $login_password_err = $login_err ="";

//tenant login variables

 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $login_username_err = "Please enter username.";
    } else{
        $login_username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $login_password_err = "Please enter your password.";
    } else{
        $login_password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($login_username_err) && empty($login_password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM lessor WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_login_username);
            
            // Set parameters
            $param_login_username = $login_username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $login_username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($login_password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["lessorid"] = $id;
                            $_SESSION["username"] = $login_username;
                            
                            // Redirect user to welcome page
                            header("location: profile.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
							
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
					
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
				
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}