<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            EtatsTableSeeder::class,
            PrioritesTableSeeder::class,
            FrequencesTableSeeder::class,
            TypeTicketsTableSeeder::class,
            RolesTableSeeder::class,
            HorairesTravailTableSeeder::class,
            ProjetsTableSeeder::class,
            SlasTableSeeder::class,
            EquipesTableSeeder::class,
            AgentsTableSeeder::class,
            UtilisateursTableSeeder::class,
            TicketsTableSeeder::class,
            CommentairesTableSeeder::class,
            PieceJointesTableSeeder::class,
            NotificationsTableSeeder::class,
            AdminsTableSeeder::class,
            PermissionsTableSeeder::class,
            RolePermissionTableSeeder::class,
            CompetencesTableSeeder::class,
            AgentCompetenceTableSeeder::class,
            ChampPersonnalisesTableSeeder::class,
            CategoriesKbTableSeeder::class,
            BaseConnaissanceTableSeeder::class,
            EvaluationKbTableSeeder::class,
            TagsTableSeeder::class,
            TicketTagTableSeeder::class,
            JoursFeriesTableSeeder::class,
            ProprietairesTableSeeder::class,
            RapportsTableSeeder::class,
            HistoriqueTicketsTableSeeder::class,
            TemplatesTicketsTableSeeder::class,
            MessageriesTableSeeder::class,
            RegleEscaladesTableSeeder::class,
            WorkflowsTableSeeder::class,
            TransitionsTableSeeder::class,
            UserActionHistoriesTableSeeder::class,
            EquipeMembresTableSeeder::class,
            PasswordResetsTableSeeder::class,
            PersonalAccessTokensTableSeeder::class,
            MigrationsTableSeeder::class,
        ]);
    }
}
