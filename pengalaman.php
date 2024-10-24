<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Organisasi</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Arial", sans-serif;
      background-color: #f5f5f5;
    }

    .container {
      width: 100%;
      margin: 0;
    }

    .section {
      display: flex;
      align-items: center;
      padding: 20px 40px;
      margin-bottom: 0;
      color: white;
      width: 100vw;
      box-sizing: border-box;
    }

    .section .left {
      flex: 1;
      max-width: 200px;
      margin-right: 20px;
    }

    .section .right {
      flex: 3;
      padding-left: 20px;
    }

    h1 {
      font-size: 100px;
      font-weight: bold;
      margin: 0;
      text-transform: uppercase;
    }

    h3 {
      font-size: 20px;
      margin-bottom: 10px;
      color: white;
    }

    p {
      font-size: 16px;
      color: white;
    }

    .exp,
    .org {
      background-color: #ff70a0;
    }

    .erie,
    .anis {
      background-color: #9d70ff;
    }

    .nce,
    .asi {
      background-color: #70a9ff;
    }

    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      background-color: #8e42f3;
      padding: 10px;
      display: flex;
      justify-content: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    .navbar button {
      background-color: #fff;
      color: #8e42f3;
      padding: 10px 20px;
      margin: 0 10px;
      border: none;
      border-radius: 20px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s;
    }

    .navbar button:hover {
      background-color: #a664ff;
      color: #fff;
      transform: scale(1.1);
    }

    .section p,
    .section h3 {
      margin-left: 30px;
    }
  </style>
</head>

<body style="margin-top:50px">
  <div class="navbar">
    <button onclick="window.location.href='home.php'">Home</button>
    <button onclick="window.location.href='aboutme.php'">About Me</button>
    <button onclick="window.location.href='pengalaman.php'">
      Experience
    </button>
    <button onclick="window.location.href='skill.php'">Skill</button>
    <button onclick="window.location.href='kontak.php'">Contact Me</button>
  </div>
  <?php
  // connect to db
  $conn = new mysqli("localhost", "root", "", "pungkasdb");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Query to fetch experiences
  $sql = "SELECT section, title, description, year_start, year_end FROM experiences";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="section ' . strtolower($row["section"]) . '">';
      echo '    <div class="left">';
      echo '        <h1>' . $row["section"] . '</h1>';
      echo '    </div>';
      echo '    <div class="right">';
      echo '        <h3>' . $row["title"] . '</h3>';
      echo '        <p>' . $row["description"] . '</p>';
      echo '    </div>';
      echo '</div>';
    }
  } else {
    echo "No experiences found.";
  }

  $conn->close();
  ?>

</body>

</html>