<?php
require_once 'includes/header.php';
?>

<section class="bg-2">
    <div class="container-signup">
        <div class="h2">
            <h2>Sign Up</h2>
        </div>
        <form action="process/signin.process.php" method="POST" class="signup-form">
            <label for="test-signup">Test</label>
            <input type="text" name="email" placeholder="Email/Username" id="">
            <input type="password" name="password" placeholder="Password" id="">
            <button type="submit" name="submit">Sign In</button>
        </form>
    </div>

</section>

<?php
require_once 'includes/footer.php';
?>