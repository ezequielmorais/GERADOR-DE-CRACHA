<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class CrachaController extends Controller

{
    public function cracha()
    {
        return view('/cracha');
    }
    public function preview(Request $request)
    {

        // Recupera os dados do formulário
        $nome = $request->input('nome');
        $cargo = $request->input('cargo');
        $matricula = $request->input('matricula');
        $casa = $request->input('casa');


        // Recupera o arquivo de imagem enviado
        $image = $request->file('image');
        // Define o nome da imagem (usando o timestamp para evitar conflitos)
        $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();

        // Define o caminho para salvar a imagem
        $imagePath = 'uploads/images/' . $imageName;

        // Verifica se o diretório 'uploads/images' existe; caso não, cria
        $imageDirectory = public_path('uploads/images');
        if (!file_exists($imageDirectory)) {
            mkdir($imageDirectory, 0775, true);  // Cria o diretório com permissões adequadas
        }

        // Salva a imagem no diretório especificado
        $image->move($imageDirectory, $imageName);

        // Recupera o QR Code
        $qrcodeUrl = $request->input('qrcode_url');

        // Passa os dados para a visualização
        return view('cracha', [
            'nome' => $nome,
            'cargo' => $cargo,
            'matricula' => $matricula,
            'casa' => $casa,
            'imagePath' => $imagePath,  // Caminho da imagem
            'qrcodeUrl' => $qrcodeUrl,
            'imageName' => $imageName,

        ]);
    }

    public function gerarPdf(Request $request)
    {
        // Recupera os dados enviados do formulário
        $nome = $request->input('nome');
        $cargo = $request->input('cargo');
        $matricula = $request->input('matricula');
        $casa = $request->input('casa');
        $qrcodeUrl = $request->input('qrcode_url');
        $imagePath = $request->input('image');  // Caminho da imagem carregada

        $exploded = explode('1:8000/', $imagePath);

        // Se o QR Code estiver em um caminho local, converta para base64
        $qrcodeImage = file_get_contents($qrcodeUrl);
        $qrcodeBase64 = base64_encode($qrcodeImage);
        $tipo =  explode('.', $exploded[1]);



        //cleiton e felipe muito chatos


        $fileSizeKB = filesize($exploded[1]) / 1024;



        $pdf = PDF::loadView('pdf', [
            'nome' => $nome,
            'cargo' => $cargo,
            'matricula' => $matricula,
            'casa' => $casa,
            'imagePath' => $exploded[1], // Caminho da imagem para exibição
            'qrcodeUrl' => $qrcodeBase64,
            'tipo' => $tipo[1], // URL do QR Code em base64
            'tamanho' => $fileSizeKB,
        ]);
        $pdf->getDomPDF()->getOptions()->set('fontDir', public_path('Fonts'));
        $pdf->getDomPDF()->getOptions()->set('defaultFont', 'NeoSansProBlack');
        return $pdf->download($nome . '_Cracha.pdf');
    }
}
