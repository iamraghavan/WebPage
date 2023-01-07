<?php
$servername = "localhost";
$database = "bumblebees";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully";


$sql = "INSERT INTO leadform (Name, Email, Contact, Whatsapp, BusinessName, Purpose, Message)
VALUES (
    '" .
    $_POST['Name'] .
    "'
    ,'" .
    $_POST['Email'] .
    "'
    ,'" .
    $_POST['Contact'] .
    "'
    ,'" .
    $_POST['Whatsapp'] .
    "'
    ,'" .
    $_POST['Business'] .
    "'
    ,'" .
    $_POST['Purpose'] .
    "'
    ,'" . $_POST['Message'] . "')";


if (mysqli_query($conn, $sql)) {
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
                'Mail From Bumble Bees Website | Enquiry Mail'
            ))
                ->setFrom(['noreply@bumblebees.co.in' => 'Bumble Bees | Marketing Team'])
                ->setTo('raghavanofficials@gmail.com', 'project@m.bumblebees.co.in')
                ->setBody("Hello",'text/html');

        
                $message2 = (new Swift_Message(
                    'Mail From Bumble Bees Website | Confirm Mail'
                ))
                    ->setFrom(['noreply@bumblebees.co.in' => 'Bumble Bees | Marketing Team'])
                    ->setTo([$_POST['Email']])
                    ->setBody('<!DOCTYPE html>
                    <html>
                    
                    <head>
                      <title>Welcome to our site!</title>
                    </head>
                    
                    <body>
                    
                      <div style="padding-left: 30px;padding-top: 20px;padding-right: 86px;">
                        <img alt="bumble bees" height="auto"
                          src="https://firebasestorage.googleapis.com/v0/b/intricate-aria-345510.appspot.com/o/bumblebeesAssets%2FImages%2FLogo%2FBumbleBees-Logo-Black.png?alt=media&token=f0c1400d-20a2-4988-823d-05ae1bfa4c38"
                          style="border:0;display:block;outline:none;text-decoration:none;height:auto;font-size:13px;" title="Bumble Bees"
                          width="200px" ;>
                    
                        <h5>Dear Client / Customer</h5>
                        <p>Thank you for filling out the contact form on our website. We appreciate you taking the time to reach out to us
                          and will do our best to respond to your inquiry as soon as possible.</p>
                    
                        <p>If you have any additional questions or concerns, please don`t hesitate to contact us again.</p>
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                    
                    <tr>
                      <td style="font-size:0px;padding:10px 10px;padding-top:10px;padding-right:10px;word-break:break-word;">
                    
                        <p
                          style="font-family: Ubuntu, Helvetica, Arial; border-top: solid 1px #000000; font-size: 1; margin: 0px auto; width: 100%;">
                        </p>
                    
                      </td>
                    </tr>
                    </table>
                        <p>Regards,<br>Bumble Bees - Project Team
                          Urapakkam, Chennai</p>
                          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                    
                    <tr>
                      <td style="font-size:0px;padding:10px 10px;padding-top:10px;padding-right:10px;word-break:break-word;">
                    
                        <p
                          style="font-family: Ubuntu, Helvetica, Arial; border-top: solid 1px #000000; font-size: 1; margin: 0px auto; width: 100%;">
                        </p>
                    
                      </td>
                    </tr>
                    </table>
                    
                    
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                          style="background:transparent;border-radius:3px;width:35px;">
                          <tr>
                            <td style="font-size:0;height:35px;vertical-align:middle;width:35px;">
                              <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/bumblebeesindia"
                                target="_blank" style="color: #0000EE;">
                                <img alt="Facebook" height="35"
                                  src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/outlined/facebook.png"
                                  style="border-radius:3px;display:block; padding-right:10px; " width="35">
                              </a>
                            </td>
                            <td style="font-size:0;height:35px;vertical-align:middle;width:35px;">
                              <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/bumblebeesindia"
                                target="_blank" style="color: #0000EE;">
                                <img alt="Facebook" height="35"
                                  src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/outlined/linkedin.png"
                                  style="border-radius:3px;display:block; padding-right:10px;" width="35">
                              </a>
                            </td>
                            <td style="font-size:0;height:35px;vertical-align:middle;width:35px;">
                              <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/bumblebeesindia"
                                target="_blank" style="color: #0000EE;">
                                <img alt="Facebook" height="35"
                                  src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/outlined/instagram.png"
                                  style="border-radius:3px;display:block; padding-right:10px;" width="35">
                              </a>
                            </td>
                          </tr>
                        </table>
                    
                      </div>
                    
                    
                    </body>
                    
                    </html>', 'text/html');

                    // ->addPart('Welcome to our site! Thank you for signing up. We hope you enjoy your time with us. Sincerely, The Team', 'text/plain');

            

            // Send the message
            if ($mailer->send($message2)&& $mailer->send($message)) {
                echo ' <script type="text/javascript>
                alert("Thanks for fill the form our team reachout soon !");
                location.replace("../index.html")
                </script>';
            } else {
                echo '
        <script type="text/javascript>
        alert("Mail Not Sent");
        </script>
        ';
            }

   

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>