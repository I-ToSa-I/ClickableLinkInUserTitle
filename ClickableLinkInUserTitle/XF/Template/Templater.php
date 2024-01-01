<?php

namespace DCS\ClickableLinkInUserTitle\XF\Template;

class Templater extends XFCP_Templater {

    public function fnUserTitle($templater, &$escape, $user, $withBanner = false, $attributes = []) {
        $parent = parent::fnUserTitle($templater, $escape, $user, $withBanner, $attributes);
        $pattern = array(
            '%\b(?<!href=[\'"])https?://([^\s\[\]<]+)(?![^<>]*</a>)%i',
            '%\b(?<!http://)(?<!https://)[a-z\d]+\.(ru|com|net)(?!["\'][^<>]*>)(?![^<>]*</a>)%i'
        );
        $repl = array(
            '<a href="$0">$1</a>',
            '<a href="http://$0">$0</a>'
        );

        return preg_replace($pattern, $repl, $parent);
    }

}