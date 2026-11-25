<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\IncomingRequest;
class CaptchaFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        /** @var IncomingRequest $request */
        // hanya cek saat form dikirim
        if (strtolower($request->getMethod()) !== 'post') {
            return;
        }

        $token = $request->getPost('g-recaptcha-response');

        if (empty($token)) {
            return $this->gagal();
        }

        $client   = \Config\Services::curlrequest();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret'   => env('RECAPTCHA_SECRET'),
                'response' => $token,
                'remoteip' => $request->getIPAddress(),
            ],
            'http_errors' => false,
        ]);

        $result = json_decode($response->getBody(), true);
        if (! ($result['success'] ?? false)) {
            return $this->gagal();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }

    private function gagal()
    {
        return redirect()->back()->withInput()
            ->with('error', 'Verifikasi Terlebih dahulu.');
    }
}