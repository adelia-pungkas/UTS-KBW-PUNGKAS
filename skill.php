<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Hard and Soft Skills</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Arial', sans-serif;
    }

    body {
      background-color: #fff;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      color: #4a4a4a;
    }

    header {
      background-color: #8e42f3;
      padding: 10px 0;
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

    .content {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
      text-align: center;
      margin-top: 80px;
    }

    .content h1 {
      color: #ff70a0;
      font-size: 3.5em;
      margin-bottom: 20px;
      text-shadow: 2px 2px #fff;
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .card-container {
      display: flex;
      justify-content: center;
      gap: 20px;
      padding: 20px;
      flex-wrap: wrap;
    }

    .card {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 30px;
      width: 250px;
      text-align: center;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      position: relative;
      overflow: hidden;
      cursor: pointer;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }

    .card img {
      width: 60px;
      margin-bottom: 15px;
    }

    .card h3 {
      color: #ff70a0;
      margin-bottom: 10px;
      font-size: 1.5em;
    }

    .card p {
      color: #000000;
      font-size: 0.9em;
      margin-top: 10px;
    }

    .description {
      display: none;
      margin-top: 10px;
      padding: 10px;
      border-radius: 10px;
      background-color: #e3f2fd;
      position: absolute;
      z-index: 1;
      width: 200px;
      left: 50%;
      transform: translateX(-50%);
      top: 100%;
    }

    .card:hover .description {
      display: block;
    }


    footer p {
      color: #ff70a0;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <div class="navbar">
        <button onclick="window.location.href='home.php'">Home</button>
        <button onclick="window.location.href='aboutme.php'">About Me</button>
        <button onclick="window.location.href='pengalaman.php'">
          Experience
        </button>
        <button onclick="window.location.href='skill.php'">Skill</button>
        <button onclick="window.location.href='kontak.php'">Contact Me</button>
      </div>
    </nav>
  </header>
  <?php
  // connect to db
  $conn = new mysqli("localhost", "root", "", "pungkasdb");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Query to fetch hard skills
  $hard_skills_sql = "SELECT name, description, img_url FROM skills WHERE category = 'hard'";
  $hard_skills_result = $conn->query($hard_skills_sql);

  // Query to fetch soft skills
  $soft_skills_sql = "SELECT name, description FROM skills WHERE category = 'soft'";
  $soft_skills_result = $conn->query($soft_skills_sql);
  ?>

  <section class="content">
    <h1>Hard Skills</h1>
    <div class="card-container">
      <?php
      if ($hard_skills_result->num_rows > 0) {
        while ($row = $hard_skills_result->fetch_assoc()) {
          echo '<div class="card">';
          echo '<img src="' . $row["img_url"] . '" alt="' . $row["name"] . ' Logo">';
          echo '<h3>' . $row["name"] . '</h3>';
          echo '<p>' . $row["description"] . '</p>';
          echo '<div class="description">Deskripsi lebih lanjut tentang ' . $row["name"] . '.</div>';
          echo '</div>';
        }
      }
      ?>
    </div>

    <div class="soft-skills">
      <h1>Soft Skills</h1>
      <div class="card-container">
        <?php
        if ($soft_skills_result->num_rows > 0) {
          while ($row = $soft_skills_result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<h3>' . $row["name"] . '</h3>';
            echo '<p>' . $row["description"] . '</p>';
            echo '<div class="description">Deskripsi lebih lanjut tentang ' . $row["name"] . '.</div>';
            echo '</div>';
          }
        }
        ?>
      </div>
    </div>
  </section>

  <?php
  $conn->close();
  ?>

</body>

</html>