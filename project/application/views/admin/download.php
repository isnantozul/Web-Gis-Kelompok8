<!DOCTYPE HTML>
<html>

<head>
    <title>Export Data Ke Excel Dengan PHP - Webgis</title>
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
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Map.xls");
    ?>
    <center>
        <h1>Data<br /> Webgis-Beta</h1>
    </center>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Location</th>
            <th>User Send</th>
            <th>User Role</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>User Edit</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($map as $r) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $r['location']; ?></td>
                <td><?php echo $r['user_send']; ?></td>
                <?php if ($r["role_id"] == 1) : ?>
                    <td><?php echo "Administrator" ?></td>
                <?php else : ?>
                    <td><?php echo "Member" ?></td>
                <?php endif; ?>
                <td><?php echo date('d F Y', $r['date_created']); ?></td>
                <?php if ($r["date_updated"] == 0) : ?>
                    <td></td>
                <?php else : ?>
                    <td><?php echo date('d F Y', $r['date_updated']); ?></td>
                <?php endif; ?>
                <td><?php echo $r['user_edit']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>