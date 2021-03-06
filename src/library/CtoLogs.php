<?php

namespace ctocode\library;

/**
 * 【ctocode】      核心文件 - 日志
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
// $logsObj = new \CTOCODE_Log ( _CTOCODE_RUNTIME_, '/ctocode_logs' );
// $logsObj->writeLog ( 'SELECT FORM ' );
class CtoLogs
{
    protected static $instance = null;
    const _CTOLOG_LEVEL_FATAL_ = 0;
    const _CTOLOG_LEVEL_ERROR_ = 1;
    const _CTOLOG_LEVEL_WARN_ = 2;
    const _CTOLOG_LEVEL_INFO_ = 3;
    const _CTOLOG_LEVEL_DEBUG_ = 4;
    const _CTOLOG_PATH = ''; // 自定义日志路径，如果没有设置，则使用系统默认路径，在./data/logs/
    const _CTOLOG_OPEN_ = FALSE; // 是否记录日志
    const _CTOLOG_DISPLAY_ = FALSE; // 是否显示LOG输出
    const _CTOLOG_DEBUG = FALSE; // 是否输出DEBUG
    public static $ifWrite = true; // 是否写入
    public static $logFlag = "";
    public static $logPath = "";
    function __construct($logPath, $logFlag)
    {
        self::$logPath = $logPath;
        self::$logFlag = $logFlag;
        if (!is_dir($logPath))
            mkdir($logPath, 0777);
    }
    public function writeLog($logMsg)
    {
        if (!self::$ifWrite)
            return;
        $logName = self::$logPath . self::$logFlag . date('Ymd') . ".log";
        if (file_exists($logName)) {
            file_put_contents($logName, sprintf("[%s]%s\r\n", date('G:i:s'), $logMsg), FILE_APPEND);
        } else {
            // 如果不存在则创建
            file_put_contents($logName, sprintf("[%s]%s\r\n", date('G:i:s'), date('Y-m-d')));
            if (!is_writeable($logName))
                chmod($logName, 0777);
            file_put_contents($logName, sprintf("[%s]%s\r\n", date('G:i:s'), $logMsg), FILE_APPEND);
        }
    }
    static $LOG_LEVEL_NAMES = array(
        'FATAL',
        'ERROR',
        'WARN',
        'INFO',
        'DEBUG'
    );
    private $level = '_CTOLOG_LEVEL_DEBUG_';
    public static function getInstance($AutoCreate = false)
    {
        if ($AutoCreate === true && !self::$instance) {
            self::init();
        }
        return self::$instance;
    }
    public static function init()
    {
        return self::$instance = new self();
    }
    function setLogLevel($lvl)
    {
        if ($lvl >= count(self::$LOG_LEVEL_NAMES) || $lvl < 0) {
            throw new \Exception('invalid log level:' . $lvl);
        }
        $this->level = $lvl;
    }
    function _log($level, $message, $name)
    {
        if ($level > $this->level) {
            return;
        }
        $log_file_path = LOG_ROOT . $name . '.log';
        $log_level_name = self::$LOG_LEVEL_NAMES[$this->level];
        $content = date('Y-m-d H:i:s') . ' [' . $log_level_name . '] ' . $message . "\n";
        @file_put_contents($log_file_path, $content, FILE_APPEND);
    }
    function debug($message, $name = 'system')
    {
        $this->_log(_CTOLOG_LEVEL_DEBUG_, $message, $name);
    }
    function info($message, $name = 'system')
    {
        $this->_log(_CTOLOG_LEVEL_INFO_, $message, $name);
    }
    function warn($message, $name = 'system')
    {
        $this->_log(_CTOLOG_LEVEL_WARN_, $message, $name);
    }
    function error($message, $name = 'system')
    {
        $this->_log(_CTOLOG_LEVEL_ERROR_, $message, $name);
    }
    function fatal($message, $name = 'system')
    {
        $this->_log(_CTOLOG_LEVEL_FATAL_, $message, $name);
    }
}
