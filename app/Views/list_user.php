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
        <?php
        foreach ($users as $user){
        ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nama'] ?></td>
            <td><?= $user['npm'] ?></td>
            <td><?= $user['nama_kelas'] ?></td>
            <td>
                <a href="<?= base_url('user/' . $user['id']) ?>">Detail</a>
                <!-- <button type=button>Detail</button> -->
                <a href="<?= base_url('user/' . $user['id'] . '/edit') ?>">Edit</a>
                <form action="<?= base_url('user/' . $user['id']) ?>" method="post"><button type=button>Hapus</button>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?= $this->endSection()?>