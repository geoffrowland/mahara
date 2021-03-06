<?php
/**
 *
 * @package    mahara
 * @subpackage core
 * @author     Catalyst IT Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL version 3 or later
 * @copyright  For copyright information on Mahara, please see the README file distributed with this software.
 *
 */

define('INTERNAL', 1);
define('JSON', 1);
require(dirname(dirname(__FILE__)) . '/init.php');

$rawstring = param_alphanumext('string');
$section = param_alphanumext('section');
$args = param_variable('args', null);
if (!empty($args) && is_array($args)) {
    array_unshift($args, $rawstring, $section);
    $string = call_user_func_array('get_string' , $args);
}
else {
    $string = get_string($rawstring, $section);
}
json_reply(false, array(
    'message' => null,
    'data' => array(
        'string' => $string,
    )
));
