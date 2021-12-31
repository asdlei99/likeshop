<?php
// +----------------------------------------------------------------------
// | likeshop100%开源免费商用商城系统
// +----------------------------------------------------------------------
// | 欢迎阅读学习系统程序代码，建议反馈是我们前进的动力
// | 开源版本可自由商用，可去除界面版权logo
// | 商业版本务必购买商业授权，以免引起法律纠纷
// | 禁止对系统程序代码以任何目的，任何形式的再发布
// | gitee下载：https://gitee.com/likeshop_gitee
// | github下载：https://github.com/likeshop-github
// | 访问官网：https://www.likeshop.cn
// | 访问社区：https://home.likeshop.cn
// | 访问手册：http://doc.likeshop.cn
// | 微信公众号：likeshop技术社区
// | likeshop团队 版权所有 拥有最终解释权
// +----------------------------------------------------------------------
// | author: likeshopTeam
// +----------------------------------------------------------------------

namespace app\common\logic;

use app\common\model\OrderLog;

/**
 * 订单记录日志
 * Class OrderLogLogic
 * @package app\common\logic
 */
class OrderLogLogic
{
    public static function record($type, $channel, $order_id, $handle_id, $content, $desc = '')
    {
        if (empty($content)) {
            return true;
        }
        $log = new OrderLog();
        $log->type = $type;
        $log->order_id = $order_id;
        $log->channel = $channel;
        $log->handle_id = $handle_id;
        $log->content = OrderLog::getLogDesc($content);
        $log->create_time = time();

        if ($desc != '') {
            $log->content = OrderLog::getLogDesc($content) . '(' . $desc . ')';
        }

        $log->save();
    }
}