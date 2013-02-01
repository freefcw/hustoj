<table class="table table-striped">
    <thead>
    <tr>
        <th>User Id</th>
        <th>Del</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $u): ?>
    <tr>
        <td><?php echo $user['user_id'];?></td>
        <td><a href="#">Del</a></td>
    </tr>
        <?php endforeach; ?>
    </tbody>
</table>