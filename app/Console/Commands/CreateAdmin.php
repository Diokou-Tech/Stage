<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créer un utilisateur admin';
    /**
     * User model.
     *
     * @var object
     */
    private $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $details = $this->getDetails();

        $admin = $this->user->createSuperAdmin($details);

        $this->display($admin);

    }
     /**
     * Ask for admin details.
     *
     * @return array
     */
    public function getDetails(): array
    {
        $this->info('Veuillez remplir toutes les informations suivantes avec respect des principes pour créer un administrateur.');
        $this->info('Notez quelque part les données entrées !');

        $details['name'] = $this->ask('Name');
        $details['email'] = $this->ask('Email');
        $details['profil'] = 'Administrateur';
        $details['password'] = $this->secret('Password');
        $details['confirm_password'] = $this->secret('Confirm password');

        while (! $this->isValidPassword($details['password'], $details['confirm_password'])) {
            if (! $this->isRequiredLength($details['password'])) {
                $this->error('Le mot de passe doit etre supérieur ou égal à 6 caracteres');
            }

            if (! $this->isMatch($details['password'], $details['confirm_password'])) {
                $this->error('le mot de passe de confirmation ne correspond pas');
            }

            $details['password'] = $this->secret('Password');
            $details['confirm_password'] = $this->secret('Confirm password');
        }

        return $details;
    }
    /**
     * Check if password is vailid
     *
     * @param string $password
     * @param string $confirmPassword
     * @return boolean
     */
    private function isValidPassword(string $password, string $confirmPassword) : bool
    {
        return $this->isRequiredLength($password) &&
        $this->isMatch($password, $confirmPassword);
    }
    /**
     * Display created admin.
     *
     * @param array $admin
     * @return void
     */
    private function display(User $admin) : void
    {
        $headers = ['Name', 'Email', 'profil'];

        $fields = [
            'Name' => $admin->name,
            'email' => $admin->email,
            'profil' => $admin->profil
        ];

        $this->info('Super admin crée avec succès !');
        $this->table($headers, [$fields]);
    }
    /**
     * Check if password and confirm password matches.
     *
     * @param string $password
     * @param string $confirmPassword
     * @return bool
     */
    private function isMatch(string $password, string $confirmPassword) : bool
    {
        return $password === $confirmPassword;
    }
    private function isRequiredLength(string $password) : bool
    {
        return strlen($password) > 6;
    }
}
