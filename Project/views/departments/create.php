<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="col-lg-6 mx-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Department Baru</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="index.php?controller=department&action=create">
                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text" name="department_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Faculty</label>
                    <input type="text" name="faculty" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php?controller=department&action=index" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
