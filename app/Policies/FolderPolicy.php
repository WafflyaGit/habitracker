<?php

namespace App\Policies;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FolderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param User $user
     * @param Folder $folder
     * @return bool
     */
    public function update(User $user, Folder $folder): bool
    {
        return $user->hasFolder($folder);
    }

    /**
     * @param User $user
     * @param Folder $folder
     * @return bool
     */
    public function delete(User $user, Folder $folder): bool
    {
        return $user->hasFolder($folder);
    }
}
