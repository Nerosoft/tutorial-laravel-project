<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\mydb;

class DbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 2; $i++) { 
            mydb::create([
                '_id'=>$i !=0 ? 'test'.$i:'admin',
                'Setting'=>[
                    'Language'=>'english',
                    'Direction'=>'ltr'
                ],
                'english'=>[
                    'AllNamesLanguage'=>[
                        'english'=>'English language'
                    ],
                    'Login'=>[
                        'IdReq'=>'id required',
                        'IdInv'=>'id invalid',
                        'UserEmail'=>'error email',
                        'UserEmailRequired'=>'error email required',
                        'UserPassword'=>'Password less than 8 characters',
                        'UserPasswordRequired'=>'error password required',
                        'Title'=>'Login admin',
                        'LabelLoginUser'=>'Login admin',
                        'LabelUserEmail'=>'Email',
                        'LabelUserPassword'=>'Password',
                        'HintUserEmail'=>'Enter email',
                        'HintUserPassword'=>'Enter password',
                        'LabelSettingLanguage'=>'Change language app',
                        'ButtonLanguage'=>'English language',
                        'ButtonSaveLanguage'=>'Save change',
                        'ButtonLoginUser'=>'Login admin',
                        'AdminLogin'=>'seccessfully login admin',
                        'UserPasswordDntMatch'=>'User and Password dos not Match',
                    ],
                    'Register'=>[
                        'IdReq'=>'id required',
                        'IdInv'=>'id invalid',
                        'UserEmail'=>'error email',
                        'UserEmailRequired'=>'error email required',
                        'UserPassword'=>'Password less than 8 characters',
                        'UserPasswordRequired'=>'error password required',
                        'UserRepeatPassword'=>'repeat password less than 8 characters',
                        'UserRepeatPasswordRequired'=>'error repeat password required',
                        'UserPasswordDntMatch'=>'Password does not match',
                        'UserCodePasswordRequired'=>'error code password required',
                        'UserCodePassword'=>'code password less than 8 characters',
                        'LabelLoginUser'=>'Reagister admin',
                        'LabelUserEmail'=>'Email',
                        'LabelUserPassword'=>'Password',
                        'HintUserEmail'=>'Enter email',
                        'HintUserPassword'=>'Enter password',
                        'LabelSettingLanguage'=>'Change language app',
                        'ButtonLanguage'=>'English language',
                        'ButtonSaveLanguage'=>'Save language',
                        'ButtonLoginUser'=>'Register admin',
                        'Title'=>'Register',
                        'LabelUserRepeatPassword'=>'Repeat Password',
                        'LabelUserCodePassword'=>'Code',
                        'HintUserRepeatPassword'=>'Enter Repeat Password',
                        'HintUserCodePassword'=>'Enter code',
                        'UserEmailExist'=>'This email already exists.',
                        'AdminLogin'=>'seccessfully register admin'
                    ],
                ]
            ]);
        }
    }
}
