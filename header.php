<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
    .headline-container {
        box-sizing: border-box;
        padding: 8px;
        width: 100%;
    }

    .headline {
        box-sizing: border-box;
        height: 40px;
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        padding: 4px 8px;
        gap: 8px;
        background-color: #a4ac86;
    }

    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal-overlay:target {
        display: flex;
        flex-wrap: wrap;
    }

    .modal {
        background-color: white;
        padding: 20px;
        width: 100%;
        max-width: 400px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .modal p {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 30px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 1.5em;
        color: #333;
        text-decoration: none;
    }

    .input-group {
        margin-bottom: 15px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .input-group label {
        display: block;
        font-size: 0.9em;
        margin-bottom: 5px;
    }

    .input-group input {
        width: 95%;
        padding: 10px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-size: 1em;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-size: 1em;
        color: #ffffff;
        background-color: #636b54;
        border: none;
        border-radius: 5px;
        margin-top: 5px;
    }

    .form > h2 {
        margin-bottom: 20px;
        text-align: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .login-btn {
        margin-left: 5px;
        color: #a4ac86;
    }

    .avatar-container {
        height: 32px;
        border-radius: 32px;
        overflow: hidden;
    }

    .avatar {
        display: block;
        height: 100%;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 120px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content button {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        width: 100%;
        text-align: left;
        border: none;
        background: none;
        cursor: pointer;
    }

    .dropdown-content button:hover {
        background-color: #f1f1f1;
    }

    .show {
        display: block;
    }
</style>


<div class="headline-container">
    <div class="headline">
        <?php if (isset($_SESSION['user'])): ?>
            <div class="avatar-container">
                <img class="avatar dropdown-trigger" src="https://placehold.co/32" onclick="toggleDropdown()" />
                <div id="myDropdown" class="dropdown-content">
                    <button onclick="logout()">Logout</button>
                </div>
            </div>
            <a><?php echo ($_SESSION['user']['username']) ?></a>
        <?php else: ?>
            <a href="#signupModal">Register</a>
            <a href="#loginModal">Login</a>
        <?php endif; ?>
    </div>
</div>


<div id="signupModal" class="modal-overlay">
    <div class="modal">
        <a href="#" class="close-btn">&times;</a>
        <form class="form sign-up" action="?action=signup" method="post">
            <h2>Sign Up</h2>
            <div class="input-group">
                <label for="username">Full Name</label>
                <input type="text" placeholder="Enter full name" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" placeholder="example@gmail.com" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="date">Date of Birth</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="tel" placeholder="044-111-222" id="phone" name="phone" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" placeholder="Enter password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" placeholder="Confirm password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" id="signupSubmit">Confirm</button>
            <p>Already have an account? <a href="#loginModal" class="login-btn">Login</a></p>
        </form>
    </div>
</div>

<div id="loginModal" class="modal-overlay">
    <div class="modal">
        <a href="#" class="close-btn">&times;</a>
        <form class="form" action="login.php" method="post">
            <h2>Welcome back</h2>
            <p>Login to your account below</p>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" placeholder="example@gmail.com" id="email_login" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" placeholder="Enter password" id="password_login" name="password" required>
            </div>
            <button type="submit" id="b2">Login</button>
        </form>
    </div>
</div>


<script defer>
    document.addEventListener("DOMContentLoaded", function() {

        const signupForm = document.querySelector(".form.sign-up");
        signupForm.addEventListener("submit", function(event) {
            event.preventDefault();

            const username = document.getElementById("username").value.trim();
            const email = document.getElementById("email").value.trim();
            const date = document.getElementById("date").value.trim();
            const phone = document.getElementById("phone").value.trim();
            const password = document.getElementById("password").value.trim();
            const confirmPassword = document.getElementById("confirm_password").value.trim();

            const usernameRegex = /^[a-zA-Z0-9_]{3,16}$/;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
            const phoneNumberRegex = /^\+?[0-9\s\-()]{7,15}$/;
            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

            if (!usernameRegex.test(username)) {
                alert("Username must be 3–16 characters long and can contain letters, numbers, and underscores.");
                return false;
            }

            if (!emailRegex.test(email)) {
                alert("Invalid email address.");
                return false;
            }

            if (!dateRegex.test(date)) {
                alert("Date must be in the format YYYY-MM-DD.");
                return false;
            }

            if (!phoneNumberRegex.test(phone)) {
                alert("Invalid phone number.");
                return false;
            }

            if (!passwordRegex.test(password)) {
                alert("Password must be at least 8 characters long, include a letter, a number, and a special character.");
                return false;
            }

            if (confirmPassword !== password) {
                alert("Passwords do not match.");
                return false;
            }

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'register.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(`username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}&date=${encodeURIComponent(date)}&phone=${encodeURIComponent(phone)}&password=${encodeURIComponent(password)}`);
            document.querySelector("#signupModal>.modal>.close-btn").click()
        });
    });

    function toggleDropdown() {
        const dropdown = document.getElementById("myDropdown");
        dropdown.classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-trigger')) {
            const dropdowns = document.getElementsByClassName("dropdown-content");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    function logout() {
        window.location.href = '/logout.php';
    }
</script>