<?php namespace App\Repositories\Eloquent\User;

use App\Repositories\Eloquent\BaseRepositoryAbstract;
use App\User;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepositoryAbstract implements UserRepositoryInterface
{
    /* This class only implements the custom functions to be expected of THIS repository */

    protected $model;
    protected $criteria;

    public function __construct(User $user, Collection $collection)
    {
        $this->model = $user;
        $this->criteria = $collection;
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        // TODO: Implement model() method.
    }
}
