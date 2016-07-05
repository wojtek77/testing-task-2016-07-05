<?php

/**
 * @author Wojciech Brüggemann <wojtek77@o2.pl>
 */
class Utils
{
    /**
     * @param string $originalContent
     * @return string
     */
    static public function contentFromWebsite($originalContent)
    {
        preg_match('|<body.+</body>|s', $originalContent, $matches);
        if (isset($matches[0])) {
            return strip_tags($matches[0]);
        } else {
            return '';
        }
    }
}
