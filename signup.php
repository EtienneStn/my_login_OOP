<?php
require_once 'includes/header.php';
?>

<section class="bg-2">
    <div class="container-signup">
        <div class="h2">
            <h2>Sign Up</h2>
        </div>
        <form action="process/signup.process.php" method="POST" class="signup-form">
            <label for="test-signup">Test</label>
            <input type="text" name="name" placeholder="Name" id="">
            <input type="text" name="surname" placeholder="Surname" id="">
            <input type="text" name="username" placeholder="Username" id="">
            <input type="email" name="email" placeholder="Email" id="">
            <input type="password" name="password" placeholder="Password" id="">
            <input type="password" name="passwordVerify" placeholder="Verify your password" id="">
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>

</section>

<?php
require_once 'includes/footer.php';
?>