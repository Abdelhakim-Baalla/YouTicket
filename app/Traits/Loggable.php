<?php

namespace App\Traits;

use App\Models\UserActionHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait Loggable
{
    public static function bootLoggable()
    {
        static::created(function (Model $model) {
            self::logAction('create', $model);
        });

        static::updated(function (Model $model) {
            self::logAction('update', $model);
        });

        static::deleted(function (Model $model) {
            self::logAction('delete', $model);
        });
    }

    protected static function logAction(string $action, Model $model)
    {
        $user = Auth::user();
        
        $oldValues = $action === 'update' ? $model->getOriginal() : null;
        $newValues = $action !== 'delete' ? $model->getAttributes() : null;

        UserActionHistory::create([
            'user_id' => $user ? $user->id : null,
            'action' => $action,
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'old_values' => $oldValues,
            'new_values' => $newValues,
            'description' => self::getActionDescription($action, $model),
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
        ]);
    }

    protected static function getActionDescription(string $action, Model $model): string
    {
        $modelName = class_basename($model);
        
        return match($action) {
            'create' => "Création d'un nouveau {$modelName}",
            'update' => "Mise à jour du {$modelName} #{$model->id}",
            'delete' => "Suppression du {$modelName} #{$model->id}",
            default => "Action inconnue sur {$modelName} #{$model->id}",
        };
    }
}