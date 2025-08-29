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
                    'Menu'=>[
                        'SystemLang'=>'Edit my language',          
                        'Home'=>'Home',
                        'Knows'=>'Knows',
                        'Contracts'=>'Contracts',
                        'Patent'=>'Patent',
                        'Receipt'=>'Receipt',
                        'Branches'=>'Branches',
                        'ChangeLanguage'=>'Change language',
                        'TestCultures'=>[
                            'Name'=>'Test cultures',
                            'Item'=>[
                                'Test'=>'Test',
                                'Cultures'=>'Cultures',
                                'Packages'=>'Packages',
                            ]
                        ],
                    ],
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
                    'Admin'=>[
                        'Title'=>'Admin user',
                    ],
                    'AppSettingAdmin'=>[
                        'Offcanvas'=>'Dark offcanvas',
                        'Logout'=>'Logout',
                        'AdminDashboard'=>'Salamatak for medical analysis and radiology',
                        'BranchesCompany'=>'Select branches',
                        'BranchMain'=>'Branch main',
                    ],
                    'TableInfo'=>[
                        'Ssearch'=>'Quick Search:',
                        'InfoEmpty'=>'No records available',
                        'ZeroRecords'=>'No Data Found',
                        'Info'=>'Total',
                        'LengthMenu'=>'records per page',
                        'InfoFiltered'=>'Showing',
                    ],
                    'Branches'=>[
                        'LoadMessage'=>'welcome in branch main',
                        'Active'=>'this branch is used',
                        'BranceRaysNameRequired'=>'Name required',
                        'BranceRaysPhoneRequired'=>'Phone required',
                        'BranceRaysGovernmentsRequired'=>'Governments required',
                        'BranceRaysCityRequired'=>'City required',
                        'BranceRaysStreetRequired'=>'Street required',
                        'BranceRaysBuildingRequired'=>'Building required',
                        'BranceRaysAddressRequired'=>'Address required',
                        'BranceRaysCountryRequired'=>'Country required',
                        'BranceRaysFollowRequired'=>'Follow required',
                        'BranceRaysNameLength'=>'Name less than 3 characters',
                        'BranceRaysPhoneLength'=>'Invalid phone',
                        'BranceRaysGovernmentsLength'=>'Governments less than 3 characters',
                        'BranceRaysCityLength'=>'City less than 3 characters',
                        'BranceRaysStreetLength'=>'Street less than 3 characters',
                        'BranceRaysBuildingLength'=>'Building less than 3 characters',
                        'BranceRaysAddressLength'=>'Address less than 3 characters',
                        'BranceRaysCountryLength'=>'Country less than 3 characters',

                        'ScreenModelDelete'=>'Screen branch delete',
                        'MessageModelDelete'=>'Do you want to delete branch',
                        'ButtonModelDelete'=>'Delete',
                        'Title'=>'branches',
                        'ScreenModelCreate'=>'screen create branch',
                        'ScreenModelEdit'=>'edit branche screen',
                        'ButtonModelCreate'=>'Create new branche',
                        'ButtonModelAdd'=>'Add branch',
                        'ButtonModelEdit'=>'Edit branch',
                        'TableId'=>'Branch id',
                        'TabelEvent'=>'Event',

                        'BranchStreet'=>'Street',
                        'BranchName'=>'Name',
                        'BranchPhone'=>'Phone',
                        'BranchGovernments'=>'Governments',
                        'BranchCity'=>'City',
                        'BranchBuilding'=>'Building',
                        'BranchAddress'=>'Address',
                        'BranchCountry'=>'Country',
                        'BranchFollow'=>'Follow',
                        'BranchRaysName'=>'Enter branch name',
                        'BranchRaysPhone'=>'Enter branch phone',
                        'BranchRaysCountry'=>'Enter branch country',
                        'BranchRaysGovernments'=>'Enter branch governments',
                        'BranchRaysCity'=>'Enter branch city',
                        'BranchRaysStreet'=>'Enter branch street',
                        'BranchRaysBuilding'=>'Enter branch building',
                        'BranchRaysAddress'=>'Enter branch address',
                        'WithRaysOut'=>'Select in rays or out rays',
                        'MessageModelCreate'=>'Seccessfully branch add',
                        'BranceRaysFollowValue'=>'error in value',
                        'IdIsReq'=>'branch id required',
                        'IdIsInv'=>'branch id invalid',
                        'MessageModelEdit'=>'Seccessfully branch edit',
                        'BranchesChange'=>'Seccessfully change branch',
                        'Delete'=>'Seccessfully delete branch',
                    ],
                    'SelectBranchBox'=>[
                        'WithoutRays'=>'Without rays',
                        'WithRays'=>'With rays',
                    ],
                ]
            ]);
        }
    }
}
