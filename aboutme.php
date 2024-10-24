<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Organisasi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            padding-top: 60px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            display: flex;
            align-items: flex-start;
            padding: 40px;
            animation: fadeIn 1s ease-in-out;
            width: 80%;
            position: relative;
        }

        .left {
            width: 60%;
            text-align: left;
            padding-right: 20px;
        }

        .right {
            width: 40%;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            position: absolute;
            bottom: 0;
            right: 0;
        }

        .right img {
            width: 12cm;
            height: auto;
        }

        .education-box {
            background-color: #ff70a0;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            position: relative;
            width: 100%;
            text-align: left;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .line {
            height: 20px;
            width: 2px;
            background-color: #8e42f3;
            position: absolute;
            left: 50%;
            top: 100%;
            transform: translateX(-50%);
        }

        h1 {
            font-size: 60px;
            color: #8e42f3;
            white-space: nowrap;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <button onclick="window.location.href='home.php'">Home</button>
        <button onclick="window.location.href='aboutme.php'">About Me</button>
        <button onclick="window.location.href='pengalaman.php'">Experience</button>
        <button onclick="window.location.href='skill.php'">Skill</button>
        <button onclick="window.location.href='kontak.php'">Contact Me</button>
    </div>

    <div class="container">
        <?php
        // Connect to db
        $conn = new mysqli("localhost", "root", "", "pungkasdb");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to retrieve education data
        $sql = "SELECT institution, description, start_year, end_year FROM education";
        $result = $conn->query($sql);
        ?>

        <div class="left">
            <h1>Hello!👋🏻 I'm Pungkas</h1>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="education-box">
                        <h2><?= $row['institution']; ?></h2>
                        <p><?= $row['description']; ?> dimulai pada tahun <?= $row['start_year']; ?> hingga <?= $row['end_year']; ?>.</p>
                        <div class="line"></div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No education data found.</p>
            <?php endif; ?>
        </div>

        <?php
        $conn->close();
        ?>

        <div class="right">
            <img src="images/letris-removebg-preview (1).png" alt="Profile Image">
        </div>
    </div>

</body>

</html>