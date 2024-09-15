<!-- views/pages/personal-detail.php -->
<div class="head-title">
    <div class="left">
        <h1>Personal Details</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Personal Details</a>
            </li>
        </ul>
    </div>
</div>

<?php if (isset($message)): ?>
    <div class="alert <?php echo strpos($message, 'Error') !== false ? 'alert-danger' : 'alert-success'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<div class="profile-form">
    <form action="index.php?page=personal-detail" method="post">
        <div class="form-group">
            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full_name" value="<?php echo htmlspecialchars($profile['full_name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($profile['email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($profile['phone']); ?>">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="3"><?php echo htmlspecialchars($profile['address']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" value="<?php echo htmlspecialchars($profile['department']); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" id="position" name="position" value="<?php echo htmlspecialchars($profile['position']); ?>" readonly>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit">Update Profile</button>
        </div>
    </form>
</div>