<!DOCTYPE html>
<html lang="en">

<style type="text/css" media="print">
    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print barcode</title>
</head>

<body>
    <center>
        <h3>Aset Yayasan Diannanda</h3>
        <img src="<?= $urlqrcode; ?>" alt="">
        <p>&copy; IT Yayasan Diannanda 2023</p>
    </center>
</body>

</html>
<script>
    window.print();
</script>