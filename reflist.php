<?php include('include/header.php');require_once('database.php');require_once 'funcation/othFunc.php'; ?><!-- Design by Kandarp --><html><head> <?php include('include/links.php') ?>    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"          media="screen"/>    <!--javascript-->    <script src="js/jquery.min.js"></script>    <script src="js/jquery.dataTables.min.js"></script>    <style>        * {            line-height: 130%;        }    </style>    <script>        $(document).ready(function () {            $('#example').DataTable({});        });    </script></head><body><div id="wrapper">    <?php include('include/nav.php') ?>    <div id="page">        <?php        if (isset($_GET['act'])) {            if ($_GET['act'] == 'insert') {                echo '<p  style="color: green;text-align: center">' . 'Reference Successfully Inserted' . '</p>';            } else if ($_GET['act'] == 'update') {                echo '<p style="color: green;text-align: center">' . 'Reference Successfully Updated' . '</p>';            } else if ($_GET['act'] == 'delete') {                echo '<p  style="color: green;text-align: center">' . 'Reference Successfully Deleted' . '</p>';            }        }        ?>        <div style="width: 98%;margin: 0 auto;">            <table id="example" class="display" cellspacing="0" width="95%">                <thead>                <tr>                    <!--                    <th nowrap>Reference</th>-->                    <th>Reference</th>                    <?php                    if ($_SESSION['act'] == 'true') { ?>                        <th> Action</th>                    <?php } ?>                </tr>                </thead>                <tbody>                <?php                $references = referenceList();                foreach ($references as $r) {                    $ref_id = referenceParameter($r, 'bib_key');                    if (!empty($r)) {                        echo '<tr>';//                        echo '<td>' . $ref_id . '</td>';//                        echo '<td>' . referenceParameter($r, 'bib_title') . '</td>';                        echo '<td>' . referenceMessageMsg($r) . '</td>';                        if ($_SESSION['act'] == 'true') {                            echo '<td><a class="a-success"  href="updateRef.php?id=' . $ref_id . '">Update</a><br/>';                            echo '<a  class="a-danger" href="deleteRef.php?id=' . $ref_id . '">Delete</a>';                            echo '</td>';                        }                        echo '</tr>';                    }                }                ?>                </tbody>            </table>        </div>        <!-- end #content -->        <div style="clear:both; margin:0;"></div>    </div>    <!-- end #page --></div><div id="footer">    <?php include('include/footer.php') ?></div><!-- end #footer --></body></html>