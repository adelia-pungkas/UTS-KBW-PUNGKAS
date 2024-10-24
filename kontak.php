<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Me</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Arial", sans-serif;
    }

    body {
      background-image: url("pungkas cantik.jpg");
      background-size: contain;
      background-repeat: no-repeat;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      min-height: 100vh;
      padding-top: 60px;
    }

    .container {
      display: flex;
      justify-content: space-between;
      padding: 40px;
      align-items: flex-start;
      width: 100%;
    }

    .left {
      width: 50%;
      padding-left: 40px;
    }

    .right {
      width: 50%;
      padding-left: 20px;
    }

    h1 {
      font-size: 90px;
      font-weight: bold;
      color: #8e42f3;
      text-transform: uppercase;
      line-height: 1.2;
      margin-bottom: 10px;
    }

    h2 {
      font-size: 24px;
      font-family: "Dancing Script", cursive;
      color: black;
      margin: 10px 0 20px;
    }

    .contact-info {
      position: fixed;
      bottom: 10px;
      left: 5cm;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      width: 400px;
    }

    .contact-info div {
      background-color: #ff82af;
      color: white;
      border-radius: 20px;
      padding: 20px;
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      font-size: 24px;
      font-weight: bold;
      width: 100%;
    }

    .contact-info div img {
      width: 40px;
      margin-right: 15px;
    }

    .contact-form {
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      width: 100%;
      display: flex;
      flex-direction: column;
    }

    .contact-form label {
      margin-bottom: 5px;
      font-weight: bold;
    }

    .contact-form input,
    .contact-form textarea {
      margin-bottom: 15px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .contact-form button {
      background-color: #8e42f3;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    .contact-form button:hover {
      background-color: #a664ff;
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
    <div class="left">
      <h1>CONTACT ME</h1>

      <div class="contact-info">
        <?php
        // connect to db
        $conn = new mysqli("localhost", "root", "", "pungkasdb");

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch contact info
        $contact_sql = "SELECT platform, icon_url, contact_detail FROM contact_info";
        $contact_result = $conn->query($contact_sql);

        if ($contact_result->num_rows > 0) {
          while ($row = $contact_result->fetch_assoc()) {
            echo '<div>';
            echo '<img src="' . $row["icon_url"] . '" alt="' . $row["platform"] . '" />';
            echo $row["contact_detail"];
            echo '</div>';
          }
        }

        $conn->close();
        ?>
      </div>
    </div>

    <div class="right">
      <form id="contactForm" method="post" class="contact-form" style="margin-top: 30px;">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Your Name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" placeholder="Subject" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>

        <button type="submit">Submit</button>
      </form>

    </div>

  </div>
  <?php
  // connect to db
  $conn = new mysqli("localhost", "root", "", "pungkasdb");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Check if the form data has been submitted via POST
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data safely using isset
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Insert data into contact table
    $sql = "INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
      echo "Your message has been successfully submitted!";
    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt->close();
  }
  $conn->close();
  ?>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#contactForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        const formData = {
          name: $('#name').val(),
          email: $('#email').val(),
          subject: $('#subject').val(),
          message: $('#message').val()
        };

        $.ajax({
          type: 'POST',
          url: 'kontak.php', // PHP file to handle the AJAX request
          data: formData,
          success: function(response) {
            // Show success alert with SweetAlert
            swal("Success!", "Form berhasil dikirim :)", "success");
            $('#contactForm')[0].reset(); // Reset the form
          },
          error: function() {
            // Show error alert with SweetAlert
            swal("Error!", "Ada kesalahan saat mengirim form :'(", "error");
          }
        });

      });
    });
  </script>

</body>

</html>