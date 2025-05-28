<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Repositories\Interfaces\NotificationRepositoryInterface;

class NotificationRepository implements NotificationRepositoryInterface
{
    public function tous()
    {
        return Notification::all();
    }
    
    public function trouver($id)
    {
        return Notification::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Notification::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $notification = $this->trouver($id);

        if($notification)
        {
            return $notification->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $notification = $this->trouver($id);

        if($notification)
        {
            return $notification->delete();
        }
        return false;
    }
    
}