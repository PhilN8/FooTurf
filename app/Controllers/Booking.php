<?php

namespace App\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Payment;

class Booking extends BaseController
{
    public function index()
    {
        return view('frontend/booking');
    }

    public function book()
    {
        helper(['form']);

        $game_start = $this->request->getVar('game_start');
        $game_end = $this->request->getVar('game_end');
        $game_date = $this->request->getVar('game_date');

        $gameDetails = [
            'game_date' => $game_date,
            'game_start' => $game_start,
            // 'game_end' => $game_end,
        ];
        $check = (new Game())->CheckIfGameExists($gameDetails);

        if ($check === TRUE)
            return $this->response->setJSON(['message' => 3]);

        $team1 = $this->request->getVar('team1');
        $team2 = $this->request->getVar('team2');

        $rules = [
            'team1' => 'is_unique[tbl_teams.team_name]',
        ];

        if ($this->validate($rules)) (new Team())->insert(['team_name' => $team1]);

        $rules = [
            'team2' => 'is_unique[tbl_teams.team_name]',
        ];

        if ($this->validate($rules)) (new Team())->insert(['team_name' => $team2]);

        $gameDetails = [
            'team1_name' => $team1,
            'team2_name' => $team2,
            'game_date' => $game_date,
            'game_start' => $game_start,
            'game_end' => $game_end,
        ];

        $phone = intval("254" . $this->request->getVar('phone'));
        $paycode = $this->pay();

        $game_id = (new Game())->insert(
            $gameDetails,
            true
        );
        (new Payment)->insert([
            'game_id' => $game_id,
            'no_of_hours' => $this->request->getVar('no_of_hours'),
            'total_cost' => $this->request->getVar('total_cost'),
            'phone_number' => $this->request->getVar('phone'),
            'pay_code' => $paycode ?? null
        ]);

        return $this->response->setJSON([
            'game_id' => $game_id,
            'message' => 1
        ]);
    }

    public function redirect()
    {
        return view('frontend/redirect');
    }

    public function game()
    {
        helper(['form']);
        $id = $this->request->getVar('game_id');

        $gameDetails = (new Game)->select('*')->where('game_id', $id)->first();

        $gameDetails['created_at'] = substr($gameDetails['created_at'], 0, 16);
        $gameDetails['game_start'] = substr($gameDetails['game_start'], 0, 5);
        $gameDetails['game_end'] = substr($gameDetails['game_end'], 0, 5);

        return $this->response->setJSON($gameDetails);
    }

    public function pay($phone = null, $amount = null)
    {
        $consumer_key = getenv('CONSUMER_KEY');
        $consumer_secret = getenv('CONSUMER_SECRET');
        $Business_Code = '174379';
        // $passkey = getenv('PASS_KEY');
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $Type_of_Transaction = 'CustomerPayBillOnline';
        $Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $phone_number = $phone ?? 254758474832;
        $OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $total_amount = $_POST['amount'] ?? 1;
        $CallBackURL = 'https://2f50f430.ngrok.io/callback.php?key=' . $passkey;
        $Time_Stamp = date("Ymdhis");
        $password = base64_encode($Business_Code . $passkey . $Time_Stamp);

        $curl_Tranfer = curl_init();
        curl_setopt($curl_Tranfer, CURLOPT_URL, $Token_URL);
        $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
        curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
        curl_setopt($curl_Tranfer, CURLOPT_HEADER, false);
        curl_setopt($curl_Tranfer, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_Tranfer, CURLOPT_SSL_VERIFYPEER, false);
        $curl_Tranfer_response = curl_exec($curl_Tranfer);

        $token = json_decode($curl_Tranfer_response)->access_token;

        $curl_Tranfer2 = curl_init();
        curl_setopt($curl_Tranfer2, CURLOPT_URL, $OnlinePayment);
        curl_setopt($curl_Tranfer2, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));

        $curl_Tranfer2_post_data = [
            'BusinessShortCode' => $Business_Code,
            'Password' => $password,
            'Timestamp' => $Time_Stamp,
            'TransactionType' => $Type_of_Transaction,
            'Amount' => $total_amount,
            'PartyA' => $phone_number,
            'PartyB' => $Business_Code,
            'PhoneNumber' => $phone_number,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => 'FooTurf',
            'TransactionDesc' => 'Game Payment',
        ];

        $data2_string = json_encode($curl_Tranfer2_post_data);

        curl_setopt($curl_Tranfer2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_Tranfer2, CURLOPT_POST, true);
        curl_setopt($curl_Tranfer2, CURLOPT_POSTFIELDS, $data2_string);
        curl_setopt($curl_Tranfer2, CURLOPT_HEADER, false);
        curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYHOST, 0);
        $curl_Tranfer2_response = json_decode(curl_exec($curl_Tranfer2));

        // echo json_encode($curl_Tranfer2_response, JSON_PRETTY_PRINT);
        return $curl_Tranfer2_response->CheckoutRequestID ?? ("ws_CO_" . $Time_Stamp . "758474832");
    }
}
