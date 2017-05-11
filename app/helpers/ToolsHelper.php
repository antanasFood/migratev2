<?php

/**
 * Created by PhpStorm.
 * User: antanas
 * Date: 17.4.11
 * Time: 13.26
 */
class ToolsHelper
{

    public static function createLocalization(ModelFoodout $createdObj)
    {
        $status = false;

        foreach (\Phalcon\Di::getDefault()->get('config')->params->locales as $locale) {
            foreach ($createdObj->LOCALIZED_FIELD as $lField) {
                $modelLocalized = new Localization();
                $modelLocalized->setSource($createdObj->LOCALIZED_TABLE);
                if ($lField[0] == '~') {
                    $lField = str_replace('~', '', $lField);
                    if (null == $createdObj->getSlugType()) {
                        throw new Exception('Slug type is required');
                    }

                    self::createSlug($createdObj->{$lField}, $lField, $createdObj, $locale);

                } elseif ($locale !=  \Phalcon\Di::getDefault()->get('config')->params->locale ) {
                    $modelLocalized->object_id = (int)$createdObj->getId();
                    $modelLocalized->locale = $locale;
                    $modelLocalized->field = $lField;
                    $modelLocalized->content = $createdObj->{$lField};

                    if ($modelLocalized->create()){
                        $status = true;
                    }

                }
            }
        }

        return $status;
    }


    private static function createSlug($name, $lField, $model, $locale){
        $lField = str_replace('~','',$lField);
        $orgSlug = self::generateSlug($model->{$lField});

        $slug = $orgSlug;
        $increase = '';

        while ($slugModel = CommonSlug::findFirst([
            'conditions' => 'type = ?1 AND name = ?2 AND lang_id = ?3',
            'bind' => [
                1 => $model->SLUG_TYPE,
                2 => $slug,
                3 => $locale
            ]])
        )
        {
            $slugModel->is_active = 0;
            $slugModel->update();

            $increase++;
            $slug = $orgSlug . '-' . $increase;
        }

        $slugModel = new CommonSlug();

        $slugModel->item_id = $model->getId();
        $slugModel->lang_id = $locale;
        $slugModel->type = $model->getSlugType();
        $slugModel->name = $slug;
        $slugModel->orig_name = $name;
        $slugModel->is_active = 1;
        $slugModel->create();

        return $slugModel;

    }


    public static function generateSlug($text)
    {
        $locales = \Phalcon\Di::getDefault()->get('config')->params->locales;

        $countryCharReplacements = array(
            'lt' => array(
                'ą' => 'a',
                'č' => 'c',
                'ę' => 'e',
                'ė' => 'e',
                'į' => 'i',
                'š' => 's',
                'ų' => 'u',
                'ū' => 'u',
                'ž' => 'z',
            ),
            'en' => array(),
            'ru' => array(
                'ґ'=>'g','ё'=>'e','є'=>'e','ї'=>'i','і'=>'i',
                'а'=>'a', 'б'=>'b', 'в'=>'v',
                'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'e',
                'ж'=>'zh', 'з'=>'z', 'и'=>'i', 'й'=>'i',
                'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n',
                'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s',
                'т'=>'t', 'у'=>'u', 'ф'=>'f', 'х'=>'h',
                'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sch',
                'ы'=>'y', 'э'=>'e', 'ю'=>'u', 'я'=>'ya', 'é'=>'e',
                'ь'=>'', 'ъ' => '',
            ),
            'lv' => array ( /* Latvian */
                'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
                'š' => 's', 'ū' => 'u', 'ž' => 'z', 'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i',
                'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',                 'ą' => 'a',
                'ę' => 'e',
                'ė' => 'e',
                'į' => 'i',
                'ų' => 'u',
            ),
            'ee' => array (
                'Š' => 'S', 'Ž' => 'Z', 'Õ' => 'O', 'Ä' => 'A', 'Ö' => 'O', 'Ü' => 'U',
                'š' => 's', 'ž' => 'z', 'õ' => 'o', 'ä' => 'a', 'ö' => 'o', 'ü' => 'u'
            )
        );

        $removableChars = array(
            '"' => '',
            '„' => '',
            '“' => '',
            '+' => '-',
            '(' => '',
            ')' => '',
            '.' => '',
            '!' => '',
            '?' => '',
            ',' => '',
            '*' => '',
            '%' => '',
            '#' => '',
            '{' => '',
            '}' => '',
            '|' => '',
            '<' => '',
            '>' => '',
            "\\" => '',
            '/' => '',
            '^' => '',
            '~' => '',
            '[' => '',
            ']' => '',
            '`' => '',
            '´' => '',
            "'" => '',
            ';' => '',
            ':' => '',
            '=' => '-',
            '@' => '',
            '$' => '',
            '&' => '',
            'ø' => '',
            'Ø' => '',
            'â€”' => '',
            'â€“' => '',
        );

        $text = strtr($text, $removableChars);
        $text = preg_replace('#\s+#u', '-', $text);
        $text = preg_replace('~-{2,}~', '-', $text);
        foreach ($locales as $locale) {
            $text = strtr(mb_strtolower($text, 'utf-8'), $countryCharReplacements[$locale]);

        }

        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');

        return $text;
    }
}