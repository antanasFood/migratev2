<?php

use Phalcon\Cli\Task;

class BlogTask extends Task
{
    public function mainAction()
    {
        try {
            $this->db->begin();
            $blogSlugCollection = $this->db->query('SELECT * from common_slug WHERE `type` LIKE "%blog%"');
            foreach ($blogSlugCollection as $blogSlug) {
                if ($blogSlug->type == 'blog_category') {
                    $blogCategory = BlogCategory::findFirst(['id ='. $blogSlug->item_id .' AND language = "' . $blogSlug->lang_id . '"']);
                    $blogCategory->slug = $blogSlug->name;
                    $blogCategory-update();
                }
                elseif ($blogSlug->type == 'blog_post' ) {
                    $item = BlogPost::findFirst(['id ='. $blogSlug->item_id .' AND language = "' . $blogSlug->lang_id . '"']);
                    $item->slug = $blogSlug->name;
                    $item-update();
                }
                else {
                    die ('Entity for ' . $blogSlug->type . ' not defined ' . PHP_EOL);
                }
            }

            $this->db->commit();

            echo 'Blog slugs migrated'. PHP_EOL;

        } catch (PDOException $e) {
            $this->logger->error($e->getMessage());
            $this->logger->debug($e->getTraceAsString());
            $this->db->rollback();
            die($e->getMessage());

        }
    }

}