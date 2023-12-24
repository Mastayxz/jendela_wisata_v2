<?php
// Inside your models directory (e.g., Log_model.php)
class Log_model extends CI_Model
{

    public function getLoginLogs()
    {
        $log_file_path = APPPATH . 'logs/log-' . date('Y-m-d') . '.php'; // Adjust the file path as needed
        $logs = [];

        if (file_exists($log_file_path)) {
            $logs = file($log_file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        }

        return $logs;
    }
}
