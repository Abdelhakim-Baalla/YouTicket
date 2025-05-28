<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Interfaces\AdminRepositoryInterface::class,
            \App\Repositories\AdminRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\AgentRepositoryInterface::class,
            \App\Repositories\AgentRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\BaseConnaissanceRepositoryInterface::class,
            \App\Repositories\BaseConnaissanceRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\CategorieKbRepositoryInterface::class,
            \App\Repositories\CategorieKbRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\CommentaireRepositoryInterface::class,
            \App\Repositories\CommentaireRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\CompetenceRepositoryInterface::class,
            \App\Repositories\CompetenceRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\EquipeRepositoryInterface::class,
            \App\Repositories\EquipeRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\EtatRepositoryInterface::class,
            \App\Repositories\EtatRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\FrequenceRepositoryInterface::class,
            \App\Repositories\FrequenceRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\HistoriqueTicketRepositoryInterface::class,
            \App\Repositories\HistoriqueTicketRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\NotificationRepositoryInterface::class,
            \App\Repositories\NotificationRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\PieceJointeRepositoryInterface::class,
            \App\Repositories\PieceJointeRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\PrioriteRepositoryInterface::class,
            \App\Repositories\PrioriteRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\ProjetRepositoryInterface::class,
            \App\Repositories\ProjetRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\RapportRepositoryInterface::class,
            \App\Repositories\RapportRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\RegleEscaladeRepositoryInterface::class,
            \App\Repositories\RegleEscaladeRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\SlaRepositoryInterface::class,
            \App\Repositories\SlaRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\TagRepositoryInterface::class,
            \App\Repositories\TagRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\TicketRepositoryInterface::class,
            \App\Repositories\TicketRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\UtilisateurRepositoryInterface::class,
            \App\Repositories\UtilisateurRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
