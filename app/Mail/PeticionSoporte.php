<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PeticionSoporte extends Mailable
{
    use Queueable, SerializesModels;
    protected $mailData;


    public function __construct($mailData)
    {
        $this->mailData =$mailData;
    }

    public function build()
    {

        $mailData = array(
            'fecCreaSop' => $this->mailData['fecCreaSop'],
            'name' => $this->mailData['name'],
            'email'=> $this->mailData['email'],
            'nombre_servicio'=>$this->mailData['nombre_servicio'],
            'ajuntos'=> $this->mailData['ajuntos'],
            'anexo'=> $this->mailData['anexo'],
            'motivo'=> $this->mailData['motivo']
        );

        return $this->view('mails.correopeticion')
            ->with([
                'data'=>$mailData

            ]);
    }
}
