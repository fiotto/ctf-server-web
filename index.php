<meta charset="UTF-8">
<title>テスト</title>
<?php
    try {
        $dsn = "mysql:host=mysql;dbname=ctf_db;";
        $db = new PDO($dsn, 'root', 'password');

        $sql = "SELECT * FROM name";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
    