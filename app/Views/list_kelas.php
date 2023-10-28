<?= $this->extend('layouts/app')?>

<?= $this->section('content')?>
<table>
    <thead>
        <tr>
            <th>NOMOR</th>
            <th>NAMA KELAS</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
    <form action="<?= base_url('/kelas/create') ?>">
    <br>
    <center><button type=submit class="btn btn-primary">Tambah Kelas</button></form></center>
    <br>
    <br>
        <?php
        $no = 1;
        foreach ($kelas as $kelas){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $kelas['nama_kelas'] ?></td>
            <td>
                <form action="<?= base_url('kelas/' . $kelas['id']) ?>" method="get">
                <button type=submit class="btn btn-primary">Detail</button></form>
                <form action="<?= base_url('kelas/' . $kelas['id'] . '/edit') ?>" method="get">
                <button type=submit class="btn btn-primary">Edit</button></form>
                <form id="delete-form-<?= $kelas['id'] ?>" action="<?= base_url('kelas/' . $kelas['id']) ?>" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <?=csrf_field() ?>
                <button type=submit class="btn btn-primary" onclick="confirmDelete(<?= $kelas['id'] ?>)">Hapus</button></form>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?= $this->endSection()?>