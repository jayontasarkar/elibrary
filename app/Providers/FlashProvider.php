<?php

namespace App\Providers;

class FlashProvider
{
    /**
     * Create a flash message
     * @param  [type] $title   [description]
     * @param  [type] $message [description]
     * @param  [type] $level   [description]
     * @param  string $key     [description]
     * @return [type]          [description]
     */
    public function create($title, $message, $level, $key = 'flash_message')
    {
        return session()->flash($key, [
            'title'   => $title,
            'message' => $message,
            'level'   => $level
        ]);
    }

    /**
     * Create an info flash message
     * @param  [type] $title   [description]
     * @param  [type] $message [description]
     * @return [type]          [description]
     */
    public function info($title, $message)
    {
        return $this->create($title, $message, 'info');
    }

    /**
     * create a success flash message
     * @param  [type] $title   [description]
     * @param  [type] $message [description]
     * @return [type]          [description]
     */
    public function success($title, $message)
    {
        return $this->create($title, $message, 'success');
    }

    /**
     * create an warning flash message
     * @param  [type] $title   [description]
     * @param  [type] $message [description]
     * @return [type]          [description]
     */
    public function warning($title, $message)
    {
        return $this->create($title, $message, 'warning');
    }

    /**
     * create an error flash message
     * @param  [type] $title   [description]
     * @param  [type] $message [description]
     * @return [type]          [description]
     */
    public function error($title, $message)
    {
        return $this->create($title, $message, 'error');
    }

    /**
     * create overlay flash message
     * @param  [type] $title   [description]
     * @param  [type] $message [description]
     * @param  string $level   [description]
     * @return [type]          [description]
     */
    public function overlay($title, $message, $level = 'success')
    {
        return $this->create($title, $message, $level, 'flash_message_overlay');
    }
}

// Available Methods
// flash($title, $message);
// flash()->success($title, $message);
// flash()->info($title, $message);
// flash()->warning($title, $message);
// flash()->error($title, $message);
// flash()->overlay($title, $message, 'success');
