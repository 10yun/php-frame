<?php

/**
 * 【ctocode】      核心文件
 * ============================================================================
 * @author       作者         ctocode-zhw
 * @version 	  版本	  v5.7.1.20210514
 * @copyright    版权所有   2015-2027，并保留所有权利。
 * @link         网站地址   https://www.10yun.com
 * @contact      联系方式   QQ:343196936
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 如果商业用途务必到官方购买正版授权, 以免引起不必要的法律纠纷.
 * ============================================================================
 */

// 1. 加载基础常量配置文件件
define('_CTOCODE_ROOT_', '20191123');
/*
 * ============================================================================
 * 授权处理
 * ============================================================================
 */
$ctocode_frame = array(
    /* 软件名称 */
    '_CTOCODE_FRAME_NAME_' => 'ctocode-php-frame',
    '_CTOCODE_FRAME_VERSION_' => '1.0.0',
    /* 版本号等信息 */
    '_CTOCODE_FRAME_BUILD_' => '2017.07.28.1833',
    '_CTOCODE_FRAME_AUTHOR_' => 'ctocode member 343196936@qq.com',
    '_CTOCODE_FRAME_LINK_' => 'https://ctocode.com',
    /* 版权 */
    '_CTOCODE_COPYRIGHT_' => 'https://ctocode.com',
    /* 许可证 */
    '_CTOCODE_LICENSE_' => '20180906-v2',
    /* LICENSE ID */
    '_CTOCODE_LICENSE_ID' => 'V20170129',
    /* LICENSE KEY */
    '_CTOCODE_LICENSE_KEY' => 'ctocodeV20170129'
);
if (empty($ctocode_frame['_CTOCODE_LICENSE_']) || empty($ctocode_frame['_CTOCODE_COPYRIGHT_'])) {
    exit('【ctocode - error】许可证或者版权错误～');
}
/*
 * ============================================================================
 * 其他
 * ============================================================================
 */
// ctocode 框架路径,定义一个常量,正则替换-获取当前文件的绝对目录,当前文件所在路径
define('_CTOCODE_PHPFRAME_', preg_replace('/(\/|\\\\){1,}/', '/', __DIR__) . '/');
// ctocode 字体
define('_CTOCODE_FONTS_', dirname(_CTOCODE_PHPFRAME_) . '/assets/fonts/');
// 项目路径
define('_CTOCODE_PROJECT_', dirname(_CTOCODE_PHPFRAME_, 4) . '/');
// 配置文件路径
is_dir(_CTOCODE_PROJECT_ . 'config/') ? define('_CTOCODE_CONFIG_', _CTOCODE_PROJECT_ . 'config/') : exit('【ctocode - error】配置文件路径不存在～');
// ctocode 组件开发
define('_CTOCODE_ADDONS_', _CTOCODE_PROJECT_ . 'addons/');
// ctocode 自己扩展类库
define('_CTOCODE_EXTEND_', _CTOCODE_PROJECT_ . 'extend/');
// 文件上传存放 文件资源路径
define('_CTOCODE_FILE_', _CTOCODE_PROJECT_ . 'public/storage/');
// 程序运行产生的文件 ,ctocode 数据
define('_CTOCODE_RUNTIME_', _CTOCODE_PROJECT_ . 'runtime/');
// composer扩展类库
define('_CTOCODE_VENDOR_', _CTOCODE_PROJECT_ . 'vendor/');

// 2. 导入相关文件
/*
 * 加载 通用函数
 */
include_once __DIR__ . '/helper/check.php';
include_once __DIR__ . '/helper/common.php'; // 常用函数
include_once __DIR__ . '/helper/file_do.php'; // 文件其他
include_once __DIR__ . '/helper/file.php'; // 文件操作
include_once __DIR__ . '/helper/http.php'; // http
include_once __DIR__ . '/helper/img.php'; //
include_once __DIR__ . '/helper/input.php';
include_once __DIR__ . '/helper/ip.php'; // ip
include_once __DIR__ . '/helper/language.php'; // 语言
include_once __DIR__ . '/helper/security.php'; // 安全处理
include_once __DIR__ . '/helper/str.php'; // 字符串
include_once __DIR__ . '/helper/time.php'; // 时间

/*
 * ============================================================================
 * ctocode之路，开始处理
 * ============================================================================
 */