<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\base\Menu;
use app\service\user\UserServices;
use app\utils\base\Base;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Json;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since  2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     *
     * @param string $message the message to be echoed.
     *
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        $menus = Menu::find()->asArray()->all();
        $tree = UserServices::getInstance()->tree($menus);
        echo Json::encode($tree) . "\n";

    }

}