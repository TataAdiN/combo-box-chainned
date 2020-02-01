<html>
    <head>
        <title>Chainned Combo Box</title>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    </head>
    <body>
        <center>
            <h4>FORM INPUT</h4>
            <form>
                <select class="select2" style="width: 25%" id="provinsi">
                    <option value="">---- Pilih Provinsi ----</option>
                <?php
                    include 'db.php';
                    $query = "select * from provinces";
                    $result = $konek->query($query);
                    if (!$result) {
                        printf("Errormessage: %s\n", $konek->error);
                    }
                    while($data = $result->fetch_array(MYSQLI_ASSOC)){
                ?>
                    <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                <?php
                    }
                ?>
                </select><br/><br/>
                <select class="select2" style="width: 25%" id="kabupaten">
                    <option value="">---- Pilih Kabupaten ----</option>
                </select><br/><br/>
                <select class="select2" style="width: 25%" id="kecamatan">
                    <option value="">---- Pilih Kecamatan ----</option>
                </select>
            </form>
        </center>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2()
            });
            $("#provinsi").change(function() {
                var postForm = {
                        'id': document.getElementById("provinsi").value,
                        'op': 1
                };
                $.ajax({
                    type: "post",
                    url: "http://localhost/combo-box/wilayah.php",
                    data: postForm,
                    success: function(data) {
                        $("#kabupaten").html(data);
                    }
                });
            });
            $("#kabupaten").change(function() {
                var postForm = {
                        'id': document.getElementById("kabupaten").value,
                        'op': 2
                };
                $.ajax({
                    type: "post",
                    url: "http://localhost/combo-box/wilayah.php",
                    data: postForm,
                    success: function(data) {
                        $("#kecamatan").html(data);
                    }
                });
            });
        </script>
    </body>
</html>