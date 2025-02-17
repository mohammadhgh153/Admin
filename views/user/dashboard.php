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