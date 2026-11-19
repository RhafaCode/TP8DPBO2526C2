<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="col-lg-6 mx-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Course Baru</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="index.php?controller=course&action=create">
                <div class="mb-3">
                    <label class="form-label">Course Code</label>
                    <input type="text" name="course_code" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" name="course_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Credits (SKS)</label>
                    <input type="number" name="credits" min="1" max="6" value="3" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lecturer (Dosen Pengampu)</label>
                    <select name="lecturer_id" class="form-select">
                        <option value="">-- Pilih Dosen Pengampu --</option>
                        <?php foreach ($lecturers as $lec): ?>
                            <option value="<?= $lec['id'] ?>"><?= htmlspecialchars($lec['name']) ?> (<?= htmlspecialchars($lec['nidn']) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php?controller=course&action=index" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
