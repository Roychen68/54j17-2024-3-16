<?php
$pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=web03","admin","1234");

$sql = "SELECT * FROM `tickets`";

$rows = $pdo->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav"></div>

        <table class="table table-dark">

            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
            <?php
    foreach ($rows as $key => $row) {
        ?>
                <tr>
                    <th scope="row"><?=$row['id']?></th>
                    <th><?=$row['first_name']?></th>
                    <th><?=$row['last_name']?></th>
                    <th><?=$row['phone']?></th>
                    <th><?=$row['password']?></th>
                    <th><button class="btn btn-warning edit"  onclick="update(<?=$row['id']?>)">update</button></th>
                    <th><button class="btn btn-danger" onclick="del(<?=$row['id']?>)">delete</button></th>
                </tr>
        <?php
    }
    ?>
            </tbody>
        </table>
    <div class="box">
        <table class="edit-form table table-dark" >
            <tr>
            <th id="id"></th>
                <th class="form-group">
                    <label for="firstname">change First name to:</label>
                    <input type="text" name="firstname" id="firstname" class="form-control">
                </th>
                <th class="form-group">
                    <label for="lastname">change Last name to:</label>
                    <input type="text" name="lastname" id="lastname" class="form-control">
                </th>
                <th class="form-group">
                    <label for="phone">change phone to:</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </th>
                <th class="form-group">
                    <label for="password">change password to:</label>
                    <input type="text" name="password" id="password" class="form-control">
                </th>
                <th><button class="btn btn-warning" onclick="edit(<?=$row['id']?>)">update</button></th>
            </tr>
        </table>
    </div>
        
</body>
</html>
<script src="./jquery.js"></script>
<script>
    let editid
    $(".nav").load("header.html");
    function update(id){
        $(".box").css("display","flex")
        $(".box").css("z-index","9999")
        console.log("in");
        $("#id").text(id);
        editid = id
    }
    function edit(){
        $(".box").css("display","flex")
        $(".box").css("z-index","9999")
        console.log(editid);
        var data = {
            id: editid,
            firstname: $("#firstname").val(),
            lastname: $("#lastname").val(),
            phone: $("#phone").val(),
            password: $("#password").val()
        }
        $.post("update.php",data,function (response) {
            console.log(response);
            alert("data edit succes");
            location.reload();
        })
    }
    function del(id) {
        $.post("del.php",{id},function () {
            location.reload()
            console.log(id);
        })
    }
</script>