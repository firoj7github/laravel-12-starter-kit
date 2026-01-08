<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $insertData = [];

        foreach ($this->permissions() as $attribute => $keywords) {
            $insertData[] = [
                'attribute'  => $attribute,
                'keywords'   => json_encode($keywords),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Bulk insert
        Permission::insert($insertData);
    }

    private function permissions(): array
    {
        return [
            'dashboard'          => ['read' => 'dashboard_read'],
            'users'              => [
                'read' => 'user_read',
                'create' => 'user_create',
                'update' => 'user_update',
                'delete' => 'user_delete',
                'permission_update' => 'permission_update'
            ],
            'roles'              => [
                'read' => 'role_read',
                'create' => 'role_create',
                'update' => 'role_update',
                'delete' => 'role_delete'
            ],
            'language'           => [
                'read' => 'language_read',
                'create' => 'language_create',
                'update' => 'language_update',
                'delete' => 'language_delete',
                'phrase' => 'language_phrase_update'
            ],
            'general_settings'   => ['read' => 'general_settings_read', 'update' => 'general_settings_update'],
            'storage_settings'   => ['read' => 'storage_settings_read', 'update' => 'storage_settings_update'],
            'recaptcha_settings' => ['read' => 'recaptcha_settings_read', 'update' => 'recaptcha_settings_update'],
            'mail_settings'      => ['read' => 'mail_settings_read', 'update' => 'mail_settings_update'],
            'todo'               => [
                'read' => 'todo_read',
                'create' => 'todo_create',
                'update' => 'todo_update',
                'delete' => 'todo_delete'
            ],
            'activity_logs'      => [
                'read' => 'activity_logs_read',
                'view' => 'activity_logs_view',
                'login_activity_read' => 'login_activity_read'
            ],
            'database_backup'    => ['read' => 'database_backup_read'],
            'route'              => ['read' => 'route_read', 'search' => 'route_search'],
        ];
    }
}
