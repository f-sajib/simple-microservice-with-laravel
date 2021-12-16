<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:users';

    public function handle()
    {
        $allUsers = DB::connection('registration_db')->table('users')->get();

        DB::setDefaultConnection('mysql');

        $users =  User::query()->get();
        if(count($users) > 0) {
            //TODO need to implement the sync functionality if there is already a list of users exist in the login-service database
        } else {
            foreach ($allUsers as $value) {
                $user = new User();
                $user->name = $value->name;
                $user->email = $value->email;
                $user->password = $value->password;
                $user->save();
            }
        }
    }
}
