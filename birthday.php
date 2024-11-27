<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = strtolower(trim($_POST["password"]));

    // Validate the password
    if ($password === "baby") {
        // Redirect to the wish card page on correct password
        header("Location: wishcard.php");
        exit();
    } else {
        // Incorrect password, will display the hint beside the label
        $errorMessage = "The hint is your favourite word";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Letter</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f3e9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            text-align: center;
        }

        /* Envelope Style */
        .envelope {
            width: 320px;
            height: 210px;
            background-color: white;
            position: relative;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            border: 2px solid #c48f65;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            overflow: hidden;
            transform-style: preserve-3d;
            perspective: 1500px;
        }

        /* Envelope Flap */
        .envelope::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 50%;
            width: 100%;
            height: 120px;
            background-color: #fff;
            border-bottom: 2px solid #ddd;
            transform: translateX(-50%) rotateX(45deg);
            transform-origin: top;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        /* Wax Seal */
        .wax-seal {
            position: absolute;
            bottom: 30px;
            left: 50%;
            width: 80px;
            height: 80px;
            transform: translateX(-50%);
            border-radius: 50%;
            background: radial-gradient(circle at 40% 40%, #c48f65, #8b5e3c);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3), inset 0 -5px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wax-seal img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Hover Effect on Envelope */
        .envelope:hover {
            transform: scale(1.05) rotateY(10deg);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        /* "Click Here" Text Styling */
        .click-text {
            position: absolute;
            top: 10%; /* Adjusted to be above the wax seal */
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px; /* Reduced font size */
            font-family: 'Arial', sans-serif;
            color: #8b5e3c;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            letter-spacing: 2px; /* Space out the characters slightly */
            cursor: pointer;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .click-text:hover {
            color: #c48f65;
            /* Removed underline effect */
        }

        /* Password Form */
        .password-form {
            margin-top: 30px;
            font-size: 18px;
            color: #333;
            display: none;
            text-align: left;
        }

        .password-form input {
            padding: 14px;
            font-size: 16px;
            border: 2px solid #c48f65;
            border-radius: 20px;
            outline: none;
            margin: 10px 0;
            width: 250px;
        }

        .password-form button {
            padding: 12px 25px;
            background-color: #c48f65;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
        }

        /* Hint Message Styling */
        .hint-message {
            font-size: 16px;
            color: #8b5e3c; /* Brown color */
            font-family: 'Georgia', serif;
            margin-top: 0;
            margin-left: 10px;
            letter-spacing: 1px;
            font-style: italic;
        }

        .label-container {
            display: flex;
            align-items: center;
        }

        .label-container label {
            margin-right: 10px;
        }

    </style>
</head>
<body>
    <!-- Envelope Section -->
    <div class="envelope" id="envelope" onclick="showForm()">
        <!-- Wax Seal Image -->
        <div class="wax-seal">
            <img src="images/waxseal.jpg" alt="Wax Seal Image">
        </div>

        <!-- "Click Here" Text -->
        <div class="click-text">ｃｌｉｃｋ ｈｅｒｅ</div>
    </div>

    <!-- Password Form Section -->
    <form method="POST" class="password-form" id="passwordForm">
        <!-- Password Label and Hint Message -->
        <div class="label-container">
            <label for="passwordInput">Enter Password:</label>
            <!-- Display the hint message beside the label if the password is incorrect -->
            <?php if (isset($errorMessage)) : ?>
                <div class="hint-message"><?php echo $errorMessage; ?></div>
            <?php endif; ?>
        </div>

        <input type="password" name="password" id="passwordInput" required>

        <button type="submit">Submit</button>
    </form>

    <script>
        // JavaScript to reveal the form
        function showForm() {
            document.getElementById('envelope').style.display = 'none';
            document.getElementById('passwordForm').style.display = 'block';
        }
    </script>
</body>
</html>
