<?= $this->extend('layouts/app')?>

<?= $this->section('content')?>

<a href="<?= base_url('/kelas') ?>" type="button" class="btn btn-danger">Kembali</a>

<table>
    <thead>
        <tr>
            <th>NOMOR</th>
            <th>NAMA KELAS</th>
            <th>NPM</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($kelas as $kelas){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $kelas['nama_kelas'] ?></td>
            <td><?= $kelas['npm'] ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?= $this->endSection()?>