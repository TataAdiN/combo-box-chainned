<?php
    include 'db.php';
    $id = $_POST['id'];
    $option = $_POST['op'];
    if($option == '1'){
        $query = "select id, name from regencies where province_id =".$id;
        $result = $konek->query($query);
        if (!$result) {
            printf("Errormessage: %s\n", $konek->error);
        }else{
            echo "<option value=''> --- pilih Kabupaten ---- </option>";
            while($data = $result->fetch_array(MYSQLI_ASSOC)){
                echo "<option value='".$data['id']."'>".$data['name']."</option>";
            }
        }
    }else{
        $query = "select id, name from districts where regency_id =".$id;
        $result = $konek->query($query);
        if (!$result) {
            printf("Errormessage: %s\n", $konek->error);
        }else{
            echo "<option value=''> --- pilih Kecamatan ---- </option>";
            while($data = $result->fetch_array(MYSQLI_ASSOC)){
                echo "<option value='".$data['id']."'>".$data['name']."</option>";
            }
        }
    }
?>