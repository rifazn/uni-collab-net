<form method="post" action="create-user.php">

    <label for="username">Your valid email ID:</label>
    <input name="username" type="text" value="<?php echo $email ?>" required /> <br/>
    <label for="pass">Password</label>
    <input name="pass" type="password" value="<?php echo $pass ?>" required /> <br/>
    <label for="confirm-pass">Please retype your password:</label>
    <input name="confirm-pass" type="password" value="" autofocus required /> <br/>
    <button type="submit">Create Yourself</button>
</form>
