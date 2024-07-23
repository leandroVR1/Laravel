<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class SlackController extends Controller
{
    public function sendUserInfo($userId)
    {
        // Obtener el usuario de la base de datos
        $user = User::find($userId);

        // Verificar si el usuario existe
        if (!$user) {
            return response('User not found!', 404);
        }

        // Formatear el mensaje
        $message = sprintf(
            "User Information:\nName: %s\nEmail: %s\nCreated At: %s",
            $user->name,
            $user->email,
            $user->created_at
        );

        // URL del webhook de Slack
        $webhookUrl = 'https://hooks.slack.com/services/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';

        // Enviar el mensaje a Slack
        $response = Http::post($webhookUrl, [
            'text' => $message,
        ]);

        // Verificar el estado de la respuesta
        return $response->status() == 200 ? 'Message sent successfully!' : 'Failed to send message.';
    }

    public function handleSlackEvents(Request $request)
    {
        // Verificar el reto de Slack
        if ($request->has('challenge')) {
            return response($request->get('challenge'), 200);
        }

        // Manejar otros eventos aquí
        // Ejemplo: Registro de eventos en el log
        \Log::info('Evento de Slack recibido:', $request->all());

        return response('Evento recibido', 200);
    }
}


/* namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SlackController extends Controller
{
    public function sendMessage()
    {
        $webhookUrl = 'https://hooks.slack.com/services/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';
        
        $response = Http::post($webhookUrl, [
            'text' => 'bienvenidos.',
        ]);

        return $response->status() == 200 ? 'Message sent successfully!' : 'Failed to send message.';
    }
}
*/


