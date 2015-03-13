<?php
namespace Application\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * 
 * @author schoolofnet\alunos\robertooliveiras
 *
 */
class LeftLinks extends AbstractHelper
{
    public function __invoke(array $values, $urlPrefix){
        $html = '<ul style="list-style-type: none;">'. PHP_EOL;
        foreach($values as $item){
            $html.= sprintf("<li><a href=\"%s%s\">%s</a></li>\n",
                $urlPrefix, $item, $item);
        }
        $html.="</ul>".PHP_EOL;
        return $html;
    }
}

?>