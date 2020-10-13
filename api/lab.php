<?php
include('dbconfig.php');
require_once('PHPMailer/PHPMailerAutoload.php');

$postdata=file_get_contents('php://input');

if(isset($postdata) && !empty($postdata)){

    $request=json_decode($postdata);

    $fname=mysqli_real_escape_string($conn,$request->fName);
    $lname=mysqli_real_escape_string($conn,$request->lName);
    $email=mysqli_real_escape_string($conn,$request->Email);
    $password=mysqli_real_escape_string($conn,$request->Password);
    $mobile=mysqli_real_escape_string($conn,$request->Mobile);

    $sql=mysqli_query($conn,
    "INSERT INTO `doc_pati_lab` (`first_name`,`last_name`,`mobile`,`password`,`email_id`,`type`,`created_date`) 
     VALUES('$fname','$lname','$mobile','$password','$email','2',NOW())");

     if($sql == TRUE){
         http_response_code(201);
     } else {
         http_response_code(422);
     }

     if(http_response_code(201))
     {
        $mail = new PHPMailer(TRUE);


        try {   
   
                $mail->setFrom('lakshmangiri98@gmail.com');
                $mail->addAddress($email);
                $mail->isHTML(true);

                $mail->Subject = 'Greetings from EMR';
                $mail->Body = 
                '<!DOCTYPE html>
                <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="utf-8"> <!-- utf-8 works for most cases -->
        <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldnt be necessary -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
        <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
        <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no"> <!-- Tell iOS not to automatically link certain text strings. -->
        <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

        <!-- CSS Reset : BEGIN -->
        <style>

            /* Remove spaces around the email design added by some email clients. */
            /* It can remove the padding / margin and add a background color to the compose a reply window. */
            html,
            body {
                margin: 0 !important;
                padding: 0 !important;
                height: 100% !important;
                width: 100% !important;
            }

            /* Stops email clients resizing small text. */
            * {
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }

            /* Centers email on Android 4.4 */
            div[style*="margin: 16px 0"] {
                margin: 0 !important;
            }

            /* Stops Outlook from adding extra spacing to tables. */
            table,
            td {
                mso-table-lspace: 0pt !important;
                mso-table-rspace: 0pt !important;
            }

            /* What it does: Fixes webkit padding issue. */
            table {
                border-spacing: 0 !important;
                border-collapse: collapse !important;
                table-layout: fixed !important;
                margin: 0 auto !important;
            }

            /* What it does: Uses a better rendering method when resizing images in IE. */
            img {
                -ms-interpolation-mode:bicubic;
            }

            /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
            a {
                text-decoration: none;
            }

            /* What it does: A work-around for email clients meddling in triggered links. */
            a[x-apple-data-detectors],  /* iOS */
            .unstyle-auto-detected-links a,
            .aBn {
                border-bottom: 0 !important;
                cursor: default !important;
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }

            /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
            .a6S {
                display: none !important;
                opacity: 0.01 !important;
            }

            /* What it does: Prevents Gmail from changing the text color in conversation threads. */
            .im {
                color: inherit !important;
            }

            /* If the above doesnt work, add a .g-img class to any image in question. */
            img.g-img + div {
                display: none !important;
            }

            /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
            /* Create one of these media queries for each additional viewport size youd like to fix */

            /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
            @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                u ~ div .email-container {
                    min-width: 320px !important;
                }
            }
            /* iPhone 6, 6S, 7, 8, and X */
            @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                u ~ div .email-container {
                    min-width: 375px !important;
                }
            }
            /* iPhone 6+, 7+, and 8+ */
            @media only screen and (min-device-width: 414px) {
                u ~ div .email-container {
                    min-width: 414px !important;
                }
            }

        </style>

        <!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
        <!--[if gte mso 9]>
        <xml>
            <o:OfficeDocumentSettings>
                <o:AllowPNG/>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->

        <!-- CSS Reset : END -->

        <!-- Progressive Enhancements : BEGIN -->
        <style>

            /* What it does: Hover styles for buttons */
            .button-td,
            .button-a {
                transition: all 100ms ease-in;
            }
            .button-td-primary:hover,
            .button-a-primary:hover {
                opacity: .9;
            }

            /* Media Queries */
            @media screen and (max-width: 600px) {

                /* What it does: Adjust typography on small screens to improve readability */
                .email-container p {
                    font-size: 12px !important;
                }
                .email-container h3
                {
                    font-size: 13px;
                }

            }

        </style>
        <!-- Progressive Enhancements : END -->
    </head>
    <!--
    The email background color (#222222) is defined in three places:
    1. body tag: for most email clients
    2. center tag: for Gmail and Inbox mobile apps and web versions of Gmail, GSuite, Inbox, Yahoo, AOL, Libero, Comcast, freenet, Mail.ru, Orange.fr
    3. mso conditional: For Windows 10 Mail
    -->
    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;">
    
        <!--[if mso | IE]>
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #222222;">
        <tr>
        <td>
        <![endif]-->

        <!-- Create white space after the desired preview text so email clients don’t pull other distracting text into the inbox preview. Extend as necessary. -->

        <!-- Preview Text Spacing Hack : BEGIN -->
        <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>
        <!-- Preview Text Spacing Hack : END -->

        <!--
            Set the email width. Defined in two places:
            1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
            2. MSO tags for Desktop Windows Outlook enforce a 600px width.
        -->
        <div style="max-width: 300px; margin: 0 auto;" class="email-container">
            <!--[if mso]>
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600">
            <tr>
            <td>
            <![endif]-->

            <!-- Email Body : BEGIN -->
           <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">

              <!-- Top image with text and button : start -->
                <tr>
                    <tr width="600" style="padding:10 0;background-size:cover;max-width: 600px;max-height:200;font-family: sans-serif; font-size: 15px; margin: auto; display: block;background-color:#333;background-position: center;background-repeat: no-repeat; margin: auto;">
                        <td>
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="50%">
                                <tr>
                                    <th style="border-radius:1px solid black;text-align: center;padding: 0px;font-weight:bold;font-family: sans-serif;font-size: 12px;line-height: 25px;color: #fff;margin:auto;">
                                       <h3 style="margin-top: 20px;"> WELCOME TO EMR </h3>
                                       <p style="font-weight: normal;">Thank you '.$fname.' for joining the platform</p>
                                       <p>your Email id is : '.$email.' </p>
                                       <p>your password is : '.$password.' </p>
                                    </th>
                                </tr>
                            </table>
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="40%">
                                    <td style="text-align: center;padding: 0px;font-family: sans-serif;font-size: 12px;line-height: 25px;color: #333;margin:0;">
                                        <a class="button-a button-a-primary" href="#" style="background-color:#dc3545;border:1px solid #dc3545;font-family: sans-serif;font-size: 12px;line-height: 15px;text-decoration: none;padding: 7px 10px;color:#fff;display: block;border-radius: 1px; margin-bottom: 10px;">Login
                                        </a>
                                    </td>
                                </tr> 
                            </table>    
                        </td>
                    </tr>
              <!-- Top image with text and button : end -->

             

                    <!-- footer part : start -->
                    <tr style="padding:30 0;background-size:100%;max-width: 600px;max-height:200;font-family: sans-serif; font-size: 15px;color: #fff; margin: auto; display: block;background-color: #e2e2e2; margin: auto;">
                        <td>
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td style="text-align: center;padding: 5px;font-family: sans-serif;font-size: 12px;font-weight:bold;line-height: 25px;color: #333;margin: 10 0;">Copyrights 2019
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- footer part : end -->  
                </tr>      
            </table>
        </div>
    </body>
                </html>';
                
         
                
   
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = TRUE;
                $mail->SMTPSecure = 'tls';
                $mail->Username = 'lakshmangiri98@gmail.com';
                $mail->Password = 'ajithsrejithgiri1998';
                $mail->Port = 587;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
               
               /* Enable SMTP debug output. */
               
               $mail->send();
            }
            catch (Exception $e)
            {
               echo $e->errorMessage();
            }
            catch (\Exception $e)
            {
               echo $e->getMessage();
            }
             "Thank you " .$fname. ". We have sent a confirmation mail, please do check.";

        }
    else
    {
        echo "Error:" .$sql. "<br>" .$conn->error;
    }
}

?>