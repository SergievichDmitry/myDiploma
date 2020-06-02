<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop";

function connect(){
    $conn = mysqli_connect("localhost", "root", "", "shop");
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function init(){
    $conn = connect();
    $sql = "SELECT id, name FROM goods";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    $out = array();
        while($row = mysqli_fetch_assoc($result)) {
           $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}



function init_blog(){
    $conn = connect();
    $sql = "SELECT * FROM news";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    $out = array();
        while($row = mysqli_fetch_assoc($result)) {
           $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function selectOneNews(){
    $conn = connect();
    $id = $_POST['gid_news'];
    $sql = "SELECT * FROM news WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function updateNews(){
    $conn = connect();
    $id = $_POST['id'];
    $name = $_POST['name_news'];
    $text = $_POST['text_news'];
    $img = $_POST['img_news'];

    $sql = "UPDATE news SET name_news='$name', text_news='$text', img_news='$img'  WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    mysqli_close($conn);
    writeJSON_blog();
}

function newNews(){
    $conn = connect();
    $id = $_POST['id'];
    $name = $_POST['name_news'];
    $text = $_POST['text_news'];
    $img = $_POST['img_news'];

    $sql = "INSERT INTO news(name_news, text_news, img_news)
    VALUES ('$name', '$text', '$img')";

    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    writeJSON_blog();
}

function loadNews(){
    $conn = connect();
    $sql = "SELECT * FROM news";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = array();
            while($row = mysqli_fetch_assoc($result)) {
               $out[$row["id"]] = $row;
            }
            echo json_encode($out);
        } else {
            echo "0";
        }
    mysqli_close($conn);
}

function loadSingleNews(){
    $id = $_POST['id'];
    $conn = connect();
    $sql = "SELECT * FROM news WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        } else {
            echo "0";
        }
    mysqli_close($conn);
}

function writeJSON_blog(){
    $conn = connect();
    $sql = "SELECT * FROM news";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    $out = array();
        while($row = mysqli_fetch_assoc($result)) {
           $out[$row["id"]] = $row;
        }
        $a = file_put_contents ('../news.json', json_encode($out));
        echo $a;
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function selectOneGoods(){
    $conn = connect();
    $id = $_POST['gid'];
    $sql = "SELECT * FROM goods WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function updateGoods(){
    $conn = connect();
    $id = $_POST['id'];
    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $desc = $_POST['gdesc'];
    $img = $_POST['gimg'];
    $user = $_POST['guser'];
    $mail = $_POST['gmail'];
    $number = $_POST['gnumber'];
    $category = $_POST['gcategory'];

    $sql = "UPDATE goods SET name='$name', cost='$cost', description='$desc', img='$img', user='$user', mail='$mail', number='$number',  category='$category' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    mysqli_close($conn);
    writeJSON();
}

function newGoods($x){
    $conn = connect();
    $name = $_POST['gname'];
    $category = $_POST['gcategory'];
    $cost = $_POST['gcost'];
    $desc = $_POST['gdesc'];
    $img = $_POST['gimg'];
    $user = $x;
    $mail = $_POST['gmail'];
    $number = $_POST['gnumber'];

    $sql = "INSERT INTO goods(name, cost, description, img, user, mail, number, category)
    VALUES ('$name', '$cost', '$desc', '$img', '$user', '$mail', '$number', '$category')";

    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    writeJSON();
}

function writeJSON(){
    $conn = connect();
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    $out = array();
        while($row = mysqli_fetch_assoc($result)) {
           $out[$row["id"]] = $row;
        }
        file_put_contents ('../goods.json', json_encode($out));
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function loadGoods(){
    $conn = connect();
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = array();
            while($row = mysqli_fetch_assoc($result)) {
               $out[$row["id"]] = $row;
            }
            echo json_encode($out);
        } else {
            echo "0";
        }
    mysqli_close($conn);
}

function loadSingleGoods(){
    $id = $_POST['id'];
    $conn = connect();
    $sql = "SELECT * FROM goods WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        } else {
            echo "0";
        }
    mysqli_close($conn);
}

function loadClass($x){
    $conn = connect();
    $sql = "SELECT * FROM goods WHERE category='$x'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = array();
            while($row = mysqli_fetch_assoc($result)) {
               $out[$row["id"]] = $row;
            }
            echo json_encode($out);
        } else {
            echo "Товаров нет";
        }
    mysqli_close($conn);
}

function loadUserGoods($x){
    $conn = connect();
    if ($x == 'admin'){
        $sql = "SELECT * FROM goods";
    }
    else {
        $sql = "SELECT * FROM goods WHERE user='$x'";
    }
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = array();
            while($row = mysqli_fetch_assoc($result)) {
               $out[$row["id"]] = $row;
            }
            echo json_encode($out);
        } else {
            echo "Товаров нет";
        }
    mysqli_close($conn);
}

function deleteItem(){
    $id = $_POST['id'];
    $conn = connect();
    $sql = "DELETE FROM goods WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function loadDirect($x){
    $conn = connect();
    $sql = "SELECT * FROM direct WHERE recipient='$x'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = array();
            while($row = mysqli_fetch_assoc($result)) {
               $out[$row["id"]] = $row;
            }
            echo json_encode($out);
        } else {
            echo "Товаров нет";
        }
    mysqli_close($conn);
}

function newAnswer($x){
    $conn = connect();
    $id = $_POST['id'];
    $name = $_POST['gname'];
    $sender = $x;
    $recipient = $_POST['glogin'];
    $message = $_POST['gtext'];
    $time = date('Y-m-d');

    $sql = "INSERT INTO direct(name, sender, recipient, message, time)
    VALUES ('$name', '$sender', '$recipient', '$message', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}

function deleteMessage(){
    $id = $_POST['id'];
    $conn = connect();
    $sql = "DELETE FROM direct WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}