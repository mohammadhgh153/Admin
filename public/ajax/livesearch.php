<?php
include_once('../../config/database.php');
if (isset($_POST['input'])) {
    $input = $_POST['input'];

    $con = Database::getInstance();

    $query = "SELECT * FROM users WHERE name LIKE :input";
    
    $stmt = $con->prepare($query);

    $stmt->execute(['input' => $input . '%']);

    if ($stmt->rowCount() > 0) {
        ?>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
            </tr>
        </thead>

        <tbody>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
        ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $email ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <?php
    } else {
        echo "نتیجه‌ای پیدا نشد.";
    }
}
?>
