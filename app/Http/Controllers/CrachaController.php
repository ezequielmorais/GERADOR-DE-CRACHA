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
    public function gerarPdf(Request $request)
    {
        dd($request->all());
        $validated = $request->validate([
            'nome' => 'required|string',
            'cargo' => 'required|string',
            'matricula' => 'required|string',
            'casa' => 'required|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Processar a imagem carregada
        $imagePath = null;
        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $imagePath = $file->storeAs('public/uploads', $file->hashName());
            $imagePath = Storage::url($imagePath);
        }

        // Gerar o QR Code URL
        $unidade = match (true) {
            str_starts_with($validated['casa'], 'FIBRA') => 3,
            str_starts_with($validated['casa'], 'SENAI') => 2,
            str_starts_with($validated['casa'], 'SESI') => 1,
            str_starts_with($validated['casa'], 'IEL') => 4,
            default => 0,
        };

        $concatenado = "{$unidade}-{$validated['matricula']}-{$validated['nome']}";
        $base64String = base64_encode($concatenado);
        $qrcodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={$base64String}";

        // Renderizar o PDF com a view
        $pdf = Pdf::loadView('pdf.template', [
            'dados' => $validated,
            'qrcodeUrl' => $qrcodeUrl,
            'imagePath' => $imagePath,
        ]);

        return $pdf->download('arquivo.pdf');
    }
}
