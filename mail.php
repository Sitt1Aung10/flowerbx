 <?php
    if (isset($_POST['chatSubmitBtn'])) {
        // Retrieve form data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['_replyto']);
        $phone = htmlspecialchars($_POST['phone_number']);
        $message = htmlspecialchars($_POST['message']);

        // Prepare the email
        $to = "jackhammer765221570@gmail.com"; // Replace with your recipient email address
        $subject = "New Message from Contact Form";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Message sent successfully!');</script>";
        } else {
            echo "<script>alert('Failed to send message. Please try again.');</script>";
        }
    }

    //When I asked to gpt when Error Message is shown,It said By default, PHP tries to use a mail server running on localhost (your local machine) at port 25. If there is no mail server set up on your local machine, the mail() function will fail.And Its asked me to Change configure Setting in php packages.I won't dare doing it.So I just Let it be there.
    ?>
   