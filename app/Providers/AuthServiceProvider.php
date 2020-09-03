<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Applicants gates
        Gate::define('add-applicant-score', function ($user) {
            return collect(['super', 'intermediate'])->contains($user->admin->permission_level);
        });

        Gate::define('delete-all-applicants', function ($user) {
            return collect(['super'])->contains($user->admin->permission_level);
        });

        Gate::define('edit-course', function ($user) {
            return collect(['super', 'intermediate'])->contains($user->admin->permission_level);
        });

        Gate::define('delete-course', function ($user) {
            return collect(['super'])->contains($user->admin->permission_level);
        });

        Gate::define('edit-department', function ($user) {
            return collect(['super', 'intermediate'])->contains($user->admin->permission_level);
        });

        Gate::define('delete-department', function ($user) {
            return collect(['super'])->contains($user->admin->permission_level);
        });

        Gate::define('delete-admin', function ($user, Admin $admin) {
            if ($user->admin->permission_level != 'super') {
                return false;
            }
            return $admin->permission_level != 'super';
        });
    }
}
