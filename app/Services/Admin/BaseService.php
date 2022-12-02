<?php

namespace App\Services\Admin;

use App\Exceptions\BusinessLogicException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Closure;
use Eloquent;
use Throwable;

abstract class BaseService
{
    protected string $exceptionMessage;

    public function __construct()
    {
        $this->exceptionMessage = '';
    }

    protected function makeTransaction(Closure $callback)
    {
        try {
            DB::beginTransaction();

            $result = $callback();

            DB::commit();

            return $result;

        } catch (Throwable $ex) {

            $this->exceptionMessage = $ex->getMessage();

            try {
                DB::rollBack();
            } catch (Throwable $ex) {
                $this->exceptionMessage = $ex->getMessage();
            }

            return false;
        }
    }

    protected function baseStore(string $modelClass, array $data): Model
    {
        return $this->makeTransaction(function () use ($modelClass, $data) {

            if (!$modelClass instanceof Eloquent) {
                throw new BusinessLogicException(__('exception.wrong_instance'));
            }

            if (!$model = $modelClass::create($data)) {
                throw new BusinessLogicException(__('exception.store_error'));
            }

            return $model;
        });
    }

    protected function baseUpdate(Model $model, array $data): Model
    {
        return $this->makeTransaction(function () use ($model, $data) {

            if (!$model->update($data)) {
                throw new BusinessLogicException(__('exception.update_error'));
            }

            return $model;
        });
    }

    protected function baseDelete(Model $model): Model
    {
        return $this->makeTransaction(function () use ($model) {

            if (!$model->delete()) {
                throw new BusinessLogicException(__('exception.delete_error'));
            }

            return $model;
        });
    }

    protected function baseRestore(Model $model): Model
    {
        return $this->makeTransaction(function () use ($model) {

            if (!method_exists($model, 'restore')) {
                throw new BusinessLogicException(__('exception.method_not_exists'));
            }

            if (!$model->restore()) {
                throw new BusinessLogicException(__('exception.restore_error'));
            }

            return $model;
        });
    }

    protected function baseDestroy(Model $model): bool
    {
        return $this->makeTransaction(function () use ($model) {

            if (!method_exists($model, 'forceDelete')) {
                throw new BusinessLogicException(__('exception.method_not_exists'));
            }

            if (!$model->forceDelete()) {
                throw new BusinessLogicException(__('exception.destroy_error'));
            }

            return true;
        });
    }
}
