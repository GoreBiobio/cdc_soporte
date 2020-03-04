<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PeticionSoporteHardware extends Mailable
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
            'ajuntos'=> $this->mailData['ajuntos'],
            'anexo'=> $this->mailData['anexo'],
            'motivo'=> $this->mailData['motivo'],
            'hardware'=> $this->mailData['hardware']
        );

        return $this->view('mails.correopeticionHardware')
            ->with([
                'data'=>$mailData

            ]);
    }
}