<?php
include "../../lib/db.class.php";
$db =  new DB('mysql.hostinger.com.ua', 'u989276726_fresh', '111111', 'u989276726_fresh');

if (isset($_POST)){
    $get_call = $_POST['value'];
    $get_desk = $_POST['value'];
    $get_team = $_POST['value'];
    $get_sales = $_POST['value'];

    if($_POST['name']=='new1') {

        $cat = $db->query("SELECT * FROM expert_cc_desks WHERE `id_callcenter`= '{$get_call}'");
        echo "<option></option>";
        foreach ($cat as $item) {
            echo "<option value='{$item['id']}'>{$item['desk_name']}</option>";
        }
    } if($_POST['name']=='new2') {
        $cat = $db->query("SELECT * FROM expert_cc_teams WHERE `id_desk`= '{$get_desk}'");
        echo "<option></option>";
        foreach ($cat as $item) {
            echo "<option value='{$item['id']}'>{$item['team_name']}</option>";
        }
    } if($_POST['name']=='new3') {
        $cat = $db->query("SELECT * FROM expert_cc_users WHERE `team_id`= '{$get_team}'");

        echo "<option></option>";
        foreach ($cat as $item) {
            echo "<option value='{$item['id']}'>{$item['stage_name']}</option>";
        }
    } if($_POST['name']=='new4') {
        $cat = $db->query("SELECT * FROM expert_salestatus");
        echo "<option></option>";
        foreach ($cat as $item) {
            echo "<option value='{$item['id']}'>{$item['nameStatus']}</option>";
        }
    }

}
