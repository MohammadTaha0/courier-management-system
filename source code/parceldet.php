<?php
session_start();
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'link.php'; ?>

</head>

<main>
    <?php include 'header.php'; ?>

    <section>
        <div class="container">
            <h5 class="text-center mb-5">Your Parcel Details</h5>
            <div class="row" id="tableone">
                <div class="row w-100 m-auto justify-content-between mb-3">
                    <div class="col-6 h5">
                        <button class="btn btn-dark" onclick="forpDF()"><i class="fa-solid fa-file-pdf"></i></button>
                        <button class="btn btn-dark" onclick="Excel('xlsx','MyExcelSheet')"><i class="fa-solid fa-file-excel"></i></button>
                        <button class="btn btn-dark" onclick="TablePrint()"><i class="fa-solid fa-print"></i></button>
                    </div>
                    <div class="col-4">
                        <input type="text" placeholder="Search Here" class="form-control" id="search-field" onkeyup="search()">
                    </div>
                </div>
                <div class="col-12">
                    <table class="table align-middle text-capitalize">
                        <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Sender Name</th>
                                <th>Reciever Name</th>
                                <th>From Branch</th>
                                <th>To Branch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $thisemail = $_SESSION['auth_user']['email'];
                            if (mysqli_num_rows($cour = mysqli_query($con, "SELECT * FROM `tbl_courier` WHERE `email`='$thisemail'")) > 0) {
                                while ($fetch = mysqli_fetch_array($cour)) {
                            ?>
                                    <tr class="search">
                                        <td><?php echo $fetch['tracking_number'] ?></td>
                                        <td><?php echo $fetch['sender_name'] ?></td>
                                        <td><?php echo $fetch['recipitent_name'] ?></td>
                                        <td>
                                            <?php if ($fetch['from_branch_id'] != 0) {
                                                $fro_id = $fetch['from_branch_id'];
                                                $sel = mysqli_query($con, "SELECT * FROM `tbl_branch` WHERE `id`='$fro_id'");
                                                $fet_bra = mysqli_fetch_array($sel);
                                                echo $fet_bra['address'];
                                            } else {
                                                echo "<p class='text-danger align-middle text-center h4'>---</p>";
                                            }
                                            ?>
                                        </td>
                                        <td><?php if ($fetch['to_branch_id'] != 0) {
                                                $fro_id = $fetch['to_branch_id'];
                                                $sel = mysqli_query($con, "SELECT * FROM `tbl_branch` WHERE `id`='$fro_id'");
                                                $fet_bra = mysqli_fetch_array($sel);
                                                echo $fet_bra['address'];
                                            } else {
                                                echo "<p class='text-danger align-middle text-center h4'>---</p>";
                                            }
                                            ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6" class="text-center">No Courier</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</main>
<script>
    function search() {
        let input = document.getElementById('search-field').value
        input = input.toLowerCase();
        let x = document.getElementsByClassName('search');

        for (i = 0; i < x.length; i++) {
            if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display = "none";
            } else {
                if (input == "") {
                    x[i].style.display = "";
                } else {
                    x[i].style.display = "";
                }
            }
        }
    }

    function Excel(FileExtension, FileName) {
        var table = document.getElementById("tableone");
        var workbook = XLSX.utils.table_to_book(table, {
            sheet: "sheet1"
        });
        return XLSX.writeFile(workbook, FileName + "." + FileExtension || "Excel." + (FileExtension || "xlsx"))
    }

    function TablePrint() {
        var table = document.getElementById("tableone").innerHTML;
        var backup = document.body.innerHTML;
        document.body.innerHTML = table;
        window.print();
        document.body.innerHTML = backup;
    }

    function forpDF() {
        thisContainer = document.getElementById("tableone")
        html2pdf().from(thisContainer).save();
    }
</script>

<!-- For PDF -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<!-- For Excel  -->
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

<body>

</body>

</html>