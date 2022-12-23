<!DOCTYPE html>
<html>

<head>
    <title>Export</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=DATABUKU.doc");
    ?>
    <table class="table table-bordered table-striped" id="data-table1">
        <thead>
            <tr>
                <th>No</th>
                <!-- Masukan Disini -->
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Kategori Buku</th>
                <th>Stock Buku</th>
                <th>Tahun Buku</th>
                <!-- Selesai Disini -->
            </tr>
</thead>
        <tbody style="padding: 50px;">
            <?php
            $i = 1;
            foreach ($data as $key => $value) : ?>
                <tr>
                    <!-- Masukan Disini -->
                    <td><?= $i++ ?></td>
                    </td>
                    <td> <?= $value['kode_buku'] ?></td>
                    <td> <?= $value['judul_buku'] ?></td>
                    <td> <?= $value['kategori_buku'] ?></td>
                    <td> <?= $value['stock_buku'] ?></td>
                    <td> <?= $value['tahun_buku'] ?></td>
                    <!-- Selesai Disini -->
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>