<?php

namespace Emptynick\VoyagerDashboard;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use Voyager\Admin\Classes\{MenuItem, UserMenuItem};
use Voyager\Admin\Contracts\Plugins\GenericPlugin;
use Voyager\Admin\Contracts\Plugins\Features\Provider\{MenuItems, JS, ProtectedRoutes};
use Voyager\Admin\Manager\Menu as MenuManager;

class VoyagerDashboard implements GenericPlugin, ProtectedRoutes, MenuItems, JS
{
    public $name = 'Voyager dashboard manager';
    public $description = 'Manage Voyagers dashboard';
    public $repository = 'emptynick/voyager-dashboard-manager';
    public $website = 'https://github.com/emptynick/voyager-dashboard-manager';

    public function provideProtectedRoutes(): void
    {
        Inertia::setRootView('voyager::app');

        Route::get('dashboard-manager', function () {
            return Inertia::render('voyager-dashboard-manager', [
                
            ])->withViewData('title', 'Dashboard manager');
        })->name('voyager-dashboard-manager');
    }

    public function provideJS(): string
    {
        return file_get_contents(realpath(dirname(__DIR__, 1).'/dist/voyager-dashboard-manager.umd.js'));
    }

    public function provideMenuItems(MenuManager $menumanager): void
    {
        $menumanager->addItems(
            (new UserMenuItem('Dashboard manager'))->route('voyager.voyager-dashboard-manager')
        );
    }
}
