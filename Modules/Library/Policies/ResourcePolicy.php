<?php

namespace Modules\Library\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Library\Models\Resource;

class ResourcePolicy
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

    public function viewAny(?User $user){
        return true;
    }

    public function view(?User $user){
        return true;
    }

    public function create(){
        return true;
    }

    public function update(User $user, Resource $resource){
        return $user->id === $resource->created_by;
    }

    public function delete(User $user, Resource $resource){
        return $user->id === $resource->created_by;
    }
}
