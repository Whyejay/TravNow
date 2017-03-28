<form action="signup.php">
    <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="name" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <label><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="password_repeat" required>
        <input type="checkbox" checked="checked"> Remember me
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Sign Up</button>
        </div>
    </div>
</form>
