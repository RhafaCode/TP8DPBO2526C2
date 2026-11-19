<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Daftar Dosen</h3>
    <a href="index.php?controller=lecturer&action=create" class="btn btn-primary">+ Add New Lecturer</a>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>NIDN</th>
                    <th>Phone</th>
                    <th>Join Date</th>
                    <th>Department (Prodi)</th>
                    <th width="160">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lecturers as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['nidn']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= htmlspecialchars($row['join_date']) ?></td>
                    <td><?= htmlspecialchars($row['department_name'] ?? '-') ?></td>
                    <td>
                        <a href="index.php?controller=lecturer&action=edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="index.php?controller=lecturer&action=delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus dosen ini?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
