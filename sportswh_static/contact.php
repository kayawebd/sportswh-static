<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Warehouse</title>
    <link rel="stylesheet" href="./styles/style.min.css">
    <link rel="stylesheet" href="./styles/normalize.min.css">
</head>

<body>
    <header class="wrapper">
        <div class="logo">
            <a href="index.php"><img src="images/LogoLarge.gif" alt="company logo" width="602" height="84"></a>
        </div>
        <nav>
            <ul>
                <li><a href="about.php">Contact</a></li>
                <li><a href="contact.php">About</a></li>
            </ul>
        </nav>
    </header>

    <?php
    $firstnameErr = $lastnameErr = $emailErr = $phoneErr = "";
    $firstname = $lastname = $email = $phone = $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // First name string check
        if (empty($_POST["firstname"])) {
            $firstnameErr =  "First name is required";
        } else {
            $firstname = input_data($_POST["firstname"]);
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                $firstnameErr = "Only alphabets and white space are allowed";
            }
        }

        // last name string check
        if (empty($_POST["lastname"])) {
            $lastnameErr =  "Last name is required";
        } else {
            $lastname = input_data($_POST["lastname"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
                $lastnameErr = "Only alphabets and white space are allowed";
            }
        }

        // Email validation
        if (empty($_POST["email"])) {
            $emailErr =  "Email is required";
        } else {
            $email = input_data($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Phone number validation
        if (!empty($_POST["phone"])) {
            $phone = input_data($_POST["phone"]);
            // check if phone number well formed
            if (!preg_match("/^[0-9]*$/", $phone)) {
                $phoneErr = "Only numeric value is allowed.";
            }
            //check mobile no length should not be less and greator than 10  
            if (strlen($phone) > 15) {
                $phoneErr = "Phone no should be less than 15 digits.";
            }
        }

        if (!empty($_POST["message"])) {
            $message = input_data($_POST["message"]);
        }
    }
    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }

    ?>

    <?php
    // if (isset($_POST['submit'])) {
    //     $recipient = "kayawebd@gmail.com";
    //     $sender = $_POST['email'];
    //     $firstname = $_POST['firstname'];
    //     $surname = $_POST['surname'];
    //     $subject = "Message from Sports Warehouse coming soon page";
    //     $message = $_POST['message'];
    //     $header = "From: " . $firstname . "<" . $sender . ">\r\n";

    //     mail($recipient, $subject, $message, $header)
    //         or die("Error!");

    //     echo "<h3>Thank you for contacting us. We will get back to you as soon as possible.</h3>";
    // }
    ?>
    <main class="wrapper">
        <h1>Sports warehouse is coming soon. </h1>
        <p>If you have any questions, we would love to hear from you, please complete the following information.</p>
        <fieldset>
            <legend>Contact Us</legend>
            <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="wrapper">
                <div>
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname">
                    <span class="error">* <?= $firstnameErr; ?> </span>
                    <!-- js validation -->
                    <!-- <span id="firstNameMessage"></span>  -->
                </div>
                <div>
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname">
                    <span class="error">* <?= $lastnameErr; ?> </span>
                    <!-- js validation -->
                    <!-- <span id="lastnameMessage"></span> -->
                </div>
                <div>
                    <label for="email">Email: </label>
                    <input type="email" id="email" name="email">
                    <span class="error">* <?= $emailErr; ?> </span>
                    <!-- js validation -->
                    <!-- <span id="emailMessage"></span> -->
                </div>
                <div>
                    <label for="phone">Phone: </label>
                    <input type="text" id="phone" name="phone">
                    <span> <?= $phoneErr; ?> </span>
                    <!-- js validation -->
                    <!-- <span id="phoneMessage"></span> -->
                </div>
                <div id="form-message">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    <!-- js validation -->
                    <!-- <span id="enquiryMessage"></span> -->
                </div>

                <div id="buttons">
                    <input type="submit" name="submit" id="submit" value="Sent Message" />
                </div>
            </form>
        </fieldset>
    </main>
    <footer>
        <div class="wrapper">
            <p>&copy; <?= date("Y") ?> Sports Warehouse</p>
        </div>

    </footer>

</body>

</html>