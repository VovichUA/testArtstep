<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History</title>
    <style>
        table {
            margin: auto;
            text-align: center;
        }
        table,table td, th {
            border: black 1px solid;
        }
        td {
            max-width: 600px;
        }
        tr th {
            background-color: cadetblue;
        }
        tr:nth-child(odd) {
            background-color: #c8c8c8;
        }
    </style>
</head>
<body>
<?php if (!empty($allComments)):?>
    <table>
        <tr>
            <th>User</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Created at</th>
        </tr>
        <?php foreach($allComments as $comment):?>
            <tr>
                <td><?php echo $comment['user'];?></td>
                <td><?php echo $comment['email'];?></td>
                <td><?php echo $comment['comment'];?></td>
                <td><?php echo $comment['created_at'];?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <a href="/">Add one more</a>
<?php else:?>
    <div>No comments yet</div>
    <a href="/">Add first</a>
<?php endif;?>
</body>
</html>