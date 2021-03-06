<?php include('partials/header.php');
restrict_access();
$all_users = User::find_all_users();
?>
    <div class="row">
        <div class="medium-12 columns">
            <h3>Departments</h3>
            <?php if( is_admin() ) : ?>
                <div class="table-functions">
                    <a class="button success" href="#">Add User</a>
                </div>
            <?php endif; ?>
            <table class="hover stack" id="users-table">
                <thead>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                </thead>
                <tbody>
                <?php foreach( $all_users as $account ) : ?>
                    <tr>
                        <td valign="top">
                            <?php echo $account['username']; ?>
                            <br><a href="user-profile?user=<?php echo $account['id']; ?>">Edit User</a>
                        </td>
                        <td valign="top"><?php echo "{$account['first_name']} {$account['last_name']}"; ?></td>
                        <td valign="top"><?php echo $account['email']; ?></td>
                        <td valign="top">
                            <?php if( $account['access_level'] == 1 ) {
                                echo 'Admin';
                            } else {
                                echo 'Employee';
                            } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include('partials/footer.php'); ?>