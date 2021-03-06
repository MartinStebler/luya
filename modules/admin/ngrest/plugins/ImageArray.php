<?php
namespace admin\ngrest\plugins;

/**
 * @author nadar
 */
class ImageArray extends \admin\ngrest\PluginAbstract
{
    public function renderList($doc)
    {
        $elmn = $doc->createElement("span", "[Bilder-Liste]");
        $doc->appendChild($elmn);
        return $doc;
    }

    public function renderCreate($doc)
    {
        $elmn = $doc->createElement("zaa-image-array-upload");
        $elmn->setAttribute("id", $this->id);
        $elmn->setIdAttribute("id", true);
        $elmn->setAttribute("model", $this->ngModel);
        $doc->appendChild($elmn);

        return $doc;
    }

    public function renderUpdate($doc)
    {
        return $this->renderCreate($doc);
    }
    
    //
    
    public function onAfterList($value)
    {
        return json_decode($value, true);
    }
    
    public function onBeforeCreate($value)
    {
        if (empty($value) || !is_array($value)) {
            return json_encode([]);
        }
        $data = [];
        foreach($value as $key => $item) {
            $data[$key] = [
                "imageId" => $item['imageId'],
                "caption" => $item['caption'],
            ];
        }
        
        return json_encode($data);
    }
    
    public function onBeforeUpdate($value, $oldValue)
    {
        return $this->onBeforeCreate($value);
    }
}
