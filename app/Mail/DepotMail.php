<?php

namespace App\Mail;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DepotMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = Auth::user();
        $etud = Etudiant::where('user_id', '=', Auth::user()->id)->first();
        $responsable = Classe::find($etud->classe->id)->enseignant;
        return $this->view('emails.depot',['user' => $user,'responsable' => $responsable]);
    }
}
