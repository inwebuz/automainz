<?php

namespace App\Listeners;

use App\Interfaces\ModelSavedInterface;
use App\Models\Product;
use App\Models\Search;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class GenerateModelSearchText
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ModelSavedInterface $event
     * @return void
     */
    public function handle(ModelSavedInterface $event)
    {
        $model = $event->getModel();
        $model->searches()->delete();
        $model->load('translations');

        $baseClassName = class_basename(get_class($model));

        if (isset($model->status) && $model->status != 1) {
            return;
        }

        if ($baseClassName == 'Car') {
            $searchBody = $this->carSearchBody($model);
        } else {
            $searchBody = '';
            if (!empty($model->name)) {
                $searchBody .= $model->name . PHP_EOL;
            }
            if (!empty($model->description)) {
                $searchBody .= $model->description . PHP_EOL;
            }
            // if (!empty($model->body)) {
            //     $searchBody .= strip_tags($model->body) . PHP_EOL;
            // }
            if (!empty($model->first_name)) {
                $searchBody .= $model->first_name . PHP_EOL;
            }
            if (!empty($model->last_name)) {
                $searchBody .= $model->last_name . PHP_EOL;
            }

            // localization
            $defaultLocale = config('voyager.multilingual.default');
            foreach (config('laravellocalization.supportedLocales') as $key => $value) {
                if ($key != $defaultLocale) {
                    $texts = [];
                    $texts[] = $model->getTranslatedAttribute('name', $key);
                    $texts[] = $model->getTranslatedAttribute('description', $key);
                    // $texts[] = $model->getTranslatedAttribute('body', $key);
                    $texts[] = $model->getTranslatedAttribute('first_name', $key);
                    $texts[] = $model->getTranslatedAttribute('last_name', $key);
                    foreach ($texts as $text) {
                        if ($text) {
                            $searchBody .= $text . PHP_EOL;
                        }
                    }
                }
            }
        }

        $search = new Search();
        $search->body = $searchBody;

        $model->searches()->save($search);
    }

    private function carSearchBody($model)
    {
        $searchBody = '';
        if (!$model->isActive()) {
            return $searchBody;
        }
        $make = $model->make;
        $carModel = $model->carModel;
        $carModification = $model->carModification;
        $features = $model->features;
        $specifications = $model->specifications;
        if ($make) {
            $make->load('translations');
        }
        if ($carModel) {
            $carModel->load('translations');
        }
        if ($carModification) {
            $carModification->load('translations');
        }
        if ($features) {
            $features->load('translations');
        }
        if ($specifications) {
            $specifications->load('translations');
        }
        // $categories = $model->categories()->withTranslations()->get();
        $searchBody .= $model->name . PHP_EOL;
        $searchBody .= $model->description . PHP_EOL;
        $searchBody .= ($make->name ?? '') . PHP_EOL;
        $searchBody .= ($carModel->name ?? '') . PHP_EOL;
        $searchBody .= ($carModification->name ?? '') . PHP_EOL;
        foreach ($features as $feature) {
            $searchBody .= $feature->name . PHP_EOL;
        }
        foreach ($specifications as $specification) {
            $searchBody .= $specification->name . PHP_EOL;
        }

        $defaultLocale = config('voyager.multilingual.default');

        foreach (config('laravellocalization.supportedLocales') as $key => $value) {
            if ($key != $defaultLocale) {
                $searchBody .= $model->getTranslatedAttribute('name', $key) . PHP_EOL;
                $searchBody .= $model->getTranslatedAttribute('description', $key) . PHP_EOL;

                if ($make) {
                    $searchBody .= $make->getTranslatedAttribute('name', $key) . PHP_EOL;
                }
                if ($carModel) {
                    $searchBody .= $carModel->getTranslatedAttribute('name', $key) . PHP_EOL;
                }
                if ($carModification) {
                    $searchBody .= $carModification->getTranslatedAttribute('name', $key) . PHP_EOL;
                }
                foreach ($features as $feature) {
                    $searchBody .= $feature->getTranslatedAttribute('name') . PHP_EOL;
                }
                foreach ($specifications as $specification) {
                    $searchBody .= $specification->getTranslatedAttribute('name') . PHP_EOL;
                }
            }
        }
        return $searchBody;
    }
}
