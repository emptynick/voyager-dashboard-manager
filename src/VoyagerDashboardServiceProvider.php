<?php

namespace Emptynick\VoyagerDashboard;

use Illuminate\Support\ServiceProvider;
use Voyager\Admin\Manager\Plugins as PluginManager;

class VoyagerDashboardServiceProvider extends ServiceProvider
{
    public function boot(PluginManager $pluginmanager)
    {
        $pluginmanager->addPlugin(\Emptynick\VoyagerDashboard\VoyagerDashboard::class);
    }
}