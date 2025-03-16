<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait HasUserStamp
{
    public static function bootHasUserStamp()
    {
        $user = Auth::user();
        // updating created_by and updated_by when model is created
        static::creating(function ($model) use ($user) {
            if ($user) {
                $model->created_by = $user->id;
                $model->updated_by = $user->id;
            }
            if (isset($model::$hasPublish) && $model::$hasPublish) {
                if ($model->publish_at == null) {
                    $model->publish_at = todayWithFormat('Y-m-d');
                }
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) use ($user) {
            if ($user) {
                $model->updated_by = $user->id;
            }
        });

    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedby()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }


}
