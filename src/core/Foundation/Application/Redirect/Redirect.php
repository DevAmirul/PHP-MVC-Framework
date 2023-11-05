<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Redirect;

use Devamirul\PhpMicro\core\Foundation\Session\FlushMessage;

class Redirect {

    /**
     * Redirect Link.
     */
    private string $redirectLink;

    /**
     * This function will redirect you according to the link you provided.
     */
    public function redirect(string $redirectLink): static {
        $this->redirectLink = $redirectLink;
        return $this;
    }

    /**
     * Redirect previous url.
     */
    public function back(): static {
        $this->redirectLink = $_SERVER['HTTP_REFERER'];
        return $this;
    }

    /**
     * When redirecting you can save any error message as flush session.
     */
    public function withError(mixed $errors): static {
        if (is_string($errors)) {
            FlushMessage::singleton()->set('error', $errors);
        }else {
            FlushMessage::singleton()->set('errors', $errors);
        }
        return $this;
    }

    /**
     * When redirecting you can save any data as flush session.
     */
    public function withData(mixed $data): static {
        FlushMessage::singleton()->set('data', $data);
        return $this;
    }

    public function __destruct() {
        header('Location: ' . $this->redirectLink);
        exit;
    }
}
