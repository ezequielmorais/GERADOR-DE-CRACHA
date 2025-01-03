<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Symfony\Component\VarDumper\VarDumper;


use Illuminate\Support\Facades\Auth;

class AutenticaADController extends Controller
{
    public function index()
    {

        return view('welcome');
    }

    public function validaUsuarioADApp(Request $request)
    {


        $usuario = $request->nome;
        $senha = urlencode($request->senha);
        $client = new \GuzzleHttp\Client();
        // Este primeiro método é responsável pela criptografia da senha.
        try {

            $response = $client->request('GET', "http://sn-iis-02.sistemafibra.local/fibraseguranca/api/Usuario/RetornarDadosCripto?UserName=$usuario&Password=$senha", [
                'form_params' => [
                    'senha' => $senha,
                ],
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $responseData = json_decode($response->getBody()->getContents(), true);
            } else {
                // Manipule outros códigos de status HTTP conforme necessário
                return 'Erro ao conectar com a API. Status HTTP: ' . $response->getStatusCode();
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            // Manipule a exceção conforme necessário
            return 'Erro ao conectar com a API: ' . $e->getMessage();
        }

        if ($request->valor == 0) {


            $guidapp = "3BE1CDDE-5C85-4ADC-8617-17850423977E";
            $url = "http://sn-iis-02.sistemafibra.local/fibraseguranca/api/Usuario/ValidarGuidApp?";
            $urlLogin = "{$url}" . http_build_query([
                'usuario' => $usuario,
                'guid_app' => $guidapp,
                'senha' => $responseData,
            ]);

            try {
                if ($responseData == null) {
                    return redirect('/login')->with('login_failed', 'Usuário ou senha incorretos!');
                }
                $response = file_get_contents($urlLogin);
                $userData = json_decode($response, true);
                if ($userData !== null) {
                    // Criar a sessão para o usuário

                    session([
                        'user' => [
                            'nome' => $userData['Nm_usuario'],
                            'usuario' => $userData['Nm_usuario_AD'], // Exemplo: use o nome retornado ou o nome inserido
                            'id' => $userData['Id_usuario'] ?? null, // Exemplo: ID retornado pela API
                            'email' => $userData['Email'] ?? null, // Exemplo: email retornado pela API
                        ]
                    ]);

                    return redirect('/welcome')->with('login_success', 'Bem-vindo, ' .  session('user')['nome']  . '!');
                } else {
                    return redirect('/login')->with('login_failed', 'Usuário ou senha incorretos!');
                }
            } catch (\Exception $e) {

                return redirect('/login')->with('login_failed', 'Usuário ou senha incorretos!');
            }
            // Retornar a resposta ou realizar qualquer processamento adicional com base no resultado.
        }

        return back();
    }

    public function logout(Request $request)
    {
        //aisidnaosdniaosdnaisdnaisjdnd

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
