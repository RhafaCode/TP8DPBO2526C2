<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="col-lg-6 mx-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Department</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="index.php?controller=department&action=edit&id=<?= $department['id'] ?>">
                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text" name="department_name" value="<?= htmlspecialchars($department['department_name']) ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Faculty</label>
                    <input type="text" name="faculty" value="<?= htmlspecialchars($department['faculty']) ?>" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php?controller=department&action=index" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
