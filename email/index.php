 <?php
    if(!empty($_POST))
    {
        $name = $_POST['name'];

        /*/ this is the email we get from visitors*/
        $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

        /*//-->MUST BE 'https://';*/
        header("Content-type: application/json");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Origin: *.p3.marketing");
        header("AMP-Access-Control-Allow-Source-Origin: *.p3.marketing");


        /*/ For Sending Error Use this code /*/
        if(!mail("peter@p3.marketing" , "Test submission" , "email: ". $_POST['email'] ."\n\n Nachricht: ". $_POST['enquiry'] ."" , "From: AGENTUR\n ")){
            header("HTTP/1.0 412 Precondition Failed", true, 412);

            echo json_encode(array('errmsg'=>'There is some error while sending email!'));
            die();
        }
        else
        {
            /*/--Assuming all validations are good here--*/
            header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");   

                echo json_encode(array('successmsg'=>$_POST['name'].'My success message. [It will be displayed shortly(!) if with redirect]'));
            die();
        }
    }?>