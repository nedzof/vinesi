<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Vinesi</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet"
          href="assets/css/Data-Summary-Panel---3-Column-Overview--Mobile-Responsive.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
</head>

<body>


<?php
//False for Create, True for Update
$createOrUpdate = !empty($this->invoice) ?>
<div class="projects-horizontal">
    <div class="container">
        <div class="intro">
            <h2 class="text-center" style="font-weight: normal;">
                <strong><?php echo $createOrUpdate ? "Update" : "Create" ?></strong>&nbsp;Invoice</h2>
            <form action="<?php echo $createOrUpdate ? "update" : "create" ?>" method="post">

                <?php if ($createOrUpdate) { ?>
                <div class="form-grou§p"><label class="text-secondary">Invoice ID</label><input
                            name="invoice
                           id"
                            value="<?php echo $this->invoice->getInvoiceid() ?>"
                            class="form-control"
                            type="number"
                            required=""
                            readonly="readonly">

                    <?php } ?>

                    <div class="form-grou§p"><label class="text-secondary">Invoice Type</label><input
                                name="invoice
                               type"
                                value="<?php echo $createOrUpdate ? $this->invoice->getInvoicetype() : 0 ?>"
                                class="form-control"
                                type="text"
                                required=""
                    </div>
                    <div class="form-group"><label class="text-secondary">Amount</label><input name="invoice
                   amount"
                                                                                               value="<?php echo $createOrUpdate ? $this->invoice->getInvoiceamount() : 0 ?>"
                                                                                               class="form-control"
                                                                                               type="number"
                                                                                               required="">
                    </div>

                </div>
                <div class="form-group"><label class="text-secondary">Invoice Date</label><input name="invoice
               startdate"
                                                                                                 value="<?php echo $createOrUpdate ? $this->invoice->getInvoicestartdate() : date("Y-m-d"); ?>"
                                                                                                 class="form-control"
                                                                                                 type="date"
                                                                                                 required="">
                </div>
                <div class="form-group"><label class="text-secondary">Invoice paid</label>

                    <?php

                    if ($createOrUpdate) {
                        if ($this->invoice->getInvoicepaid() == 1) { ?>

                            <input type="checkbox" value="1" checked="checked" name="invoice
                           paid">

                        <?php } elseif ($this->invoice->getInvoicepaid() == 0) { ?>

                            <input type="checkbox" value="1" name="invoice
                           paid">

                        <?php }
                    } else { ?>

                        <input type="checkbox" value="1" name="invoice
                       paid">

                    <?php } ?>
                </div>

                <div class="input-group" role="group" >
                    <input type="submit" class="btn-primary"
                           value="<?php echo $createOrUpdate ? "Update" : "Create" ?>"
                </div>
                <div>
                    <input type="button" class="btn-success" value="Cancel" onclick="goBack()">
                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>

</body>
</html>
