<?php
$sql_ClinicPCR = "SELECT * FROM SARS_CoV_2_Antibidy WHERE Code = '" . $code . "'";
$result_ClinicPCR = $conn->query($sql_ClinicPCR);
if ($result_ClinicPCR->num_rows > 0) {
    $sState = "edit";
    $j = 0;
} else {
    $sState = "insert";
    $j = 1;
}
?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="col-xl-12 order-xl-1">
    <div class="card">
        <div class="card-body">
            <form action="ClinicAntibody/API/backend.php?api=<?php echo $sState; ?>" method="POST">
                <div class="pl-lg-4">
                    <div class="col-lg-12">
                        <div class="form-group" id="details">
                            <div class="form-check form-check-inline">
                                <h1 class="text-muted mb-4">ผลการตรวจ SARS-CoV-2 Antibody
                                </h1>
                            </div>
                            <div class="container">
                                <?php if ($sState == "insert") { ?>
                                    <table id="myTable" class="table order-list">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h4>ครั้งที่</h4>
                                                </th>
                                                <th>
                                                    <h4>วันที่เก็บ</h4>
                                                </th>
                                                <th>
                                                    <h4>ชนิดตัวอย่าง</h4>
                                                </th>
                                                <th>
                                                    <h4>สถานที่ส่งตรวจ</h4>
                                                </th>
                                                <th>
                                                    <h4>ผลตรวจ</h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="number" name="no0" id="no0" placeholder="ครั้งที่" class="form-control" value="1" readonly />
                                                </td>
                                                <td>
                                                    <input type="date" name="keep_date0" id="keep_date0" placeholder="วันที่เก็บ" class="form-control" />
                                                </td>
                                                <td>
                                                    <select class="form-control" name="type0" id="type0">
                                                        <option selected hidden>ชนิดตัวอย่าง</option>
                                                        <option value="NPS">NPS</option>
                                                        <option value="THROAT T(TH)">THROAT T(TH)</option>
                                                        <option value="IPS+PS">IPS+PS</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea type="text" name="station0" id="station0" placeholder="สถานที่ส่งตรวจ" class="form-control"></textarea>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="detect0" id="detect0">
                                                        <option selected hidden>ผลตรวจ</option>
                                                        <option value="Detected">Detected</option>
                                                        <option value="Non-Detected">Non-Detected</option>
                                                        <option value="Income">Income</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a class="deleteRow"></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5">
                                                    <input type="submit" class="btn btn-outline-primary" name="submit_insert_general" value="เพิ่มข้อมูล">
                                                    <input type="button" class="btn btn-outline-success" id="addrow" value="เพิ่มตาราง" />
                                                </td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tfoot>
                                    </table>
                                <?php } else { ?>
                                    <table id="myTable" class="table order-list">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h4>ครั้งที่</h4>
                                                </th>
                                                <th>
                                                    <h4>วันที่เก็บ</h4>
                                                </th>
                                                <th>
                                                    <h4>ชนิดตัวอย่าง</h4>
                                                </th>
                                                <th>
                                                    <h4>สถานที่ส่งตรวจ</h4>
                                                </th>
                                                <th>
                                                    <h4>ผลตรวจ</h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row_ClinicPCR = $result_ClinicPCR->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <input type="number" name="no<?php echo $j; ?>" id="no<?php echo $j; ?>" placeholder="ครั้งที่" value="<?php echo $row_ClinicPCR["Order_Antibidy"]; ?>" class="form-control" readonly />
                                                    </td>
                                                    <td>
                                                        <input type="date" name="keep_date<?php echo $j; ?>" id="keep_date<?php echo $j; ?>" placeholder="วันที่เก็บ" value="<?php echo $row_ClinicPCR["Date_Antibidy"]; ?>" class="form-control" />
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="type<?php echo $j; ?>" id="type<?php echo $j; ?>">
                                                            <option value="<?php echo $row_ClinicPCR["Example_type_Antibidy"]; ?>"><?php echo $row_ClinicPCR["Example_type_Antibidy"]; ?></option>
                                                            <option value="NPS">NPS</option>
                                                            <option value="THROAT T(TH)">THROAT T(TH)</option>
                                                            <option value="IPS+PS">IPS+PS</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <textarea type="text" name="station<?php echo $j; ?>" id="station<?php echo $j; ?>" placeholder="สถานที่ส่งตรวจ" class="form-control"><?php echo $row_ClinicPCR["Station_Antibidy"]; ?></textarea>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="detect<?php echo $j; ?>" id="detect<?php echo $j; ?>">
                                                            <option value="<?php echo $row_ClinicPCR["Result_Antibidy"]; ?>"><?php echo $row_ClinicPCR["Result_Antibidy"]; ?></option>
                                                            <option value="Detected">Detected</option>
                                                            <option value="Non-Detected">Non-Detected</option>
                                                            <option value="Income">Income</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <a class="deleteRow"></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $j++;
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5">
                                                    <input type="submit" class="btn btn-outline-primary" name="submit_insert_general" value="บันทึก">
                                                    <input type="button" class="btn btn-outline-success" id="addrow" value="เพิ่มตาราง" />
                                                </td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tfoot>
                                    </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        <?php
        $sql_counter = "SELECT Order_Antibidy
                    FROM SARS_CoV_2_Antibidy
                    WHERE Code = '" . $code . "'
                    ORDER BY SARS_CoV_2_Antibidy.Order_Antibidy DESC";
        $result_counter = $conn->query($sql_counter);
        $row_counter = $result_counter->fetch_assoc();
        if ($result_counter->num_rows > 0) {
            $counter = $row_counter["Order_Antibidy"];
        } else {
            $counter = 1;
        }
        ?>
        var counter = <?php echo $counter; ?>;
        var start = counter + 1;
        $("#addrow").on("click", function() {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type="number" name="no' + counter + '" id="no' + counter + '" placeholder="ครั้งที่" class="form-control" value = "' + start + '" readonly/>' +
                '<input type="text" name="no_hide" id="no_hide" placeholder="ครั้งที่" class="form-control" style="display: none;" value = "' + counter + '" readonly />';
            cols += '<td><input type="date" name="keep_date' + counter + '" id="keep_date' + counter + '" placeholder="วันที่เก็บ" class="form-control" /></td>';
            cols += '<td><select class="form-control" name="type' + counter + '" id="type' + counter + '">' +
                '<option selected hidden>ชนิดตัวอย่าง</option>' +
                '<option value="NPS">NPS</option>' +
                '<option value="THROAT T(TH)">THROAT T(TH)</option>' +
                '<option value="IPS+PS">IPS+PS</option>' +
                '</select></td>';
            cols += '<td><textarea type="text" name="station' + counter + '" id="station' + counter + '" placeholder="สถานที่ส่งตรวจ" class="form-control"></textarea></td>';
            cols += '<td><div class="form-check form-check-inline"><select class="form-control" name="detect' + counter + '" id="detect' + counter + '"><option value = "<?php echo $row_ClinicPCR["Result_Antibidy"]; ?>"><?php echo $row_ClinicPCR["Result_Antibidy"]; ?></option><option value="Detected">Detected</option><option value="Non-Detected">Non-Detected</option><option value="Income">Income</option></select></div> </td>';

            cols += '<td>' +
                '<input type = "number" value = "' + start + '" style = "display: none;" name = "hideno">' +
                '<input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            counter++;
            start++;
        });

        $("table.order-list").on("click", ".ibtnDel", function(event) {
            $(this).closest("tr").remove();
            counter -= 1
            start -= 1
        });

    });

    function calculateRow(row) {
        var price = +row.find('input[name^="price"]').val();
    }

    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list").find('input[name^="price"]').each(function() {
            grandTotal += +$(this).val();
        });
        $("#grandtotal").text(grandTotal.toFixed(2));
    }
</script>