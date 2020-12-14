<?php
class Transactions extends Controller
{

    public function sngy()
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();


        $param = new stdClass();
        $object = new stdClass();

        $param->type = 'SNGY';


        $object->name = "fetch_unique_transaction";
        $object->param = $param;

        $form_data  = json_encode($object);



        $response = curl_with_auth($form_data);

        // print_r($response);

        $res = json_decode($response, true);

        $this->view('dashboard/transaction/sngy', $res['response']['data']);
        // $this->view('dashboard/transactions');
    }


    public function ngn()
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();


        $param = new stdClass();
        $object = new stdClass();

        $param->type = 'NGN';


        $object->name = "fetch_unique_transaction";
        $object->param = $param;

        $form_data  = json_encode($object);



        $response = curl_with_auth($form_data);

        // var_dump($response);

        $res = json_decode($response, true);

        $this->view('dashboard/transaction/ngn', $res['response']['data']);
        // $this->view('dashboard/transactions');
    }

}
