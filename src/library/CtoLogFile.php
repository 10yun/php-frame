<?php

namespace ctocode\library;

/**
 * 文件日志
 */
class CtoLogFile
{
    // 日志LOG
    protected function curlLog($logData = array(), $type = '')
    {
        $date = date("Y-m-d H:i:s", time());
        $logData['log_date'] = $date;
        $logfile = '';
        $txt = '';
        switch ($type) {
            case 'error':
                $logfile = fopen(_PATH_RUNTIME_ . "/logs/logfile_error_" . date("Ymd", time()) . ".txt", "a+");
                $txt = "========== 错误日志 - {$date} ==========\n";
                break;
            case 'debug':
            default:
                $logfile = fopen(_PATH_RUNTIME_ . "/logs/logfile_debug_" . date("Ymd", time()) . ".txt", "a+");
                $txt = "========== 调试日志 - {$date} ==========\n";
                break;
        }
        $txt .= var_export($logData, true) . "\n";
        fwrite($logfile, $txt);
        fclose($logfile);
    }
    // 错误日志LOG
    protected function curlErrorLog($logData = array())
    {
        $this->curlLog($logData, 'error');
    }
    // 调试日志LOG
    protected function curlDebugLog($logData = array())
    {
        $this->curlLog($logData, 'debug');
    }
}
