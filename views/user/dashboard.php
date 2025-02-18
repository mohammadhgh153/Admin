<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
        }

        h2 {
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .logout {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .logout:hover {
            background-color: #c82333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>

    <div class="container">
        <h2>لیست کاربران</h2>
        <form method="GET" action="/dashboard" style="margin-bottom: 20px;">
            <input type="text" name="search" placeholder="جستجو بر اساس نام یا ایمیل" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" required>
            <button type="submit">جستجو</button>
        </form>

        <table>
            <tr>
                <th>نام</th>
                <th>ایمیل</th>
                <th>تصویر</th>
            </tr>

            <?php if (empty($users)): ?>
                <tr>
                    <td colspan="3">کاربر یا ایمیل مورد نظر یافت نشد!</td>
                </tr>
            <?php else: ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user["name"]) ?></td>
                        <td><?= htmlspecialchars($user["email"]) ?></td>
                        <td>
                            <?php if ($user['image']): ?>
                                <img src="/uploads/<?= htmlspecialchars($user['image']) ?>" alt="تصویر کاربر" width="50" height="50">
                            <?php else: ?>
                                <span>بدون تصویر</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="/edit/<?= $user['id'] ?>">ویرایش</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <a href="/logout" class="logout">خروج</a>
    </div>

</body>

</html>
