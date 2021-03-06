<?php

namespace newsadmin\models;

class Cat extends \admin\ngrest\base\Model
{
    public static function tableName()
    {
        return 'news_cat';
    }
    
    public function scenarios()
    {
        return [
            "restcreate" => ['title'],
            "restupdate" => ['title'],
        ];
    }
    
    public function ngRestApiEndpoint()
    {
        return 'api-news-cat';
    }
    
    public function ngRestConfig($config)
    {
        $config->list->field("title", "Titel")->text()->required();
        
        $config->create->copyFrom('list', ['id']);
        $config->update->copyFrom('list', ['id']);
        
        return $config;
    }
}