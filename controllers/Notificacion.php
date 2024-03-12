<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
* Controlador de Notificaciones 
*
* @autor Rogelio Sanchez
*/
require_once('./lib/google-api-php-client/vendor/autoload.php');
use Google\Client;
use Google\Service\Docs;
class Notificacion extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Notificaciones');
		// $this->load->library('google-api-php-client/vendor/autoload.php');
		// si esta vencida la sesion redirige al login
		$data = $this->session->userdata();
		if(!$data['email']){
			log_message('DEBUG','#TRAZA | #TRAZ-COMP-NOTIFICACIONES | __construct | ERROR  >> Sesion Expirada!!!');
			redirect(DNATO.'main/login');
		}
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(){    
        log_message('DEBUG','#TRAZA | #TRAZ-COMP-NOTIFICACIONES | Notificacion| index()');
        $data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";
        $this->load->model('Notificaciones');
        // $data["image_data"] = $this->Notificaciones->fetch_image();
        $this->load->view('test_view_copy', $data);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
    */
    public function sendPushNotification(){ 
        // $client = new Google\Client();
        // $client->setApplicationName("Client_Library_Examples");
        // $client->setDeveloperKey("AAAAiH5SNuQ:APA91bHnxXwO7ujdaR_nPhAF3mtTTZ6fy6pOq4l45flSnCjTctc1ROuzLjgbU4iKIZe14dgVG2gylTMIcJJq5TYvRJLRKoWRDB0rufVjjicuU2GtHlHySaMMbYlc5G_UOChJ68OHz1iQ");
        // $client->setDeveloperKey("AIzaSyD-D8C5EuzKsYxAfIKJeps-IPT3RUEuQjU");
        
        // $service = new Google\Service\Books($client);
        // $query = 'Henry David Thoreau';
        // $optParams = [
        //   'filter' => 'free-ebooks',
        // ];
        // $results = $service->volumes->listVolumes($query, $optParams);
        
        // foreach ($results->getItems() as $item) {
        //   echo $item['volumeInfo']['title'], "<br /> \n";
        // }
        // putenv('GOOGLE_APPLICATION_CREDENTIALS=/path/to/keyfile.json');
        // $cloud = new Service();
        // $val = $this->validate([
        //     'nId' => 'required',
        // ]);
        $dipositivo = $this->input->post('dispositivo');
        // $noti_id = $this->input->post('noti_id');
        $noti_id = "fbklobO7nfXFAP1eNHAK_K:APA91bHqCSOwHAOd0_QogsWSgtx8YVnS3MOIMh0MvnQxVG_joCqGTnVc2p3STy0orwtXbh8rT1WegZKw45aUdiHDV91p3EdmddP325JnTTOKh99s0GtpHSLp0vC5nd-9jGNDFQqpamm1";

        $title = 'Demo Notification'; 
        $message = 'First codeigniter notification for mobile';
        // $d_type = $this->request->getVar('device_type');
 
        $accesstoken = 'AAAAiH5SNuQ:APA91bHnxXwO7ujdaR_nPhAF3mtTTZ6fy6pOq4l45flSnCjTctc1ROuzLjgbU4iKIZe14dgVG2gylTMIcJJq5TYvRJLRKoWRDB0rufVjjicuU2GtHlHySaMMbYlc5G_UOChJ68OHz1iQ';
 
        // $URL = 'https://fcm.googleapis.com/fcm/send';
        $URL = 'https://fcm.googleapis.com/v1/projects/baupedistribuidora-3eee5/messages:send';
        // El parametro 'to:' es el TOKEN del dispositivo, es decir el generado en la funcion getToken()
            $post_data = '{
                "to" : "' . $noti_id . '",
                "data" : {
                    "body" : "",
                    "title" : "' . $title . '",
                    "type" : "' . $dipositivo . '",
                    "message" : "' . $message . '",
                },
                "notification" : {
                    "body" : "' . $message . '",
                    "title" : "' . $title . '",
                    "type" : "' . $dipositivo . '",
                    "id" : "' . $noti_id . '",
                    "message" : "' . $message . '",
                    "icon" : "new",
                    "sound" : "default"
                },
 
            }';
 
        $crl = curl_init();
 
        $headr = array();
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: Bearer ' . $accesstoken;
        curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($crl, CURLOPT_URL, $URL);
        curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);
 
        curl_setopt($crl, CURLOPT_POST, true);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        $rest = json_decode(curl_exec($crl));
        log_message("DEBUG","#TRAZA | #TRAZ-COMP-NOTIFICACIONES | Notificacion >>>>>> respuesta servicio : ".$rest); 
        if ($rest->error->status === 'UNAUTHENTICATED') {
            $result_noti = 0;
            $rsp['status'] = false;
            $rsp['msg'] = "Errorsito perri";
        } else {
            $result_noti = 1;
            $rsp['status'] = true;
            $rsp['msg'] = "Todo correcto";
        }
        echo json_encode($rsp);
    }

    function haceAlgo(){
        $client = new Google_Client();

        // Authentication with the GOOGLE_APPLICATION_CREDENTIALS environment variable
        $client->useApplicationDefaultCredentials(); 

        // Alternatively, provide the JSON authentication file directly.
        $client->setAuthConfig('./lib/baupedistribuidora-3eee5-7ea477122da1.json');

        // Add the scope as a string (multiple scopes can be provided as an array)
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        // Returns an instance of GuzzleHttp\Client that authenticates with the Google API.
        //El token se genera luego del ->post y se encuentra en httpClient->config->handler->stack[4][0]->tokenCallback->this->token->access_token
        $httpClient = $client->authorize();

        // Your Firebase project ID
        $project = "baupedistribuidora-3eee5";

        // Creates a notification for subscribers to the debug topic
        $message = [
            "message" => [
                "topic" => "algo",
                "notification" => [
                    "body" => "This is an FCM notification message!",
                    "title" => "FCM Message",
                ]
            ]
        ];

        // Send the Push Notification - use $response to inspect success or errors
        //$response = $httpClient->post("https://fcm.googleapis.com/v1/projects/{$project}/messages:send", ['json' => $message]);
        // $respuesta['status'] = $respose->statusCode; privada
        // $respuesta['message'] = $response->reasonPhrase;privada
        echo json_encode('Respuesta');
    }

    public function image_upload()  
    {  
        $data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";  
       $this->load->model('main_model');  
       $data["image_data"] = $this->main_model->fetch_image();   
        $this->load->view('image_upload', $data);  
    }

    public function ajax_upload_old()  
    {
        log_message("DEBUG","#TRAZA | #TRAZ-COMP-NOTIFICACIONES | ajax_upload >>>>>> file: ".$_FILES["image_file"]["name"]); 
        if(isset($_FILES["image_file"]["name"])){

            $config['upload_path'] = 'upload/';  
            $config['allowed_types'] = 'jpg|jpeg|png|gif';  
            $this->load->library('upload', $config);  
            if(!$this->upload->do_upload('image_file')){

                echo $this->upload->display_errors();  
            }else{  
                $data = $this->upload->data();  
                $config['image_library'] = 'gd2';  
                $config['source_image'] = './upload/'.$data["file_name"];  
                $config['create_thumb'] = FALSE;  
                $config['maintain_ratio'] = FALSE;  
                $config['quality'] = '80%';  
                $config['width'] = 100;  
                $config['height'] = 100;  
                $config['new_image'] = './upload/'.$data["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize();  
                $this->load->model('Notificaciones');  
                $image_data = array(  
                    'name'          =>     $data["file_name"]  
                );  
                
                $this->Notificaciones->insert_image($image_data);      
                echo $this->Notificaciones->fetch_image();  
                     //echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
                }  
           }  
      }  
    public function ajax_upload(){
        log_message("DEBUG","#TRAZA | #TRAZ-COMP-NOTIFICACIONES | ajax_upload >>>>>> file: ".$_FILES["image"]["name"]); 
        if(isset($_FILES["image"]["name"])){

            // $config['upload_path'] = 'upload/';  
            // $config['allowed_types'] = 'jpg|jpeg|png|gif';  
            // $this->load->library('upload', $config);
            // if(!$this->upload->do_upload('image')){

            //     echo $this->upload->display_errors();  
            // }else{
                // $data = $this->upload->data();
                // $config['image_library'] = 'gd2';  
                // $config['source_image'] = './upload/'.$data["file_name"];  
                // $config['create_thumb'] = FALSE;  
                // $config['maintain_ratio'] = FALSE;  
                //$config['quality'] = '80%';  
                //$config['width'] = 100;  
                //$config['height'] = 100;  
                // $config['new_image'] = './upload/'.$data["file_name"];  
                // $this->load->library('image_lib', $config);
                // $this->image_lib->resize();
                // $this->load->model('Notificaciones');
                $image_data = array(  
                    'name'  => $_FILES["image"]["name"],
                    'image' => base64_encode(file_get_contents($_FILES['image']['tmp_name']))
                );  
                
                $this->Notificaciones->insert_image($image_data);
                // echo $this->Notificaciones->fetch_image();
                echo json_encode(array('status' => true));
                //echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
            // }
        }
    }

}