<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>لیست کاربران</h2>
    <table border="1">
        <tr>
            <th>نام</th>
            <th>ایمیل</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user["name"]) ?></td>
                <td><?= htmlspecialchars($user["email"]) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/logout">خروج</a>
</body>

</html>