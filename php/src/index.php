<?php
  $query = $_GET['q'];
  try {
    $dsn = "mysql:host=mysql;dbname=ctf_db;charset=utf8;";
    $db = new PDO($dsn, 'root', 'password');

    $sql = "SELECT * FROM users WHERE delete_flag=FALSE AND job LIKE '%{$query}%'";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>CTF 体験</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <form class="form-inline my-3">
      <div class="form-group mb-2">
        <input type="text" name="q" class="form-control" placeholder="職種検索" value="<?php echo $query ?>">
      </div>
      <button type="submit" class="btn btn-primary mb-2 mx-sm-4">検索</button>
    </form>
    <?php if ($query) { ?>
      <p><span class="text-danger"><?php echo $query ?></span>の検索結果</p>
    <?php } ?>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">姓</th>
          <th scope="col">名</th>
          <th scope="col">職種</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $result as $user ): ?>
          <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['last_name']; ?></td>
            <td><?php echo $user['first_name']; ?></td>
            <td><?php echo $user['job']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
