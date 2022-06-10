{% extends "Admin/app.php" %}

{% block title %} Login {% endblock %}

{% block body %}
<center>
    <h1>{{ title }} Login</h1>
</center>

<div class="container">
    {{ 'Twig'|errorMessage }}
    <form action="login" method="post">
        <div class="main">
            <div class="form-group">
                <label>Username : </label>
                <input class="form-control" type="text" placeholder="Enter Username" name="email" required>
            </div>
            <div class="form-group">
                <label>Password : </label>
                <input class="form-control" type="password" placeholder="Enter Password" name="password" required>
            </div>
            <button type="submit">Login</button>
            Don't have an account? <a href="register">Create</a>
            <center><a href="/">Blog</a> </center>
        </div>
    </form>
</div>
<footer>
    <center> 2022</center>
</footer>

{% endblock %}