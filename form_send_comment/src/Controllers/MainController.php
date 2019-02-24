<?php

namespace Controllers;

use Models\Mailer;
use Models\MyDB;

class MainController
{
    /**s
     * @var MyDB
     */
    private $myDB;
    /**
     * @var Mailer
     */
    private $mailer;
    public function __construct(MyDB $myDB)
    {
        $this->myDB = $myDB;
        $this->mailer = new Mailer();
    }
    public function processForm(array $postData)
    {
        $errors = [];
        $user = $postData['user'] ?? null;
        $email = $postData['email'] ?? null;
        $comment = isset($postData['comment']) ? trim($postData['comment']) : null;
        if (!$user || (strlen($user) <= 3)) {
            $errors[] = 'Username must be not empty and at least 3 characters';
        }
        if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = sprintf('Invalid email %s', $email);
        }
        if (!$comment || (strlen($comment) > 124)) {
            $errors[] = 'Comment must be not empty and not longer than 124 characters';
        }
        if (empty($errors)) {
            $this->myDB->insertComment($user, $email, $comment);
            $this->mailer->send($user, $email, $comment);
            $this->renderSuccessPage();
        } else {
            $this->renderForm($user, $email, $comment, $errors);
        }
    }
    public function renderForm($name = null, $email = null, $comment = null, $errors = [])
    {
        require_once __DIR__ . '/../views/form.php';
        return;
    }
    public function renderSuccessPage()
    {
        require_once __DIR__ . '/../views/success.html';
        return;
    }
    public function renderHistory()
    {
        $allComments = $this->myDB->loadAllComments();
        require_once __DIR__ . '/../views/comment_history.php';
        return;
    }
}