<?php

namespace Models;

class Mailer
{
    public function send($user, $email, $comment, $devMode = true)
    {
        if (!$devMode) {
            $subject = 'New comment';
            $message = sprintf('User %s (%s) left comment: <pre>%s</pre>', $user, $email, $comment);
            mail('admin@admin.com', $subject, $message);
        }
    }
}