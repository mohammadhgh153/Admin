<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش اطلاعات کاربر</title>
</head>
<body>
    <h2>ویرایش اطلاعات کاربر</h2>
    <form method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
        <button type="submit">ذخیره تغییرات</button>
    </form>
</body>
</html>
