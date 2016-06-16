<?php
if (isset($_POST)){
    $get_call = $_POST['value'];
    $get_desk = $_POST['value'];
    $get_team = $_POST['value'];
    $get_sales = $_POST['value'];

    if($_POST['name']=='new1') {

        $sth = $dbh->query("SELECT * FROM expert_cc_desks WHERE `id_callcenter`= '{$get_call}'");
        $cat = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo "<option></option>";
        foreach ($cat as $item) {
            echo "<option value='{$item['id']}'>{$item['desk_name']}</option>";
        }
    } if($_POST['name']=='new2') {
        $sth = $dbh->query("SELECT * FROM expert_cc_teams WHERE `id_desk`= '{$get_desk}'");
        $cat = $sth->fetchAll(PDO::FETCH_ASSOC);

        echo "<option></option>";
        foreach ($cat as $item) {
            echo "<option value='{$item['id']}'>{$item['team_name']}</option>";
        }
    } if($_POST['name']=='new3') {
        $sth = $dbh->query("SELECT * FROM expert_cc_users WHERE `team_id`= '{$get_team}'");
        $cat = $sth->fetchAll(PDO::FETCH_ASSOC);

        echo "<option></option>";
        foreach ($cat as $item) {
            echo "<option value='{$item['id']}'>{$item['stage_name']}</option>";
        }
    } if($_POST['name']=='new4') {
        $sth = $dbh->query("SELECT * FROM expert_salestatus");
        $cat = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo "<option></option>";
        foreach ($cat as $item) {
            echo "<option value='{$item['id']}'>{$item['nameStatus']}</option>";
        }
    }

}
