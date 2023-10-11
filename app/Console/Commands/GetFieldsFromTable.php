<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class GetFieldsFromTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'table-fields';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $models = $this->getModels();

        foreach ($models as $class){
            $model = new $class();
            echo "'".$class."' start: \n";
            $this->printColumns($model);
            echo "'".$class."' end; \n\n";
        }
    }

    function printColumns(Model $model): void
    {
        $table = $model->getTable();
        $columns = Schema::getColumnListing($table);
        foreach ($columns as $column){
            if($column === $model->getKeyName()
                || $column === $model->getUpdatedAtColumn()
                || $column === $model->getCreatedAtColumn()
                || (method_exists($model, 'getDeletedAtColumn') && $column === $model->getDeletedAtColumn())
            ){
                continue;
            }
            echo "'".$column."', \n";
        }
    }

    function getModels(): Collection
    {
        $models = collect(File::allFiles(app_path()))
            ->map(function ($item) {
                $path = $item->getRelativePathName();
                $class = sprintf('\%s%s',
                    Container::getInstance()->getNamespace(),
                    strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));

                return $class;
            })
            ->filter(function ($class) {
                $valid = false;

                if (class_exists($class)) {
                    $reflection = new \ReflectionClass($class);
                    $valid = $reflection->isSubclassOf(Model::class) &&
                        !$reflection->isAbstract();
                }

                return $valid;
            });

        return $models->values();
    }
}
