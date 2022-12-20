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

echo "Connected successfully";


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

            $passMessage = new stdClass();
            $passMessage-> Name = $_POST["Name"];
            $passMessage-> Email = $_POST["Email"];
            $passMessage-> Contact = $_POST["Contact"];
            $passMessage-> Whatsapp = $_POST["Whatsapp"];
            $passMessage-> Business = $_POST["Business"];
            $passMessage-> Purpose = $_POST["Purpose"];
            $passMessage-> Message = $_POST["Message"];
           

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
                ->setBody('Name : '. $_POST["Name"]. 'Contact:'. $_POST["Contact"]. 'Whatsapp: '. $_POST["Whatsapp"]. 'Purpose:'. $_POST["Purpose"]. '');

        
                $message2 = (new Swift_Message(
                    'Mail From Bumble Bees Website | Confirm Mail'
                ))
                    ->setFrom(['noreply@bumblebees.co.in' => 'Bumble Bees | Marketing Team'])
                    ->setTo([$_POST['Email']])
                    ->setBody( '<h3>Dear Client / Customer</h3> 
                    <h5>Thank you for filling out the contact form on our website. We appreciate you taking the time to reach out to us and will do our best to respond to your inquiry as soon as possible.</h5>
                    <h5>If you have any additional questions or concerns, please don`t hesitate to contact us again.</h5>
                   
                    Regards
                    <br>
                    Bumble Bees - Project Team
                    <br>
                    Urapakkam, Chennai',
                'text/html')

                ->addPart(
                    'Plain text email',
                    'text/plain'
                );

            

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