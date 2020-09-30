<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<div class="container">
    <label for="firstName" class="label">First Name</label>
    <input type="text"  placeholder="Enter First Name" name="firstName" id="firstName" required>
    <label for="lastname" class="label">Last Name</label>
    <input type="text"  placeholder="Enter Last Name" name="lastName" id="lastName" required>
    <label for="dob" class="label">Date Of Birth</label>
    <input type="date"  placeholder="Enter DOB" name="dob" id="dob" required>
    <label for="email" class="label">Email</label>
    <input type="email"  placeholder="Enter Email" name="email" id="email" required>
    <label for="password" class="label">Crate New Password</label>
    <input type="password"  placeholder="Enter Password" name="password" id="password" required>
    <label for="passwordRepeat" class="label">Confirm Your Password</label>
    <input type="password"  placeholder="Confirm Password" name="passwordRepeat" id="passwordRepeat" required>
    <p>
        <input type="checkbox" name="agreeCheck" id="agreeCheck" required>I agree to company <a href="#">Terms & Privacy</a>.
    </p>
    <button type="submit" class="registerbtn">Register</button>
</div>
</body>
</html>