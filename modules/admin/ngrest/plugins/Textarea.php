<?php
namespace admin\ngrest\plugins;

use admin\ngrest\PluginAbstract;

class Textarea extends PluginAbstract
{
    public function renderList($doc)
    {
        $elmn = $doc->createElement("span", "{{item.".$this->name."}}");
        $doc->appendChild($elmn);

        return $doc;
    }

    public function renderCreate($doc)
    {
        $elmn = $doc->createElement("zaa-textarea");
        $elmn->setAttribute("id", $this->id);
        $elmn->setIdAttribute("id", true);
        $elmn->setAttribute("model", $this->ngModel);
        $elmn->setAttribute("class", "form__input form__input--textarea");
        $doc->appendChild($elmn);

        return $doc;
    }

    public function renderUpdate($doc)
    {
        return $this->renderCreate($doc);
    }
}
