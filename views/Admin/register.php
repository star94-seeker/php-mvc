{% extends "Admin/app.php" %}

{% block title %} Login {% endblock %}

{% block body %}
<center>
    <h1>Register</h1>
</center>

<div class="container">
    {{ 'Twig'|errorMessage }}
    <form action="registerUser" method="post">
        <div class="main">
            <div class="form-group">
                <label>Name : </label>
                <input class="form-control" type="text" placeholder="Enter Username" name="name" required>
            </div>
            <div class="form-group">
                <label>Email : </label>
                <input class="form-control" type="email" placeholder="Enter Email" name="email" required>
            </div>
            <div class="form-group">
                <label>Phone : </label>
                <input class="form-control" type="text" placeholder="Enter Phone number" name="phone" required>
            </div>
            <div class="form-group">
                <label>Password : </label>
                <input class="form-control" type="password" placeholder="Enter Password" name="password" required>
            </div>
            <button type="submit">Login</button>
            Already have an account? <a href="index">Login</a>
            <center><a href="/">Blog</a> </center>
        </div>

    </form>
</div>
<footer>
    <center> 2022</center>
</footer>

{% endblock %}