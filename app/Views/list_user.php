<?= $this->extend('layouts/app')?>

<?= $this->section('content')?>
<table>
    <thead>
        <tr>
            <th>NOMOR</th>
            <th>NAMA</th>
            <th>NPM</th>
            <th>KELAS</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
    <a href="<?= base_url('/user/create') ?>">Tambah Data</a>
        <?php
        foreach ($users as $user){
        ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nama'] ?></td>
            <td><?= $user['npm'] ?></td>
            <td><?= $user['nama_kelas'] ?></td>
            <td>
                <form action="<?= base_url('user/' . $user['id']) ?>" method="GET">
                <button type=submit>Detail</button></form>

                <form action="<?= base_url('user/' . $user['id'] . '/edit') ?>" method="GET">
                <button type=submit>Edit</button></form>
                
                <form action="<?= base_url('user/' . $user['id']) ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <button type=submit>Hapus</button></form>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?= $this->endSection()?>