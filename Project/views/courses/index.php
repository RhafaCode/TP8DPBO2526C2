<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Daftar Mata Kuliah</h3>
    <a href="index.php?controller=course&action=create" class="btn btn-primary">+ Add New Course</a>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Course Name</th>
                    <th>Credits (SKS)</th>
                    <th>Lecturer (Dosen Pengampu)</th>
                    <th width="160">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['course_code']) ?></td>
                    <td><?= htmlspecialchars($row['course_name']) ?></td>
                    <td><?= htmlspecialchars($row['credits']) ?></td>
                    <td><?= htmlspecialchars($row['lecturer_name'] ?? '-') ?></td>
                    <td>
                        <a href="index.php?controller=course&action=edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="index.php?controller=course&action=delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus mata kuliah ini?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
