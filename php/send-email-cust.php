<?php

// Check for POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Extract user info from POST data
  $userName = $_POST['name'];
  $userEmail = $_POST['email'];


  require_once  '../vendor/autoload.php';
    require_once '../php/credential.php';



            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                ->setUsername(EMAIL)
                ->setPassword(PASS);

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message(
                'Mail From : Bumble Bees - Thank you for choosing us !' 
            ))
                ->setFrom(['noreply@bumblebees.co.in' => 'Bumble Bees | Marketing Team'])
                ->setTo($userEmail, 'project@m.bumblebees.co.in')
                ->setBody("Dear $userName,

                We wanted to take a moment to thank you for choosing to do business with us. We appreciate your trust in our company and are committed to providing you with the best products and service possible.
                
                If you have any questions or need assistance, please don't hesitate to reach out. We are here to help and are always happy to hear from you.
                
                Again, thank you for your business. We look forward to continuing to serve you.
                
                Sincerely,
                Bumble Bees");

        
                if ($mailer->send($message)) {
                    echo ' <script type="text/javascript>
                    console.log("Thanks for fill the form our team reachout soon !");
                    
                    </script>';
                } else {
                    echo '
            <script type="text/javascript>
            console.log("Mail Not Sent");
            </script>
            ';
                }

                


}

