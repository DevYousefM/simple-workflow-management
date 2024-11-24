<?php

namespace Modules\Workflow\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Workflow\Services\WorkflowService;

class WorkflowProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->bind(WorkflowService::class, function () {
            return new WorkflowService();
        });
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
