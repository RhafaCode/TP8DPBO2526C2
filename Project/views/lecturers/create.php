<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="col-lg-6 mx-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Lecturer Baru</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="index.php?controller=lecturer&action=create">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIDN</label>
                    <input type="text" name="nidn" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Join Date</label>
                    <input type="date" name="join_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Department (Program Studi)</label>
                    <select name="department_id" class="form-select">
                        <option value="">-- Pilih Program Studi --</option>
                        <?php foreach ($departments as $dept): ?>
                            <option value="<?= $dept['id'] ?>"><?= htmlspecialchars($dept['department_name']) ?> (<?= htmlspecialchars($dept['faculty']) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php?controller=lecturer&action=index" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
