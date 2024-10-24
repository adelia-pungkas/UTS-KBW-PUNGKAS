<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Arial", sans-serif;
    }

    body {
      background-image: url("images/adelia.jpg");
      background-size: contain;
      background-repeat: no-repeat;
      display: flex;
      flex-direction: column;
      /* Menyusun elemen secara vertikal */
      align-items: center;
      justify-content: flex-start;
      min-height: 100vh;
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
      /* Memastikan navbar berada di atas konten lain */
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
  </style>
</head>

<body>
  <div class="navbar">
    <button onclick="window.location.href='home.php'">Home</button>
    <button onclick="window.location.href='aboutme.php'">About Me</button>
    <button onclick="window.location.href='pengalaman.php'">
      Experience
    </button>
    <button onclick="window.location.href='skill.php'">Skill</button>
    <button onclick="window.location.href='kontak.php'">Contact Me</button>
  </div>
</body>

</html>