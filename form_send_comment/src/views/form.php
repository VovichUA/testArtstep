<!doctype html>
<html lang="en">
<head>
    <title>Form</title>
    <style>
        body {
            margin: auto;
            width: 50%;
        }
        input {
            display: block;
            width: 100%;
            margin: 5px 0;
        }
        .error {
            background-color: #ff5440;
            border: #a60001 1px solid;
            margin: 5px auto;
            text-align: center;
        }
        textarea {
            width:100%;
            height: 50px;
        }
    </style>

</head>
<body>
<form method="post" id="form">
    <?php if (empty($errors)) :?>
        <h1>Enter data:</h1>
    <?php endif;?>
    <?php foreach ($errors as $error): ?>
        <div class="error">
            <?php echo $error;?>
        </div>
    <?php endforeach;?>
    <lable>Username:</lable>
    <input type="text" name="user" id="form-user" value="<?php echo $name ?? '';?>" required>
    <lable>Email:</lable>
    <input type="text" name="email" id="form-email" value="<?php echo $email ?? '';?>" required>
    <lable>Comment:</lable>
    <br>
    <textarea name="comment" id="form-comment"><?php echo $comment ?? '';?></textarea>
    <input type="submit">
</form>
<script>
    let form = document.getElementById('form');
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        let username = document.getElementById('form-user').value.trim();
        let email = document.getElementById('form-email').value.trim();
        let comment = document.getElementById('form-comment').value.trim();
        let emailRegex = /\S+@\S+\.\S+/;
        if ((username.length == 0) || (username.length < 3)) {
            alert('Username must be not empty and at least 3 characters');
            return;
        }
        if ((email.length == 0) || !(emailRegex.test(email))) {
            alert('Invalid email');
            return;
        }
        if ((comment.length == 0) || (comment.length > 124)) {
            alert('Comment must be not empty and not longer than 124 characters');
            return;
        }
        form.submit();
    });
</script>
</body>
</html>