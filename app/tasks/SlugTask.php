<?php

use Phalcon\Cli\Task;

class SlugTask extends Task
{
    public function mainAction($locale)
    {
        $locale = (isset($locale[0]) ? $locale[0] : $this->getDI()->get('config')->params->locale);
        $localeCollection = $this->getDI()->get('config')->params->locales->toArray();

        if (!in_array($locale, $localeCollection)) {
            exit ("Locale doesn't exist" . PHP_EOL);
        }

        $executedSave = $executedUpdate = 0;

        $entityTypeCollection = [
            'city' => [
                'field' => 'slug',
                'entity' => City::class,
            ],
            'food_category' => [
                'field' => 'slug',
                'entity' => FoodCategory::class,
            ],
            'page' => [
                'field' => 'slug',
                'entity' => StaticContent::class,
            ],
            'place' => [
                'field' => 'slug',
                'entity' => Place::class,
            ],
            'kitchen' => [
                'field' => 'slug',
                'entity' => Kitchen::class,
            ]
        ];


        $this->db->query('UPDATE common_slug set type = "page" WHERE type = "text"')->execute();

        $slugCollection = CommonSlug::find(['is_active = 1 AND lang_id = "' . $locale . '"']);

        if ($locale == $this->getDI()->get('config')->params->locale) {
            foreach ($slugCollection as $slug) {
                $entity = $entityTypeCollection[$slug->type]['entity'];
                $entity = $entity::findFirst($slug->item_id);
                $setter = 'set' . ucfirst($entityTypeCollection[$slug->type]['field']);
                $getter = 'get' . ucfirst($entityTypeCollection[$slug->type]['field']);

                if (is_object($entity)) {
                    if ($entity->{$getter}() != $slug->name AND $entity->{$getter}() == NULL) {
                        $entity->{$setter}($slug->name);
                        $entity->save();
                        $executedSave++;
                    }
                }
            }
        } else {
            foreach ($slugCollection as $slug) {
                $localization = new Localization();

                $entity = $entityTypeCollection[$slug->type]['entity'];
                $entity = $entity::findFirst($slug->item_id);

                if (is_object($entity)) {

                    $isLocalized = null;
                    $localization->setSource($entity->LOCALIZED_TABLE);
                    $isLocalized = $this->db->query('Select id,content FROM ' . $entity->LOCALIZED_TABLE . '  WHERE object_id = :objectId AND locale = :locale AND field = "slug"', ['objectId' => $entity->id, 'locale' => $locale])->fetch() ;

                    if ($isLocalized && $isLocalized['content'] != $slug->name) {
                        try {
                            $this->db->query('UPDATE '. $entity->LOCALIZED_TABLE .' set content = :content WHERE id = :id', [
                                'content' => $slug->name,
                                'id' => $isLocalized['id']
                            ])->execute();

                        } catch (Exception $e)
                        {
                            echo 'Updating error: ' . $e->getMessage(). PHP_EOL;
                        } finally { $executedUpdate++; }
                    } elseif (!$isLocalized) {
                        $localization->id = null;
                        $localization->setContent($slug->name);
                        $localization->setField($entityTypeCollection[$slug->type]['field']);
                        $localization->setLocale($locale);
                        $localization->setObjectId($slug->item_id);
                        try {
                            $localization->save();
                        } catch (Exception $e)
                        {
                            echo 'Saving error: ' . $e->getMessage(). PHP_EOL;
                        } finally { $executedSave++; }
                    }
                }
            }
        }

        echo count($slugCollection) . ' slugs found' . PHP_EOL;
        echo $executedUpdate . ' update queries executed' . PHP_EOL;
        echo $executedSave . ' save queries executed' . PHP_EOL;

    }

}