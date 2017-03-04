<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Your Company',
        'product' => 'Your Product',
        'street' => 'PO Box 111',
        'location' => 'Your Town, NY 12345',
        'phone' => '555-555-5555',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        "raaijmakers.maarten@gmail.com"
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::useStripe()->noCardUpFront();

        Spark::freeTeamPlan()
            ->maxTeamMembers(20);

        Spark::noAdditionalTeams();
        
        Spark::identifyTeamsByPath();

        Spark::useRoles([
            'manager' => 'Manager',
            'adviser' => 'Adviser',
        ]);

        Spark::validateUsersWith(function () {
            return [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
                'phone' => 'required|regex:/0\d{9}/',
                'billing_address' => 'required',
                'billing_city' => 'required',
                'billing_state' => 'required',
                'billing_zip' => 'required|regex:/\d{4}[a-zA-Z]{2}/',
                'billing_country' => 'required|alpha_dash',
                'dossier_id' => 'regex:/\d{8}/',
                'vat_id' => 'regex:/\d{9}B\d{2}/',
                'birthdate' => 'required|date_format:j-n-Y'
            ];
        });     

        Spark::createUsersWith(function ($request) {
            $user = Spark::user();

            $data = $request->all();

            $birthdate = explode('-', $data['birthdate']);

            $user->forceFill([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'phone' => $data['phone'],
                'billing_address' => $data['billing_address'],
                'billing_city' => $data['billing_city'],
                'billing_state' => $data['billing_state'],
                'billing_zip' => $data['billing_zip'],
                'billing_country' => $data['billing_country'],
                'birthdate' => Carbon::createFromDate($birthdate[2], $birthdate[1], $birthdate[0], 'Europe/Amsterdam')->toDateTimeString(),                
                'last_read_announcements_at' => Carbon::now('Europe/Amsterdam'),
                'trial_ends_at' => Carbon::now('Europe/Amsterdam')->addDays(Spark::trialDays()),
            ])->save();

            return $user;
        });        
    }
}
