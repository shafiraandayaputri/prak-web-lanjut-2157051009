<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/profile/CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eff27b1688.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container-fluid w-100 p-0" style="margin-top: 100px !important;position: absolute;">
        <div class="container mx-auto px-5 mt-1" style="margin-bottom: 100px !important;">
            <ul class="p-0 position-relative">
                <li style="display: inline-block;">
                    <h2 style="color: white;font-weight: bold;">Create User</h2>
                </li>
            </ul>
            <form action="<?= base_url('/user/store') ?>" method="POST">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h4>Error</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="nama" class="form-label" style="color: white;">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label" style="color: white;">Kelas</label>
                    <select type="text" class="form-control" id="kelas" name="kelas" style="background-color: transparent;color: white;">
                        <?php
                        foreach ($kelas as $item){
                        ?>
                            <option value="<?= $item['id'] ?>" style="color: black;">
                                <?= $item['nama_kelas'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="npm" class="form-label" style="color: white;">NPM</label>
                    <input type="number" class="form-control" id="npm" name="npm">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Create</button>
            </form>
        </div>
    </div>

</body>

</html>